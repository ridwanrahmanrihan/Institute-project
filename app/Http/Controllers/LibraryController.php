<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Library.index",[
            "librarians" => Library::all(),
            "trash_librarians" => Library::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Library.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate ([
            "*" => "required",
            "librarian_image" => "required |mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('librarian_image')->getClientOriginalExtension();
        $img = Image::make($request->file('librarian_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/librarian_image/'.$file_name),90);
        Library::insert([
            "librarian_name" => $request->librarian_name,
            "librarian_phone_number" => $request->librarian_phone_number,
            "librarian_email" => $request->librarian_email,
            "educational_qualification" => $request->educational_qualification,
            "librarian_designation" => $request->librarian_designation,
            "librarian_image" => $file_name,
            "created_at" => now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
        return view('Library.edit', compact("library"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Library $library)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        
        $library->forceDelete();
        return back();
    }
    public function librariandelete( $id)
    {
        $library =Library::find($id);
        unlink(base_path('public/uploads/librarian_image/' . $library->librarian_image));
        $library -> forceDelete();
        return back();
    }
}
