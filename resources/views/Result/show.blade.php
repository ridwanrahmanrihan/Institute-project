@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Details Result</h6>
            <img src="{{ asset('uploads/result_image') }}/{{ $result->result_image }}" alt="" class="card-img-top" style="width: 
            350px">
            <div class="card-body">
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Result Title</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $result->result_title }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Department</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $result->resultRelation->first()->department_name }}</p>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Academic Year</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="name" >{{ $result->academic_year }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Shift</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ $result->result_shift }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Semester</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ $result->result_seemester }}</p>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Semester</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ $result->result_image }}</p>
                </div>
                <div class="form-group row">
                        {{-- <a href="{{ url('resultdownload',$result->result_image ) }}" class="col-sm-3 col-form-label">download</a> --}}
                        <a href="{{ url('admin/resultdownload',$result->result_image) }}" class="col-sm-3 col-form-label">download</a>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Result Published</label>
                        <p type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="slug">{{ \Carbon\Carbon::parse($result->created_at)->format('F d, Y')}}</p>
                </div>
            </div>
        </div>
@endsection