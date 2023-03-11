<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Job;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Job.index', [
            "jobs" =>Job::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Job.create',[
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
        $request -> validate ([
            "*" => "required",
            "jober_image" => "required |mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('jober_image')->getClientOriginalExtension();
        $img = Image::make($request->file('jober_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/jober_image/'.$file_name),90);
        $id = Job::insertGetId([
            "jober_name" => $request->jober_name,
            "jober_phone_number" => $request->jober_phone_number,
            "jober_email" => $request->jober_email,
            "passing_year" => $request->passing_year,
            "jober_district" => $request->jober_district,
            "jober_company" => $request->jober_company,
            "jober_roll" => $request->jober_roll,
            "jober_department" => $request->jober_department,
            "jober_status" => $request->jober_status,
            "jober_address" => $request->jober_address,
            "jober_designation" => $request->jober_designation,
            "jober_image" => $file_name,
            "created_at" => now(),
        ]);
        $job = new job();
        $job->find($id)->jobRelation()->attach($request->jober_department);
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('Job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        return view('Job.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
        $request->validate([
            "*" => "required",
            "jober_image" => " mimes:jpg,png,jpeg",
        ]);
        if ($request->hasFile('jober_image')) {
            unlink(base_path('/public/uploads/jober_image/'.$job->jober_image));
            $file_name = auth()->id() .'_'. time().Str::random(6) .'.'.$request->file('jober_image')->getClientOriginalExtension();
            $img = Image::make($request->file('jober_image'));
            $img->resize(100,100)->save(base_path('/public/uploads/jober_image/'.$file_name),90);
            $job->update([
                
            "jober_phone_number" => $request->jober_phone_number,
            "jober_company" => $request->jober_company,
            "jober_status" => $request->jober_status,
            "jober_designation" => $request->jober_designation,
            "jober_image" => $file_name,
            ]);
         }
         $job -> update([
            "jober_phone_number" => $request->jober_phone_number,
            "jober_company" => $request->jober_company,
            "jober_status" => $request->jober_status,
            "jober_designation" => $request->jober_designation,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        unlink(base_path('public/uploads/jober_image/' . $job->jober_image));
        $job->jobRelation()->detach();
        $job->forceDelete();
        return back();
    }
}
