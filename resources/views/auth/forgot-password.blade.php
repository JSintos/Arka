@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Account Settings')
</div>
</nav>
<div class="form-container mb-5">
    <div class="row justify-content-center">
        <div class="card" style="width: 50%;">
            <div class="card-body">
                <p>
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </p>
                <p class="card-text">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" class="form-label" :value="__('Email')" />

                            <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
                </p>
                <div class="button">
                    <button class="secondary-btn" type="submit">Email Password Reset Link</button> 
                </div>
</form>
  </div>
</div>
</div>
</div>

        

        

            
        
@endsection
