@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Teacher List</h4>
                <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
    Trash
  </button>
  <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive pt-3"> 
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Teacher Name</th>
                            <th>Teacher Image</th>
                            <th>Department</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trash_teachers as  $trash_teacher )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trash_teacher->teacher_name }}</td>
                            <td><img src="{{ asset('uploads/teacher_image') }}/{{ $trash_teacher->teacher_image }}" alt="{{ $trash_teacher->teacher_image }}"></td>
                            <td>{{ $trash_teacher->departmentRelation->first()->department_name  }}</td>
                            <td>{{ $trash_teacher->teacher_title  }}</td>
                            <td>
                                <a class="btn btn-success " href="{{ route('admin.teacher.restore',['id'=>$trash_teacher->id]) }}">restore</a>
                                <a class="btn btn-danger delete" href=" {{route('admin.teacher.delete',['id'=>$trash_teacher->id]) }}">Delete</a></td> 
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Teacher Name</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Department</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($teachers as  $teacher )
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{ $teacher->teacher_name }}</td>
                                <td>{{ $teacher->teacher_phone_number }}</td>
                                <td>{{ $teacher->teacher_email }}</td>
                                <td>{{ $teacher->departmentRelation->first()->department_name }}</td>
                                <td>{{ $teacher->teacher_title }}</td>
                                <td><img src="{{ asset('uploads/teacher_image') }}/{{ $teacher->teacher_image }}" alt=""></td>
                                <td><a class="btn btn-info " href="{{ route('admin.teacher.show',['teacher'=>$teacher->id]) }}">show</a>
                                    <a class="btn btn-warning " href="{{ route('admin.teacher.edit',['teacher'=>$teacher->id]) }}">edit</a>
                                    <form action="{{ route('admin.teacher.destroy',['teacher'=>$teacher->id]) }}" method="POST" >
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger delete">Delete</button></td></form>
                                    
                            </tr>
                            @empty
                                
                            @endforelse
                            
                        </tbody>
                    </table>
                    {{-- <div class="mt-5">{{ $parent_categories->links() }}</div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@if (session('success'))
<script>
   
   $(document).ready(function(){
            const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
Toast.fire({
  icon: 'success',
  title: '{{session('success')}}',
})
    })
   
</script>
@elseif (session('error'))
<script>
   
    $(document).ready(function(){
             const Toast = Swal.mixin({
   toast: true,
   position: 'top-end',
   showConfirmButton: false,
   timer: 3000,
   timerProgressBar: true,
   didOpen: (toast) => {
     toast.addEventListener('mouseenter', Swal.stopTimer)
     toast.addEventListener('mouseleave', Swal.resumeTimer)
   }
 })
 Toast.fire({
   icon: 'error',
   title: '{{session('error')}}',
 })
     })
    
 </script>
@endif
@endsection
