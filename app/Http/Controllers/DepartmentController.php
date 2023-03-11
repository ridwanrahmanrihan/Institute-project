<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Department.index',[
            "departments" => Department::all(),
            "trash_departments" => Department::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Department.create',[
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
            "department_name" => "required |unique:departments,department_name",
            "department_image" => "mimes:png,jpg,jpeg"
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('department_image')->getClientOriginalExtension();
        $img = Image::make($request->file('department_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/department_image/'.$file_name),90);
        $id = Department::insertGetId([
            "department_name" => $request->department_name,
            "department_image" => $file_name,
            "department_about" => $request->department_about,
            "created_at" => now(),
        ]);
        //  $request = new department();
        // $request->find($id)->departmentRelation()->attach($request);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return back();
    }
    public function departmentrestore($id)
    {
        Department::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function departmentdelete($id)
    {
        Department::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
}
