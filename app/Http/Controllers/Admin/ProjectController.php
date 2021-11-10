<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'DESC')->simplePaginate(10);

        return view('admin.pages.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProjectCategory::get();

        return view('admin.pages.project.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => ['required'],
            'deskripsi' => ['required'],
            'kategori' => ['required'],
            'image' => ['required', 'image', 'file', 'max:1024'],
        ]);

        $validateData['image'] = $request->file('image')->store('project');

        try {
            DB::beginTransaction();
            Project::create([
                'project_category_id' => $validateData['kategori'],
                'title' => $validateData['judul'],
                'description' => $validateData['deskripsi'],
                'images' => $validateData['image'],
            ]);

            DB::commit();
            session()->flash('success', 'Berhasil menambah data');
            return redirect(route('portfolio.index'));
        } catch(\Exception $e) {
            DB::rollback();
            session()->flash('danger', 'Terjadi kesalahan');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = ProjectCategory::get();
        $project = Project::findOrFail($id);

        return view('admin.pages.project.form', compact('categories', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'judul' => ['required'],
            'deskripsi' => ['required'],
            'kategori' => ['required'],
            'image' => ['image', 'file', 'max:1024'],
        ]);

        if($request->file('image')) {
            Storage::delete($request->oldImage);
            $validateData['image'] = $request->file('image')->store('project');
        }

        try {
            DB::beginTransaction();
            Project::where('id', $id)->update([
                'project_category_id' => $validateData['kategori'],
                'title' => $validateData['judul'],
                'description' => $validateData['deskripsi'],
                'images' => $request->file('image') ? $validateData['image'] : $request->oldImage,
            ]);
            DB::commit();
            session()->flash('success', 'Berhasil mengubah data');
            return redirect(route('portfolio.index'));
        } catch(\Exception $e) {
            DB::rollback();
            session()->flash('danger', 'Terjadi kesalahan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        Storage::delete($project->images);
        $project->delete();
        
        session()->flash('success', 'Berhasil menghapus data');
        return redirect(route('portfolio.index'));
    }
}
