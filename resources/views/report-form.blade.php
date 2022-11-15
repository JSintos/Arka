@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','Report')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="form-container">
    <a href="/chat">Go back to chat</a>
    <form class="form-box" method="POST" action="/report/{{ $reportedUser->userId }}">
        @csrf
        <div>
            <h3>You are reporting {{ $reportedUser->username }}.</h3>

            <p>Your report is anonymous. If someone is in immediate danger, call the local emergency services.</p>
        </div>

        <div class="mb-3">
            <h5 class="mt-5">Please select a reason:</h5>
            <select class="form-select" required aria-label="select example" name="reason">
                <option selected>Choose...</option>
                <option value="Sending threats to users">Sending threats to users.</option>
                <option value="Sending vulgar and inappropriate messages">Sending vulgar and inappropriate messages.</option>
                <option value="Promoting illegal activities">Promoting illegal activities.</option>
                <option value="Promoting cheating during group collaborations">Promoting cheating during group collaborations.</option>
                <option value="Asking or making the users accomplish an additional task">Asking or making the users accomplish an academic task.</option>
                <option value="Sending exams/answer sheets from any institution">Sending exams/answer sheets from any institution.</option>
            </select>
        </div>

        <div>
            <button class="report-btn" type="submit">Submit report</button>
        </div>
    </form>
</div>

@endsection
