<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Contract.index', [
            "contracts" => Contract::all(),
            "trash_contracts" => Contract::onlyTrashed()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Contract.create');
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
            "contract_name" => "required",
             "contract_image" => "required | mimes:jpg,png,jpeg",
        ]);
        $file_name = auth()->id() .'_'. time() .'.'.$request->file('contract_image')->getClientOriginalExtension();
        $img = Image::make($request->file('contract_image')); 
        $img->resize(100,100)->save(base_path('/public/uploads/contract_image/'.$file_name),90);
        Contract::insert([
            "contract_name" => $request->contract_name,
            "contract_image" => $file_name,
            "created_at" => now(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
    return view('Contract.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $contract -> delete();
        return back();
    }
    public function contractrestore($id)
    {
        Contract::onlyTrashed()->find($id)->restore();
        return back();
    }
    public function contractdelete($id)
    {
        
        $contract = Contract::onlyTrashed()->find($id);
        unlink(base_path('public/uploads/contract_image/' . $contract->contract_image));
        $contract->forceDelete();
        return back();
    }
}


