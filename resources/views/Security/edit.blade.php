@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Update Security Info</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            
            <form class="forms-sample" method="POST" action="{{ route('admin.security.update', ['security'=> $security->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="security_name" value="{{ $security->security_name }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Phone Number</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="security_phone_number" value="{{ $security->security_phone_number }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Email </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="security_email" value="{{ $security->security_email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Qualification </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="educational_qualification" value="{{ $security->educational_qualification }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Designation </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="security_designation" value="{{ $security->security_designation }}">
                    </div>
                </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label"> Image</label>
                        <img src="{{ asset('uploads/security_image') }}/{{ $security->security_image }}" alt="{{ $security->security_image }}" class="card-img-top" style="width: 
                        350px">
                        </div>
                    <div class="form-group row">
                        <label for="summernote" class="col-sm-3 col-form-label"> Change  Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="security_image"  class="form-control" id="summernote" >
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Update  Info</button>
            </form>
        </div>
    </div>
</div> 
@endsection
