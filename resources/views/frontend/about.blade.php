@extends('frontend.layouts.app')
@section('content')
<div class="container-fluid py-5">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('frontend') }}/assets/img/2019-07-31.jpg" alt="">
        </div>
        <div class="col-lg-7">
          <h1 class="mb-4">Best Institute for Diploma Engineering in Bangladesh</h1>
          <p>
            Munshiganj Polytechnic Institute started its journey on 22/07/2006. As the infrastructure work of the new building was not completed, it first started operations with 2 technology computers and electronics in Munshiganj Technical School and College.
          </p>
          <div class="row pt-2 pb-4">
            <div class="col-6 col-md-4">
              <img class="img-fluid rounded" src="img/about-2.jpg" alt="">
            </div>
            <div class="col-6 col-md-8">
              <ul class="list-inline m-0">
                <li class="py-2 border-top border-bottom">
                  <i class="fa fa-check text-primary mr-3"></i>Good Communication
                </li>
                <li class="py-2 border-bottom">
                  <i class="fa fa-check text-primary mr-3"></i>Helpful Teacher
                </li>
                <li class="py-2 border-bottom">
                  <i class="fa fa-check text-primary mr-3"></i>The campus is without politic
                </li>
              </ul>
            </div>
          </div>
          <h5 class="thank">Thank You</h5>
        </div>
      </div>
    </div>
  </div>
@endsection