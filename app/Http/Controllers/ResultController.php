<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Result;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Storage;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Result.index",[
            "results" => Result::all(),
            "trash_results" => Result::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Result.create',[
            "departments" => Department::all(),
        ]);
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
            "*" => "required",
            "result_image" => "mimes:jpg,png,jpeg",

        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('result_image')->getClientOriginalExtension();
        $img = Image::make($request->file('result_image')); 
        $img->save(base_path('/public/uploads/result_image/'.$file_name),90);
        $id = Result::insertGetId([
            "result_title" => $request->result_title,
            "academic_year" => $request->academic_year,
            "department" => $request->department,
            "result_shift" => $request->result_shift,
            "result_seemester" => $request->result_seemester,
            "result_image" => $file_name,
            "created_at" => now(),
        ]);
        $result = new result();
        $result->find($id)->resultRelation()->attach($request->department);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        return view('Result.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result ->delete();
        return back();
    }
    public function resultrestore($id)
    {
        Result::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function resultdelete($id)
    {
        
        $result = Result::onlyTrashed()->find($id);
        unlink(base_path('public/uploads/result_image/' . $result->result_image));
        $result->forceDelete();
        return back();
    }
    public function download(Request $request, $result_image)
    {
        return response()->download(public_path('uploads/result_image'.$request->result_image));
    }
}
