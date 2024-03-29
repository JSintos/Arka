@extends('layouts.admin-header')
@include('layouts.admin-nav')
@section('content')
@section('title','ARKA-Admin')
<div class="container p-5">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-unresolved-tab" data-toggle="tab" data-target="#nav-unresolved" type="button" role="tab" aria-controls="nav-unresolved" aria-selected="true">Unresolved Reports</button>
        <button class="nav-link" id="nav-resolved-tab" data-toggle="tab" data-target="#nav-resolved" type="button" role="tab" aria-controls="nav-resolved" aria-selected="false">Resolved Reports</button>
    </nav>
    @if($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
    @endif
    <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-unresolved" role="tabpanel" aria-labelledby="nav-unresolved-tab">
            <table class="table table-striped-columns ">
              <thead>
                <tr>
                  <th>User</th>
                  <th>Report Description</th>
                  <th>Comment</th>
                  <th>Reported User</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              @foreach ($unresolvedReports as $unresolved)
              <tr>
              @foreach ($users as $user)
                  @if($unresolved->userId == $user->userId)
                <td>{{ $user->username }}</td>
                  @endif
                @endforeach
                <td>{{ $unresolved->reportDescription }}</td>
                <td>{{ $unresolved->comment}}</th>
                @foreach ($users as $user)
                  @if($unresolved->reportedUserId == $user->userId)
                <td>{{ $user->username }}</td>
                  @endif
                @endforeach
                <td>
                   <img src="{{ url('public/images/'.$unresolved->image) }}"
                    style="height: 100px; width: 150px;">
	              </td>
                <td>
                  <form action="{{ route('admin/reports/ban') }}" method="POST">
                    @csrf
                    <input type="hidden" id ="reportId" name="reportId" value="{{ $unresolved->reportId }}" required>
                    <input type="hidden" id ="reportedUserId" name="reportedUserId" value="{{ $unresolved->reportedUserId }}" required>
                    <div class="button">
                      <button type="submit" class="action"><i class="fa-solid fa-ban mr-2"></i>Ban</button>
                    </div>
                  </form>
                 <form action="{{ route('admin/reports') }}" method="POST">
                    @csrf
                    <input type="hidden" id ="reportId" name="reportId" value="{{ $unresolved->reportId }}" required>
                    <div class="button">
                      <button type="submit" class="action"><i class="fa-solid fa-trash mr-2"></i>Delete</button>
                    </div>
                  </form>
                    
                  </td> 
                </div>           
              </tr>
              @endforeach
            </table>
          </div>

          <div class="tab-pane fade" id="nav-resolved" role="tabpanel" aria-labelledby="nav-resolved-tab">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>User ID</th>
                <th>Report Description</th>
                <th>Comment</th>
                <th>Reported User ID</th>
                <th>Resolution Status</th>
                <th>Image</th>
                <th>Resolved By</th>
              </tr>
            </thead>
            @foreach ($resolvedReports as $resolved)
            <tr>
                @foreach ($users as $user)
                  @if($resolved->userId == $user->userId)
                <td>{{ $user->username }}</td>
                  @endif
                @endforeach
                <td>{{ $resolved->reportDescription }}</td>
                <td>{{ $resolved->comment}}</th>
                @foreach ($users as $user)
                  @if($resolved->reportedUserId == $user->userId)
                <td>{{ $user->username }}</td>
                  @endif
                @endforeach
                @if($resolved->resolutionStatus == 0)
                <td>Acknowledged</td>
                @endif
                @if($resolved->resolutionStatus == 1)
                <td>Banned</td>
                @endif
                <td>
                   <img src="{{ url('public/images/'.$resolved->image) }}"
                    style="height: 100px; width: 150px;">
	              </td>
                @foreach ($users as $user)
                  @if($resolved->resolvedBy == $user->userId)
                <td>{{ $user->username }}</td>
                  @endif
                @endforeach
                <td></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
</div>
@endsection