@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Create Project</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.project.store') }}" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Project Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="project_name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Department</label>
                        <select name="department" class="form-control">
                            <option value="">Select  Department</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group row">
                    <label for="summernote" class="col-sm-3 col-form-label">Project Details</label>
                    <div class="col-sm-9">
                        <textarea class="form-control"   name="project_details" rows="20" id="summernote"> </textarea>
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-primary mr-2">Create Project</button>
            </form>
        </div>
    </div>
</div> 
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $("#summernote").summernote({
            placeholder: 'describe your post',
            height: 400,
        });
        $('.select_js').select2();
    });
</script>
@endsection
