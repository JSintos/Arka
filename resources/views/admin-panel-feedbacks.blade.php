@extends('layouts.admin-header')
@include('layouts.admin-nav')
@section('content')
@section('title','ARKA-Admin') 
<div class="container p-5">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Monthly Feedbacks</button>
        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Room Feedbacks</button>
    </nav>
    @if($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
          @endif

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <table class="table table-hover ">
            <thead>
              <tr>
                <th>Date</th>
                <th>Rating</th>
              </tr>
            </thead>
          @foreach ($monthlyFeedbacks as $monthlyFeedback)
            <tr>
              <td>{{ $monthlyFeedback->dateFeedbackAnswered }}</td>
              <td>{{ $monthlyFeedback->firstQuestionRating }}</td>   
            </tr>
            @endforeach
          </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <table class="table table-bordered">
          <thead>
              <tr>
                <th>Date</th>
                <th>1st Question Rating</th>
                <th>2nd Question Rating</th>
                <th>3rd Question Rating</th>
                <th>4th Question Rating</th>
              </tr>
          </thead>
          @foreach ($roomFeedbacks as $roomFeedback)
            <tr>
              <td>{{ $roomFeedback->dateFeedbackAnswered }}</td>
              <td>{{ $roomFeedback->firstQuestionRating }}</td>
              <td>{{ $verifiedSub->secondQuestionRating }}</td>
              <td>{{ $verifiedSub->thirdQuestionRating }}</td>
              <td>{{ $verifiedSub->fourthQuestionRating }}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
</div>

 @endsection