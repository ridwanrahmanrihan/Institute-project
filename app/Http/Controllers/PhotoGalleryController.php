<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PhotoGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("photogallery.index",[
            "photos" => PhotoGallery::all(),
            "trash_photosrestore" => PhotoGallery::onlyTrashed()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photogallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            "mupi_image" => "required | mimes:jpg,png,jpeg",
        ]);
     
            $file_name = auth()->id() .'_'. time() .'.'.$request->file('mupi_image')->getClientOriginalExtension();
            $img = Image::make($request->file('mupi_image'));
            $img->resize(100,100)->save(base_path('/public/uploads/mupi_image/'.$file_name),90);
        PhotoGallery::insert([
            "program_name" => $request->program_name,
            "mupi_image" => $file_name,
            "created_at" => now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoGallery $photoGallery, $id)
    {
        $photoGallery = PhotoGallery::find($id);
        return view('photogallery.show', compact('photoGallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoGallery $photoGallery, $id)
    {
        $photoGallery = PhotoGallery::find($id);
        $photoGallery->delete();
        return back();    
        
    }
    public function photorestore(Request $request, $id)
    {
        PhotoGallery::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function photodelete(Request $request, $id)
    {
        $photo = PhotoGallery::onlyTrashed()->find($id);
        unlink(base_path('/public/uploads/mupi_image/'.$photo->mupi_image));
        $photo->forceDelete();
        return back();        
    }
}
