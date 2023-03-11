
@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Create Notice</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.notice.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Notice Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="notice_name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Notice Image</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="exampleInputPassword2" autocomplete="off" name="notice_image">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="summernote" class="col-sm-3 col-form-label">Notice Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control"   name="notice_description" rows="20"> </textarea>
                    </div>
                </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Create Notice</button>
            </form>
        </div>
    </div>
</div> 
@endsection
