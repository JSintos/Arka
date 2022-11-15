
@extends('layouts.admin-header')
@include('layouts.admin-nav')
@section('content')
@section('title','ARKA-Admin')
<div class="container p-5">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Unverified Subscriptions</button>
        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Verified Subscriptions</button>
    </nav>
    @if($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
          @endif
      
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <table class="table table-hover table-striped-columns ">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Reference Number</th>
                  <th>Phone Number</th>
                  <th>Action</th>
                </tr>
              </thead>
            @foreach ($subscriptions as $subscription)
              <tr>
                <td>{{ $subscription->userId }}</td>
                <td>{{ $subscription->referenceNumber }}</td>
                <td>{{ $subscription->phoneNumber }}</td>
                <td>
                  <form action="{{ route('admin/subscriptions') }}" method="POST">
                    @csrf
                    <input type="hidden" id ="subscriptionId" name="subscriptionId" value="{{ $subscription->subscriptionId }}" required>
                    <button type="submit" class="btn btn-outline-secondary "><i class="fa-solid fa-check mr-2"></i>Verify</button>
                  </form>
                </td>            
              </tr>
              @endforeach
            </table>
          </div>

          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>User ID</th>
                <th>Reference Number</th>
                <th>Phone Number</th>
              </tr>
            </thead>
            @foreach ($verifiedSubs as $verifiedSub)
              <tr>
                <td>{{ $verifiedSub->userId }}</td>
                <td>{{ $verifiedSub->referenceNumber }}</td>
                <td>{{ $verifiedSub->phoneNumber }}</td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
@endsection