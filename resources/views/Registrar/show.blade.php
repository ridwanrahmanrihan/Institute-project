@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Details Registrar</h6>
            <img src="{{ asset('uploads/registrar_image') }}/{{ $registrar->registrar_image }}" alt="" class="card-img-top" style="width: 
            350px">
            <div class="card-body">
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Registrar Name</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $registrar->registrar_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Registrar Roll</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $registrar->registrar_phone_number }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Registrar Registration No</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $registrar->registrar_email }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Registrar Phone Number</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $registrar->educational_qualification }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Registrar Degicnation</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $registrar->registrar_designation }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Registrar Joined</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ \Carbon\Carbon::parse($registrar->created_at)->format('F d, Y')}}</p>
                </div>
            </div>
        </div>
@endsection