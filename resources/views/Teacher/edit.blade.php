@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Update Teacher Info</h6>
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error )
                    <li><p class="text-danger">{{ $error }}</p></li>
                @endforeach
            </ul>
            @endif
            <form class="forms-sample" method="POST" action="{{ route('admin.teacher.update', ['teacher'=> $teacher->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Teacher Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2"  name="teacher_name" value="{{ $teacher->teacher_name }}" readonly>
                    </div>
                </div> 
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Teacher Phone Number</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="teacher_phone_number" value="{{ $teacher->teacher_phone_number }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Teacher Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputEmail2" autocomplete="off"  name="teacher_email" value="{{ $teacher->teacher_email}}" readonly>
                    </div>
                </div>
                 <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Department</label>
                        <select name="department" id="department"> 
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}" @selected($teacher->departmentRelation->first()->department_name === $department->id)>{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-3 col-form-label">Teacher Title</label>
                        <select name="teacher_title" class="form-control">
                            <option value="CI"  @selected($teacher->teacher_title=== 'CI')>CI</option>
                            <option value="instractor" @selected($teacher->teacher_title=== 'instractor')>instractor</option> 
                            <option value="juniorinstractor" @selected($teacher->teacher_title=== 'juniorinstractor')>juniorinstractor</option> 
                        </select>
                    </div>
                
                <button type="submit" class="btn btn-primary mr-2">Update Teacher Info</button>
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
<script>
    $(document).ready(function() {
        // category ajax
        $('#parent_category').change(function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/admin/post/subcategorylist',
                    data: {
                        category_id: category_id
                    },
                    success: function(data) {
                        $("#post_sub_category").html(data);
                    }
                });
            }
        })
    })
</script>
<script>
$(document).ready(function() {
    $('.tags').select2();
});
</script>
@endsection
