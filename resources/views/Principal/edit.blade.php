@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Update Info</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            
            <form class="forms-sample" method="POST" action="{{ route('admin.principal.update', ['principal'=> $principal->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Principal name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="principal_name" value="{{ $principal->principal_name }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Principal Message </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="principal_message" value="{{ $principal->principal_message }}">
                    </div>
                </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Principal Image </label>
                    <div class="col-sm-9">
                        <img src="{{ asset('uploads/principal_image') }}/{{ $principal->principal_image }}" alt="{{ $principal->principal_image }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label"> Principal Image </label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="principal_image" value="{{ $principal->principal_image }}">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Update Info</button>
            </form>
        </div>
    </div>
</div> 
@endsection
