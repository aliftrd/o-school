<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::orderBy('id', 'DESC')->simplePaginate(10);

        return view('admin.pages.testimony.index', compact('testimonies'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.testimony.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'nama' => ['required'],
            'pekerjaan' => ['required'],
            'pesan' => ['required', 'max:255'],
            'image' => ['required', 'image', 'file', 'max:1024'],
        ]);

        $validateDate['image'] = $request->file('image')->store('testimony');

        try {
            DB::beginTransaction();

            Testimony::create([
                'name' => $validateDate['nama'],
                'profession' => $validateDate['pekerjaan'],
                'message' => $validateDate['pesan'],
                'images' => $validateDate['image']
            ]);

            DB::commit();
            session()->flash('success', 'Berhasil menambah data');
            return redirect(route('testimonies.index'));
        } catch(\Exception $e) {
            DB::rollback();
            session()->flash('danger', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function show(Testimony $testimony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimony $testimony)
    {
        return view('admin.pages.testimony.form', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimony $testimony)
    {
        $validateDate = $request->validate([
            'nama' => ['required'],
            'pekerjaan' => ['required'],
            'pesan' => ['required', 'max:255'],
            'image' => ['image', 'file', 'max:1024'],
        ]);

        if($request->file('image')) {
            Storage::delete($request->oldImage);
            $validateDate['image'] = $request->file('image')->store('testimony');
        }

        try {
            DB::beginTransaction();

            $testimony->update([
                'name' => $validateDate['nama'],
                'profession' => $validateDate['pekerjaan'],
                'message' => $validateDate['pesan'],
                'images' => $request->file('image') ? $validateDate['image'] : $request->oldImage
            ]);

            DB::commit();
            session()->flash('success', 'Berhasil mengubah data');
            return redirect(route('testimonies.index'));
        } catch(\Exception $e) {
            DB::rollback();
            session()->flash('danger', 'Terjadi kesalahan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimony  $testimony
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimony $testimony)
    {
        Storage::delete($testimony->images);
        $testimony->delete();
        session()->flash('success', 'Berhasil menghapus data');
        return redirect()->back();
    }
}
