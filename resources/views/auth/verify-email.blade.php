@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Verify Email')
<section class="flex-column min-vh-100 justify-content-center align-items-center mt-5 p-5">
    <div class="container">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>
        @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <x-button class="secondary-btn ml-4 second-text">
            {{ __('Resend Verification Email') }}
            </x-button>
        </div>
            </div>
        </div>
    </form>
    </div>
</section>
@endsection