@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Update Job Seeker Info</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            
            <form class="forms-sample" method="POST" action="{{ route('admin.job.update', ['job'=> $job->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label"> Phone Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="jober_phone_number" value="{{ $job->jober_phone_number }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Company </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="jober_company" value="{{ $job->jober_company }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Status </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="jober_status" value="{{ $job->jober_status }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Designation </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="jober_designation" value="{{ $job->jober_designation }}">
                    </div>
                </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label"> Image</label>
                        <img src="{{ asset('uploads/jober_image') }}/{{ $job->jober_image }}" alt="{{ $job->jober_image }}" class="card-img-top" style="width: 
                        350px">
                        </div>
                    <div class="form-group row">
                        <label for="summernote" class="col-sm-3 col-form-label"> Change  Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="jober_image"  class="form-control" id="summernote" >
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Update Job Seeker Info</button>
            </form>
        </div>
    </div>
</div> 
@endsection
