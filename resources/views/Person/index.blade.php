@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Person List</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Person Name</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($persons as  $person )
                            <tr>
                                <td>{{$loop->iteration }}</td>
                                <td>{{ $person->persone_name }}</td>
                                <td>{{ $person->persone_title }}</td>
                                <td><img src="{{ asset('uploads/persone_image') }}/{{ $person->persone_image }}" alt=""></td>
                                <td>
                                    <form action="{{ route('admin.profile.destroy',['profile'=>$person->id]) }}" method="POST" >
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-danger delete">Delete</button></td></form>
                                    
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
@endsection
