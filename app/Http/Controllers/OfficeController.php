<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Office.index",[
            "officers" =>Office::all(),
            "trash_officers" =>Office::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Office.create');
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
            "officer_image" => "required |mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('officer_image')->getClientOriginalExtension();
        $img = Image::make($request->file('officer_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/officer_image/'.$file_name),90);
        Office::insert([
            "officer_name" => $request->officer_name,
            "officer_phone_number" => $request->officer_phone_number,
            "officer_email" => $request->officer_email,
            "educational_qualification" => $request->educational_qualification,
            "officer_designation" => $request->officer_designation,
            "officer_image" => $file_name,
            "created_at" => now(),
        ]);
        return back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        return view('Office.show', compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        return view('Office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $request->validate([
            "*" => "required",
            "officer_image" => " mimes:jpg,png,jpeg",
        ]);
        if ($request->hasFile('officer_image')) {
            unlink(base_path('/public/uploads/officer_image/'.$office->officer_image));
            $file_name = auth()->id() .'_'. time().Str::random(6) .'.'.$request->file('officer_image')->getClientOriginalExtension();
            $img = Image::make($request->file('officer_image'));
            $img->resize(100,100)->save(base_path('/public/uploads/officer_image/'.$file_name),90);
            $office->update([
            "officer_name" => $request->officer_name,
            "officer_phone_number" => $request->officer_phone_number,
            "officer_email" => $request->officer_email,
            "educational_qualification" => $request->educational_qualification,
            "officer_designation" => $request->officer_designation,
            "officer_image" => $file_name,
            ]);
         }
         $office -> update([
            "officer_name" => $request->officer_name,
            "officer_phone_number" => $request->officer_phone_number,
            "officer_email" => $request->officer_email,
            "educational_qualification" => $request->educational_qualification,
            "officer_designation" => $request->officer_designation,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        $office ->delete();
        return back();
    }
    public function officerestore( $id)
    {
        Office::onlyTrashed()->find($id)->restore();
    }
    public function officedelete( $id)
    {
        $office = Office::onlyTrashed()->find($id);
        unlink(base_path('public/uploads/officer_image/' . $office->officer_image));
        $office->forceDelete();
        return back();
    }
}
