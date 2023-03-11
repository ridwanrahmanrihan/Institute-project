@extends('layouts.app')
@section('content')
<div class="card">
            <h6 class="card-title">Photo</h6>
            {{-- <img src="{{ asset('uploads/mupi_image') }}/{{ $photoGallery->mupi_image }}" alt="{{ $photoGallery->mupi_image }}" class="card-img-top" style="width: 
            350px"> --}}
            <div class="card-body">
                <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                <div class="form-group row"> 
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Notice Name</label>
                        <p type="text" class="form-control" id="exampleInputUsername2"  name="program_name" >{{ $notice->notice_name }}</p>
                </div>
                <div class="form-group row">
                    @php
                        echo $notice->notice_image
                    @endphp
                </div>
            </form>
            </div>
        </div>
@endsection