{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form >
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

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
                <h5 class="text-muted font-weight-normal mb-4">Forget Password</h5>
                <form class="forms-sample"method="POST" action="{{ route('password.email') }}">
                    @csrf
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus> 
                    @error('email')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="current-password" placeholder="Password" name="password"> 
                    @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                  </div>
                  <label>
                  <div><button class="btb btn-danger"><a href="{{ route('password.reset') }}" class="d-block mt-3 text-muted">Forget Password</a>
                </button>
            </div>
        </label>
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