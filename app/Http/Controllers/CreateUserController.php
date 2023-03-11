<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Auth\Events\Validated;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\Facades\Image;



class CreateUserController extends Controller
{
    public function create ()
    {
        $user_list = User::where('id','!=', auth()->id())->paginate(5)-> withQueryString() ;
        return view('create_user.create_user', compact('user_list'));
    }
    public function store (Request $request)
    {
        $request -> validate([
            "*"=> "required",
            "email"=>"email",
            "password"=>Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
        ]);
        User::insert([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password),
            "rol"=>$request->rol,
            "created_at"=>Carbon::now(),
            "email_verified_at"=>Carbon::now(),
        ]);
        if ($request->rol === 'addmin') {
            return back()->withSuccess('addmin created');
        };
        return back()->withSuccess('writer created');
    }
    public function distroy ($id)
    {
        User::find($id)->delete();
        return back()->withSuccess('User Deleted');
    }
    public function edit ()
    {
        return view('profile.edit');
    }
    public function update (Request $request, $id)
    {
        $request -> validate([
            "profile_image" => "mimes:jpg",
            "cover_image" => "mimes:jpg",
        ]);
        User::find($id)->update([
            "name"=>$request->name,
            "phone_number"=>$request->phone_number,
            "address"=>$request->address,
            "gender"=>$request->gender,
        ]);
        if ($request->hasFile('profile_image')) {
            $file_name = auth()->id().'.'.$request->file('profile_image')->getClientOriginalExtension();
            $img = Image::make($request->file('profile_image'));
            $img->resize(100,100)->save(base_path('/public/uploads/admin_profile_image/'.$file_name),90);
            User::find($id)->update([
                "profile_image"=> $file_name,
            ]);
        
        }
        if ($request->hasFile('cover_image')) {
            $file_name = auth()->id().'.'.$request->file('cover_image')->getClientOriginalExtension();
            $img = Image::make($request->file('cover_image'));
            $img->save(base_path('/public/uploads/admin_cover_image/'.$file_name),90);
            User::find($id)->update([
                "cover_image"=> $file_name,
            ]);
        }
        return back()->withSuccess('Profile Updated');
    }
    public function password_update(Request $request, $id)
    {
        $request->validate([
            "*" => "required",
            "new_password"=>[ "different:password", "same:confirm_password",Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ]);
        if (Hash::check( $request->password, auth()->user()->password)) {
            User:: find($id)-> update([
                "password"=> Hash::make($request->new_password),
            ]);
            return back()->withSuccess('Password Updated');
        }
    }
}
