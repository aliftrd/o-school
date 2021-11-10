<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProjectCategory::simplePaginate(10);

        return view('admin.pages.project.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.project.category.form');
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
            'nama' => 'required'
        ]);

        ProjectCategory::create([
            'name' => $validateData['nama']
        ]);

        session()->flash('success','Sukses Menambah Kategori!');
        return redirect()->route('portfolio.category.index');
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
        $category = ProjectCategory::findOrFail($id);

        return view('admin.pages.project.category.form', compact('category'));
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
            'nama' => 'required'
        ]);

        ProjectCategory::findOrFail($id)->update([
            'name' => $validateData['nama']
        ]);

        session()->flash('success','Sukses Mengubah Kategori!');
        return redirect()->route('portfolio.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            ProjectCategory::destroy($id);
            
            session()->flash('success','Sukses Menghapus Kategori!');
            return redirect()->back();
        } catch(\Exception $e) {
            session()->flash('danger','Terjadi kesalahan / Data yang telah dipakai tidak dapat dihapus');
            return redirect()->back();

        }
    }
}
