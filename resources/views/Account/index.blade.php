@extends('layouts.app')
@section('content')  
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Accounted List</h4>
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
                            @forelse ($accounts as  $account )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $account->account_name }}</td>
                                <td>{{ $account->account_designation }}</td>
                                <td><img src="{{ asset('uploads/account_image') }}/{{ $account->account_image }}" alt="{{ $account->account_image }}"></td>
                                <td>{{ \Carbon\Carbon::parse($account->created_at)->format('F d, Y')}}</td>
                                <td><a class="btn btn-info " href="{{ route('admin.account.show',['account'=>$account->id]) }}">show</a>
                                    <a class="btn btn-warning " href="{{ route('admin.account.edit',['account'=>$account->id]) }}">edit</a>
                                    <form action="{{ route('admin.account.destroy',['account'=>$account->id]) }}" method="POST" >
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
