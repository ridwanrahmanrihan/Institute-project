@extends('frontend.layouts.app')
@section('content')
<body>
    
    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
      <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Our Teachers</h3>
        <div class="d-inline-flex text-white">
          <p class="m-0"><a class="text-white" href="{{ route('home') }}">Home</a></p>
          <p class="m-0 px-2">/</p>
          <p class="m-0">Our Teachers</p>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Team Start -->
    <div class="container-fluid pt-5">
      <div class="container">
        <div class="text-center pb-2">
          <p class="section-title px-5">
            <span class="px-2">Our Teachers</span>
          </p>
          <h1 class="mb-4">Meet Our Teachers</h1>
        </div>
        
        <div class="row">
            @foreach ($teachers as $teacher)
            <div class="col-md-6 col-lg-3 text-center team mb-5">
              <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
                <img class="img-fluid w-100" src="{{ asset('uploads/teacher_image') }}/{{ $teacher->teacher_image }}" alt="">
              </div>
              <h4>{{ $teacher->teacher_name }}</h4>
              <h5>{{ $teacher->departmentRelation->first()->department_name }}</h5>
              <i>{{ $teacher->teacher_title }}</i>
            </div>
            @endforeach
          </div>
          {{ $teachers->links("pagination::bootstrap-5") }}
      </div>
    </div>
    <!-- Team End -->
    @endsection
  