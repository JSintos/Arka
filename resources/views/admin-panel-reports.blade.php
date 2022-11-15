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
            <table class="table table-hover table-striped-columns ">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Report Description</th>
                  <th>Reported User ID</th>
                  <th>Action</th>
                </tr>
              </thead>
              @foreach ($unresolvedReports as $unresolved)
              <tr>
                <td>{{ $unresolved->userId }}</td>
                <td>{{ $unresolved->reportDescription }}</td>
                <td>{{ $unresolved->reportedUserId }}</td>
                <td>
                  <form action="{{ route('admin/reports') }}" method="POST">
                        @csrf
                        <input type="hidden" id ="" name="" value="" required>
                        <button type="submit" class="btn btn-outline-secondary "><i class="fa-solid fa-ban mr-2"></i>Ban</button>
                        <button type="submit" class="btn btn-outline-secondary "><i class="fa-solid fa-trash mr-2"></i>Delete</button>
                    </form>
                </td>            
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
                <th>Reported User ID</th>
                <th>Status</th>
                <th>Resolution Status</th>
                <th>Resolved By</th>
              </tr>
            </thead>
            @foreach ($resolvedReports as $resolved)
            <tr>
                <td>{{ $resolved->userId }}</td>
                <td>{{ $resolved->reportDescription }}</td>
                <td>{{ $resolved->reportedUserId }}</td>
                <td>{{ $resolved->status }}</td>
                <td>{{ $resolved->resolutionStatus }}</td>
                <td>{{ $resolved->resolvedBy }}</td>
                <td></td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
</div>
@endsection