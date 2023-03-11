@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Update Registrar Innfo</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            
            <form class="forms-sample" method="POST" action="{{ route('admin.registrar.update', ['registrar'=> $registrar->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Registrar Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="registrar_name" value="{{ $registrar->registrar_name }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Registrar Phone Number</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="registrar_phone_number" value="{{ $registrar->registrar_phone_number }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Registrar Email </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="registrar_email" value="{{ $registrar->registrar_email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Registrar Qualification </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="educational_qualification" value="{{ $registrar->educational_qualification }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Registrar Designation </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="registrar_designation" value="{{ $registrar->registrar_designation }}">
                    </div>
                </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">Registrar Image</label>
                        <img src="{{ asset('uploads/registrar_image') }}/{{ $registrar->registrar_image }}" alt="{{ $registrar->registrar_image }}" class="card-img-top" style="width: 
                        350px">
                        </div>
                    <div class="form-group row">
                        <label for="summernote" class="col-sm-3 col-form-label"> Change Registrar Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="registrar_image"  class="form-control" id="summernote" >
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Update Registrar Info</button>
            </form>
        </div>
    </div>
</div> 
@endsection
