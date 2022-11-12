@extends('layouts.admin-header')
@section('content')
@section('title','ARKA-Admin')
<div class="container p-5">
    <div class="row">
        <div class="col-lg-12 margin-tb mb-5">
            <div class="pull-left">
                <h2>Add New Community</h2>
            </div>
            <div class="pull-right">
                <a class="btn" href="{{ route('admin/community') }}"> <i class="fa-solid fa-arrow-left mr-2"></i>Back</a>
            </div>
        </div>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin/community/create') }}" method="POST">
        @csrf
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label class="form-label"><strong>Community Name:</strong></label>
                    <input type="text" name="communityName" id="communityName" class="form-control" placeholder="Community Name">
                </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="secondary-btn">Submit</button>
            </div>
        </div>
    
    </form>
</div>
@endsection