@extends('layouts.app')
@section('content')  
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"> Principal Message List </h4>
            <div class="table-responsive pt-3">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Principal Name</th>
                            <th>Principal Image</th>
                            <th>Publish date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($messages as  $message )
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $message->principal_name}}</td>
                            <td><img src="{{ asset("uploads/principal_image") }}/{{ $message->principal_image }}" alt="{{ $message->principal_image }}"></td>
                            <td>{{ \Carbon\Carbon::parse($message->created_at)->format('F d, Y')}}</td>
                            <td><a class="btn btn-info " href="{{ route('admin.principal.show',['principal'=>$message->id]) }}">show</a>
                                <a class="btn btn-warning " href="{{ route('admin.principal.edit',['principal'=>$message->id]) }}">edit</a>
                            <form action=" {{route('admin.principal.destroy',['principal'=>$message->id]) }}" method="post">
                                @csrf
                                @method("DELETE")
                            <button class="btn btn-danger">Delete</button>
                            </form>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection