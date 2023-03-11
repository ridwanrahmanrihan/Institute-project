@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Add New Photo</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.photoupload.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Program Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="program_name" >
                    </div>
                </div>
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Photo</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="exampleInputUsername2"  name="mupi_image" >
                    </div>
                </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
</div> 
@endsection
