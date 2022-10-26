@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Account Settings')
</div>
</nav>
<section class="flex-column min-vh-100 justify-content-center align-items-center mt-5 p-5">
<div class="container">
    <!-- <div class="row"> -->
        <div class="col-md-10 offset-2 mx-auto rounded shadow bg-white">
            <div class="panel panel-box ml-5">
                <h2>Change password</h2> 

                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{ route('change-password') }}" class="m-3">
                        @csrf

                        <div class="mb-3 row{{ $errors->has('current-password') ? ' has-error' : '' }}">
                            <label for="new-password"><strong>Current Password</strong></label>
                            <div class="col-sm-10">
                                <input id="current-password" type="password" class="form-control" name="current-password" required>
                            </div>

                                @if ($errors->has('current-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="mb-3 row{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password"><strong>New Password</strong></label>
                            <div class="col-sm-10">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>
                            </div>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                                
                        </div>

                        <div class="mb-3 row {{ $errors->has('new-password-confirmation') ? ' has-error' : '' }}">
                            <label for="new-password-confirmation"><strong>Confirm New Password</strong></label>
                            <div class="col-sm-10">
                             <input id="new-password-confirmation" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="button">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('update-user') }}">
                                {{ __('Go Back') }}
                            </a>
                            <x-button class="secondary-btn ml-4 second-text">
                                {{ __('Change Password') }}
                            </x-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection