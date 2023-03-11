@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Security List</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Name</th>
                                <th>Degicnation</th>
                                <th>Image</th>
                                <th>Joined</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($securitys as  $security )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $security->security_name }}</td>
                                <td>{{ $security->security_designation }}</td>
                                <td><img src="{{ asset('uploads/security_image') }}/{{ $security->security_image }}" alt="{{ $security->security_image }}"></td>
                                <td>{{ \Carbon\Carbon::parse($security->created_at)->format('F d, Y')}}</td>
                                <td><a class="btn btn-info " href="{{ route('admin.security.show',['security'=>$security->id]) }}">show</a>
                                    <a class="btn btn-warning " href="{{ route('admin.security.edit',['security'=>$security->id]) }}">edit</a>
                                    <form action="{{ route('admin.security.destroy',['security'=>$security->id]) }}" method="POST" >
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
