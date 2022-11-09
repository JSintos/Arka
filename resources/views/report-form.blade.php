@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','Report')

<!-- Report Form -->
<div class="form-container">
  <form class="form-box">
    <div>
    <h3>Please select a problem</h3>
    <p>Your report is anonymous. If someone is in immediate danger, call the local emergency services.</p>
    </div>
<div class="mb-3">
    <select class="form-select" required aria-label="select example" >
      <option selected>Choose...</option>
        <option value="1">Sending threats to users.</option>
        <option value="2">Sending vulgar and inappropriate messages.</option>
        <option value="3">Promoting illegal activities.</option>
        <option value="4">Promoting cheating during group collaborations.</option>
        <option value="5">Asking or making the users accomplish an academic task.</option>
        <option value="6">Sending exams/answer sheets from any institution.</option>
    </select>
    <div class="invalid-feedback">Example invalid select feedback</div>
  </div>
<div class="mb-3">
    <label for="reportDescription" class="form-label">Description</label>
    <textarea class="form-control" id="reportDescription" placeholder="Write a description for your report." required></textarea>
    <div class="invalid-feedback">
    Required example textarea.
    </div>
  </div>
  <div class="col-12">
    <button class="report-btn" type="submit">Submit form</button>
  </div>
</form>
</div>
@endsection