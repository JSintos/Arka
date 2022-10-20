@extends('layouts.header')
@section('content')
@section('title','Register')
</div>
</nav>
<section class="flex-column min-vh-100 justify-content-center align-items-center mt-5 p-5">
    <div class="container">
        <div class="row"> 
            <div class="col-md-12 mx-auto rounded shadow bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <div class="m-3 p-2"><h2>Welcome back</h2><p>Login to continue using Arka</p></div>
                        <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                          <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="POST" action="{{ route('login') }}" class="m-3">
                                    @csrf
                                    <!-- Email Address -->
                                    <div class="mb-3 row">
                                        <x-label for="email" :value="__('Email')" class="col-sm-2 col-form-label-sm"/>
                                        <div class="col-sm-8">
                                            <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                                        </div>
                                    </div>
                                    <!-- Password -->
                                    <div class="mb-3 row">
                                        <x-label for="password" :value="__('Password')" class="col-sm-2 col-form-label-sm"/>
                                        <div class="col-sm-8">
                                            <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                        </div>
                                    </div>
                                    <!-- Remember Me -->
                                    <div class="col-12">
                                        <label for="remember_me" class="inline-flex items-center form-check-text">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-end mt-4">
                                    <div class="button">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                        <!-- <x-button class="ml-3">
                                            {{ __('Log in') }}
                                        </x-button> -->
                                        <button class="secondary-btn ml-4 text-sm" type="submit">Log in</button>
                                    </div>
                                    </div>
                                </form>
                    </div>
                    <div class="col-md-6">
                    <div> 
                        <img src="../images/login.svg" alt="register-image" class="img-fluid mb-4">
                    </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>

      
    @endsection