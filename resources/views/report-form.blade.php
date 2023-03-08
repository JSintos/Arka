@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Report')

<div class="form-container mb-5">
    <div class="row justify-content-center">
        <div class="mb-3">
            <a href="/chat"><i class="fa-sharp fa-solid fa-arrow-left mr-2"></i>Go back to chat</a>
        </div>

        <div class="card" style="width: 100%;">
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <form method="POST" action="/report/{{ $reportedUser->userId }}" enctype="multipart/form-data">
                    @csrf
                    <h3>You are reporting {{ $reportedUser->username }}.</h3>

                    <p>Your report is anonymous. If someone is in immediate danger, call the local emergency services.</p>

                    <div class="mb-3">
                        <h5 class="mt-3">Please select a reason:</h5>
                        <select class="form-select" required aria-label="select example" name="reason">
                            <option value="Sending threats to users">Sending threats to users.</option>
                            <option value="Sending vulgar and inappropriate messages">Sending vulgar and inappropriate messages.</option>
                            <option value="Promoting illegal activities">Promoting illegal activities.</option>
                            <option value="Promoting cheating during group collaborations">Promoting cheating during group collaborations.</option>
                            <option value="Asking the users accomplish an additional task">Asking or making the users accomplish an academic task.</option>
                            <option value="Sending exams/answer sheets from any institution">Sending exams/answer sheets from any institution.</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"></label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Briefly explain your reason for reporting this user.." required name="comment"></textarea>
                    </div>
                    <div class="mb-3">
                    <h5 class="mt-3">Upload proof</h5>
                        <label for="formFile" class="form-label">Kindly submit a proof (i.e. screenshots/image) to help us better review your report.</label>
                        <input class="form-control" type="file" required name="image">
                    </div>
                   
                        <button class="report-btn" type="submit">Submit report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
