<?php

namespace App\Http\Controllers;

use App\Models\Registrar;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class RegistrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Registrar.index', [
            "registrars" => Registrar::all(),
            "trash_registrars" => Registrar::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Registrar.create");
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
            "registrar_image" => "required |mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('registrar_image')->getClientOriginalExtension();
        $img = Image::make($request->file('registrar_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/registrar_image/'.$file_name),90);
        Registrar::insert([
            "registrar_name" => $request->registrar_name,
            "registrar_phone_number" => $request->registrar_phone_number,
            "registrar_email" => $request->registrar_email,
            "educational_qualification" => $request->educational_qualification,
            "registrar_designation" => $request->registrar_designation,
            "registrar_image" => $file_name,
            "created_at" => now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function show(Registrar $registrar)
    {
        return view('Registrar.show', compact('registrar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function edit(Registrar $registrar)
    {
        return view('Registrar.edit', compact('registrar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registrar $registrar)
    {
        $request->validate([
            "*" => "required",
            "registrar_image" => " mimes:jpg,png,jpeg",
        ]);
        if ($request->hasFile('registrar_image')) {
            unlink(base_path('/public/uploads/registrar_image/'.$registrar->registrar_image));
            $file_name = auth()->id() .'_'. time().Str::random(6) .'.'.$request->file('registrar_image')->getClientOriginalExtension();
            $img = Image::make($request->file('registrar_image'));
            $img->resize(100,100)->save(base_path('/public/uploads/registrar_image/'.$file_name),90);
            $registrar->update([
                "registrar_name" => $request->registrar_name,
                "registrar_phone_number" => $request->registrar_phone_number,
                "registrar_email" => $request->registrar_email,
                "educational_qualification" => $request->educational_qualification,
                "registrar_designation" => $request->registrar_designation,
                "registrar_image" => $file_name,
            ]);
         }
         $registrar -> update([
            "registrar_name" => $request->registrar_name,
            "registrar_phone_number" => $request->registrar_phone_number,
            "registrar_email" => $request->registrar_email,
            "educational_qualification" => $request->educational_qualification,
            "registrar_designation" => $request->registrar_designation,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registrar $registrar)
    {
        $registrar->delete();
        return back();
    }
    public function registrarrestore( $id)
    {
        Registrar::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function registrardelete( $id)
    {
        $registrar = Registrar::onlyTrashed()->find($id);
        unlink(base_path('public/uploads/registrar_image/' . $registrar->registrar_image));
        $registrar->forceDelete();
        return back();
    }
}
