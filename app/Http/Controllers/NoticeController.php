<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Stringable;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Notice.index',[
            "notices" => Notice::all(),
            "trash_notices" => Notice::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Notice.create');
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
            "notice_name" => "required",
            "notice_image" => "required",
            "notice_description" => "required",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('notice_image')->getClientOriginalExtension();
        $img = Image::make($request->file('notice_image')); 
        $img->save(base_path('/public/uploads/notice_image/'.$file_name),90);
        $id = Notice::insertGetId([
            "notice_name" => $request->notice_name,
            "notice_description" => $request->notice_description,
            "notice_image" => $file_name,
            "created_at" => now(),
        ]);
        return back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        return view("Notice.show", compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return back();
    }
    public function noticerestore($id)
    {
        Notice::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function noticedelete(Request $request, $id)
    {
        $notice_data = Notice::onlyTrashed()->find($id);
        $notice = $notice_data->notice_image;
        libxml_use_internal_errors(true);
        $dom = new \DomDocument();
        $dom->loadHtml('<?xml encoding="utf-8" ?>' . $notice, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    // must include this to avoid font problem
        $images = $dom->getElementsByTagName('img');
        if (count($images) > 0) {
            foreach ($images as  $img) {
                $src = $img->getAttribute('src');
                $filename = last(explode("/", $src));
                unlink(base_path('public/uploads/notice_image/' . $filename));
                # if the img source is 'data-url'
                if (preg_match('/data:image/', $src)) {
                    unlink(base_path('public/uploads/notice_image/' . $filename));
                }
            }
        }
        $notice_data = Notice::onlyTrashed()->find($id);
        $notice_data->forceDelete();
        return back()->with('delete', 'Notice deleted');       
    }
}
