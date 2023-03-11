<?php

namespace App\Http\Controllers;

use App\Models\account;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Account.index", [
            "accounts" => account::all(),        
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Account.create');
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
            "account_image" => "required |mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('account_image')->getClientOriginalExtension();
        $img = Image::make($request->file('account_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/account_image/'.$file_name),90);
        account::insert([
            "account_name" => $request->account_name,
            "account_phone_number" => $request->account_phone_number,
            "account_email" => $request->account_email,
            "educational_qualification" => $request->educational_qualification,
            "account_designation" => $request->account_designation,
            "account_image" => $file_name,
            "created_at" => now(),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(account $account)
    {
        return view('Account.show', compact('account'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(account $account)
    {
        return view('Account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, account $account)
    {
        $request->validate([
            "*" => "required",
            "account_image" => " mimes:jpg,png,jpeg",
        ]);
        if ($request->hasFile('account_image')) {
            unlink(base_path('/public/uploads/account_image/'.$account->account_image));
            $file_name = auth()->id() .'_'. time().Str::random(6) .'.'.$request->file('account_image')->getClientOriginalExtension();
            $img = Image::make($request->file('account_image'));
            $img->resize(100,100)->save(base_path('/public/uploads/account_image/'.$file_name),90);
            $account->update([
                "account_name" => $request->account_name,
                "account_phone_number" => $request->account_phone_number,
                "account_email" => $request->account_email,
                "educational_qualification" => $request->educational_qualification,
                "account_designation" => $request->account_designation,
                "account_image" => $file_name,
            ]);
         }
         $account -> update([
            "account_name" => $request->account_name,
                "account_phone_number" => $request->account_phone_number,
                "account_email" => $request->account_email,
                "educational_qualification" => $request->educational_qualification,
                "account_designation" => $request->account_designation,
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(account $account)
    {
        $account -> forceDelete();
        unlink(base_path('public/uploads/account_image/' . $account->account_image));
        return back();
    }
}
