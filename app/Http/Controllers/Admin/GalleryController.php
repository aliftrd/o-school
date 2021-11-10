<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::simplePaginate(10);

        return view('admin.pages.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.gallery.form');
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
            'image' => ['required', 'image', 'file', 'max:1024']
        ]);

        $validateData['image'] = $request->file('image')->store('gallery');

        try {
            DB::beginTransaction();

            Gallery::create([
                'images' => $validateData['image']
            ]);

            DB::commit();
            session()->flash('success', 'Berhasil menambah data');
            return redirect(route('galleries.index'));
        } catch(\Exception $e) {
            DB::rollback();
            session()->flash('danger', 'Terjadi kesalahan');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.pages.gallery.form', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validateData = $request->validate([
            'image' => ['image', 'file', 'max:1024']
        ]);

        if($request->file('image')) {
            Storage::delete($request->oldImage);
            $validateData['image'] = $request->file('image')->store('gallery');
        }

        try {
            DB::beginTransaction();

            $gallery->update([
                'images' => $request->file('image') ? $validateData['image'] : $request->oldImage
            ]);

            DB::commit();
            session()->flash('success', 'Berhasil mengubah data');
            return redirect(route('galleries.index'));
        } catch(\Exception $e) {
            DB::rollback();
            session()->flash('danger', 'Terjadi kesalahan');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        Storage::delete($gallery->images);
        $gallery->delete();
        session()->flash('success', 'Berhasil mengubah data');
        return redirect(route('galleries.index'));
    }
}
