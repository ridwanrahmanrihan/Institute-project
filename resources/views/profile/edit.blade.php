@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="profile-page tx-13">
      <div class="row">
        <div class="col-12 grid-margin">
                        <div class="profile-header">
                            <div class="cover">
                                <div class="gray-shade"></div>
                                <figure>
                                    <img src="{{ asset('uploads/admin_cover_image') }}/{{ auth()->user()->cover_image }}" class="img-fluid" alt="profile cover">
                                </figure>
                                <div class="cover-body d-flex justify-content-between align-items-center">
                                    <div>
                                        <img class="profile-pic" src="{{ asset('uploads/admin_profile_image') }}/{{ auth()->user()->profile_image }}" alt="profile">
                                        <span class="profile-name" >{{ Auth::user()->name }}</span>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
        
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Update Profile</h6>
                            <form class="forms-sample" method="POST" action="{{ route('admin.profile.setting.update', ['id'=>auth()->id()]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="exampleInputUsername2" name="name"  value="{{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="email" readonly value="{{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">phone number</label>
                                    <div class="col-sm-9">
                                        <input type="tet" class="form-control" id="" autocomplete="off"  name="phone_number" value="{{ Auth::user()->phone_number }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="" autocomplete="off"  name="address" value="{{ Auth::user()->address }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Profile Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="" autocomplete="off"  name="profile_image" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Cover Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" id="" autocomplete="off"  name="cover_image" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rol" class="col-sm-3 col-form-label">Role</label>
                                    <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off"  readonly value="{{ Auth::user()->rol }}">
                                    </div>
                                <div class="form-group row">
                                    <label for="rol" class="col-sm-3 col-form-label">Gender</label>
                                    <select name="gender" id="">
                                        <option value="male" @selected( Auth::user()->gender === 'male' )>male</option>
                                        <option value="female" @selected( Auth::user()->gender === 'female')>female</option>
                                    </select>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mr-2">Profile Update</button>
                            </form>
                        </div>
                    </div>
                </div> 
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Chang Your Passwoard</h6>
                            @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error )
                                    <li><p class="text-danger">{{ $error }}</p></li>
                                @endforeach
                            </ul>
                            @endif
                            <form class="forms-sample" method="POST" action="{{ route('admin.profile.password.update', ["id" => auth()->id()]) }}" >
                                @csrf
                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label"> Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="exampleInputPassword2" autocomplete="off" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label"> New Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="exampleInputPassword2" autocomplete="off" name="new_password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="exampleInputPassword2" autocomplete="off" name="confirm_password">
                                    </div>
                                </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary mr-2">Password Update</button>
                            </form>
                        </div>
                    </div>
                </div>  
        @endsection
@section('script')
@if (session('success'))
<script>
   
   $(document).ready(function(){
            const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
Toast.fire({
  icon: 'success',
  title: '{{session('success')}}',
})
    })
   
</script>
@endif
@endsection