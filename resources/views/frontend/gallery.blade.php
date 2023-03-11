@extends('frontend.layouts.app')
@section('content')
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
      <h3 class="display-3 font-weight-bold text-white">Gallery</h3>
      <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="{{ route('home') }}">Home</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Gallery</p>
      </div>
    </div>
  </div>
  <div class="container-fluid pt-5 pb-3 photo">
    <div class="container">
      <div class="text-center pb-2">
        <p class="section-title px-5">
          <span class="px-2">MUPI Gallery</span>
        </p>
        <h1 class="mb-4">Our  Institute Gallery</h1>
      </div>
     
      <div class="row portfolio-container" style="position: relative; height: 467.954px;">
        @foreach ($galleries as $gallery)
        <div class="col-lg-4 col-md-6 mb-4 portfolio-item first" style="position: absolute; left: 0px; top: 0px;">
          <div >
            <img class="img-fluid w-100" src="{{ asset('uploads/mupi_image') }}/{{ $gallery->mupi_image }}" alt="">
            <h4>{{ $gallery->program_name }}</h4>
          </div>
        </div>
      @endforeach
      </div>
      {{ $galleries->links("pagination::bootstrap-5") }}
    </div>
  </div>
@endsection