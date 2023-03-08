@extends('layouts.admin-header')
@include('layouts.admin-nav')
@section('content')
@section('title','ARKA-Admin')
<div class="container p-5">
    <form action="{{ route('admin/organizational-registration') }}" enctype='multipart/form-data' method="POST">
        @csrf

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label class="form-label"><strong>CSV File:</strong></label>
                    <input type="file" name="csvFile" id="csvFile" class="form-control" placeholder="CSV file upload">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label class="form-label"><strong>Educational Institution:</strong></label>
                    <input type="text" name="educationalInstitution" id="educationalInstitution" class="form-control" placeholder="Educational institution">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="secondary-btn">Upload</button>
            </div>
        </div>
    </form>
</div>
@endsection
