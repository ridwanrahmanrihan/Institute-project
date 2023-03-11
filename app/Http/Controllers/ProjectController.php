<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Project.index',[
            "projects" =>Project::all(),
            "trash_projects" =>Project::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Project.create',[
            "departments"=>Department::all(),
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
        $request->validate([
            "project_details" => "required",
            "department" => " required",
        ]);
        
    $project_details = $request->project_details;
    libxml_use_internal_errors(true);
    $dom = new \DomDocument();
    $dom->loadHtml('<?xml encoding="utf-8" ?>' . $project_details, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    $images = $dom->getElementsByTagName('img');
    if (count($images) > 0) {
        foreach ($images as  $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                $filename =auth()->id() . '_' . time() .
                    Str::random(5) . '_' . Carbon::now()->format('Y');
                $filepath = "uploads/project_details/$filename.$mimetype";
                $image = Image::make($src)
                    ->encode($mimetype, 100)
                    ->save(public_path($filepath), 80);
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            }
        }
    }
    $project_details = $dom->saveHTML();
        $id = Project::insertGetId([
            "department" => $request->department,
            "project_name" => $request->project_name,
            "project_details" => $project_details,
            "created_at" => now(),
        ]);
        $result = new project();
        $result->find($id)->projectRelation()->attach($request->department);
        return back();
    }
        
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('Project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return back();
    }
    public function proectrestore($id)
    {
        Project::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function proectdelete($id)
    {
        $project = Project::onlyTrashed()->find($id);
        $project_details = $project->project_details;
        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $dom->loadHtml('<?xml encoding="utf-8" ?>' . $project_details, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    // must include this to avoid font problem
        $images = $dom->getElementsByTagName('img');
        if (count($images) > 0) {
            foreach ($images as  $img) {
                $src = $img->getAttribute('src');
                $filename = last(explode("/", $src));
                unlink(base_path('public/uploads/project_details/' . $filename));
                # if the img source is 'data-url'
                if (preg_match('/data:image/', $src)) {
                    unlink(base_path('public/uploads/project_details/' . $filename));
                }
            }
        }
        $project->projectRelation()->detach();
        $project->forceDelete();
        return back();
    }
}
