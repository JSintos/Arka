@extends('layouts.header')
@section('content')
@section('title','ARKA-Sign Up')

<body class="blue">

    <section class="flex-column min-vh-80 justify-content-center align-items-center mt-5 p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto rounded shadow bg-white">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <img src="../images/register.svg" alt="register-image" class="img-thumbnail border-0 p-2 mt-4">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="m-3 p-2"><h2>Sign Up for an Account</h2><p>Create an account to join our different communities</p></div>
                            <!-- Validation Errors -->
                            @if($message = Session::get('success'))
                            <div class="alert alert-danger">
                                <p>{{$message}}</p>
                            </div>
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            @endif
                            <form method="POST" action="{{ route('register') }}" class="m-3">
                                @csrf
                                <!-- Name -->
                                <div class="mb-3 row">
                                    <x-label for="name" :value="__('Username')" class="col-sm-2 col-form-label-sm"/>
                                    <div class="col-sm-10">
                                        <x-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                                        <small>Don't use your real name for your username.</small>
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="mb-3 row">
                                    <x-label for="email" :value="__('Email')" class="col-sm-2 col-form-label-sm"/>
                                    <div class="col-sm-10">
                                        <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="mb-3 row">
                                    <x-label for="password" :value="__('Password')" class="col-sm-2 col-form-label-sm"/>
                                    <div class="col-sm-10">
                                        <x-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3 row">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')" class="col-sm-2 col-form-label-sm"/>
                                    <div class="col-sm-10">
                                        <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                                    </div>
                                </div>
                                <div class="row flex">
                                        <div class="col-sm-3">
                                            <span>{!! captcha_img() !!}</span>
                                        </div>
                                        <div class="col-sm-9 align-item-left">
                                            <x-input id="captcha" class="form-control" placeholder="Enter the captcha text.." type="text" name="captcha" required />
                                        </div>
                                </div>

                                  <!-- Terms and Condition -->
                                <div class="col-12 mt-5">
                                    <div class="form-check form-check-text">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" required>
                                    <label class="form-check-label text-sm" for="gridCheck">
                                        I agree with the <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('terms-and-condition') }}">
                                        {{ __('Terms & Conditions') }}
                                    </a> and
                                    </label>
                                    <label class="form-check-label text-sm" for="gridCheck">
                                       <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('privacy-policy') }}">
                                        {{ __('Privacy Policy') }}
                                    </a> of Arka.
                                    </label>
                                    </div>
                                </div>
                                <!-- Buttons/links -->
                                <div class="flex items-center justify-end mt-4">
                                    <div class="button">
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 text-sm" href="{{ route('login') }}">
                                            {{ __('Login now') }}
                                        </a>
                                        <button class="secondary-btn ml-4 text-sm" type="submit">Create account</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
@endsection





