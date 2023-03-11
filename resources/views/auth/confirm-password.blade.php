
@extends('layouts.guest')
@section('content')
<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
            <div class="col-md-4 pr-md-0">
              <div class="auth-left-wrapper">

              </div>
            </div>
            <div class="col-md-8 pl-md-0">
              <div class="auth-form-wrapper px-4 py-5">
                <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
                <h5 class="text-muted font-weight-normal mb-4">Create a free account.</h5>
                <form class="forms-sample" method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password" name="password"> 
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                  </div>
                  <div class="mt-3">
                    <a  href="{{ route('Confirm') }}" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">Confirm Password</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
