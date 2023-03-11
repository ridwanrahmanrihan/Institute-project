@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Message Details</h6>
            <div class="card-body">
                <img src="{{ asset('uploads/principal_image') }}/{{ $principal->principal_image }}" alt="{{ $principal->principal_image }}">
                <div class="form-group row">
                    
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Principal Name </label>
                        <p type="text" class="form-control" id="exampleInputEmail2" >{{ $principal->principal_name }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Principal Message</label>
                        <p class="form-control"   name="description" >{{ $principal->principal_message }}</p>
                </div>
            </div>
        </div>
@endsection