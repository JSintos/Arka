@extends('layouts.admin-header')
@include('layouts.admin-nav')
@section('content')
@section('title','ARKA-Admin')
<div class="container p-5">
    @if($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
          @endif

          <div class="card-body">
                    <form action="{{route('admin/subscription/deny-email')}}" method="POST">
                    @csrf
                        <div>
                           <label for="referenceNumber"><strong>Email:</strong></label>
                           <input type="text" class="form-control" id ="email" name="email" value="{{ Crypt::decryptString($deniedUser->email) }} "required>
                       </div>
                       <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label"></label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Briefly explain your reason for denying user subscription" required name="comment"></textarea>
                       </div>
                       <div class="col-12 mt-4 button">
                            <button type="submit" class="secondary-btn">Submit</button>
                        </div>
                    </form>

@endsection