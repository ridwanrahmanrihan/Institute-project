@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Create Deaprtment</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.department.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Department Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="department_name" >
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Department About</label>
                    <div class="col-sm-9">
                        <textarea name="department_about" id="9" class="form-control"  rows="20"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Department Image</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="exampleInputUsername2"  name="department_image" >
                    </div>
                    </div>
                
                <button type="submit" class="btn btn-primary mr-2">Create Department</button>
            </form>
        </div>
    </div>
</div> 
@endsection
