@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Update Officer Info</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            
            <form class="forms-sample" method="POST" action="{{ route('admin.office.update', ['office'=> $office->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Oficer Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="officer_name" value="{{ $office->officer_name }}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Oficer Phone Number</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="officer_phone_number" value="{{ $office->officer_phone_number }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Oficer Email </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="officer_email" value="{{ $office->officer_email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Oficer Qualification </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="educational_qualification" value="{{ $office->educational_qualification }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Oficer Designation </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="officer_designation" value="{{ $office->officer_designation }}">
                    </div>
                </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">Officer Image</label>
                        <img src="{{ asset('uploads/officer_image') }}/{{ $office->officer_image }}" alt="{{ $office->officer_image }}" class="card-img-top" style="width: 
                        350px">
                        </div>
                    <div class="form-group row">
                        <label for="summernote" class="col-sm-3 col-form-label"> Change Officer Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="officer_image"  class="form-control" id="summernote" >
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Update Officer Info</button>
            </form>
        </div>
    </div>
</div> 
@endsection
