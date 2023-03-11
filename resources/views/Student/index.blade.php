@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Student List</h4>
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
                            <th>Student Name</th>
                            <th>Student Roll</th>
                            <th>Department</th>
                            <th>Student image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($trash_students as  $trash_student )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trash_student->student_name }}</td>
                            <td>{{ $trash_student->student_roll }}</td>
                            <td>{{ $trash_student->studenRelation->first()->department_name }}</td>
                            <td><img src="{{ asset('uploads/student_image') }}/{{  $trash_student->student_image }}" alt=""></td>
                            <td>
                                <a class="btn btn-success " href="{{ route('admin.student.restore',['id'=>$trash_student->id]) }}">restore</a>
                                <a class="btn btn-danger delete" href=" {{route('admin.student.delete',['id'=>$trash_student->id]) }}">Delete</a></td> 
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Student Name</th>
                                <th>Student Roll</th>
                                <th>Student Registretion No</th>
                                <th>Student Image</th>
                                <th>Student Department</th>
                                <th>Student Semester</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as  $student )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->student_roll }}</td>
                                <td>{{ $student->student_registretion }}</td>
                                <td><img src="{{ asset('uploads/student_image') }}/{{ $student->student_image }}" alt="{{ $student->student_image }}"></td>
                                <td>{{ $student->studenRelation->first()->department_name }}</td>
                                <td>{{ $student->student_seemester }}</td>
                                <td><a class="btn btn-info " href="{{ route('admin.student.show',['student'=>$student->id]) }}">show</a>
                                    <a class="btn btn-warning " href="{{ route('admin.student.edit',['student'=>$student->id]) }}">edit</a>
                                    <form action="{{ route('admin.student.destroy',['student'=>$student->id]) }}" method="POST" >
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
