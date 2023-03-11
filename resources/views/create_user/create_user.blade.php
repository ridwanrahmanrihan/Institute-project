@extends('layouts.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Create Addmin or Writer</h6>
            <form class="forms-sample" method="POST" action="{{ route('admin.user.store') }}" >
                @csrf
                <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" placeholder="username" name="name" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputPassword2" autocomplete="off" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rol" class="col-sm-3 col-form-label">Rol</label>
                        <select name="rol" class="form-control">
                            <option value="addmin">addmin</option>
                            <option value="writer">writer</option>
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary mr-2">Create User</button>
            </form>
        </div>
    </div>
</div>    
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Addmin & Writer Table</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user_list as  $user )
                            <tr>
                                <td>{{ $user_list->firstItem() + $loop->index }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td><p class="badge @if ($user->rol==='addmin')
                                    badge-success
                                    @else
                                    badge-warning @endif">
                                {{ $user->rol }}</p></td>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                <td><button class="btn btn-danger delete" value="{{ route('admin.user.distroy',['id'=>$user->id]) }}">delete</button></td>
                            </tr>
                            @empty
                                
                            @endforelse
                            
                        </tbody>
                    </table>
                    <div class="mt-5">{{ $user_list->links() }}</div>
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
@endif
<script>
    $(document).ready(function(){
        $('.delete').click(function(){
            const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    window.location.assign($(this).val())
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
    )
  }
})
        })
       

    })
</script>
@endsection