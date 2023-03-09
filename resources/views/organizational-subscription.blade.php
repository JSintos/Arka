@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Contact Sales')
<div class="sales">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2>Contact our Sales Team</h2>
        <p>Let's discuss more of our offers with you.</p> 
            <div class="card mb-4">
                    <div class="container">
                        @if ($errors->any())
                            <div class="mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>
                            </div>
                        @endif
                        @if(session()->get('message'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success: </strong>{{session()->get('message')}}
                        </div>
                        @endif
                <div class="card-body">
                    <form action="{{route('organizational-subscription')}}" method="POST">
                    @csrf
                        <div class="mt-4">
                           <label for="fullName"><strong>Full Name:</strong></label>
                           <input type="text" class="form-control" id ="fullName" name="fullName" required>
                       </div>
                       <div class="mt-4">
                           <label for="emailAddress"><strong>Email:</strong></label>
                           <input type="text" class="form-control" id ="emailAddress" name="emailAddress" required>
                       </div>
                       <div class="mt-4">
                           <label for="companyName"><strong>Company Name:</strong></label>
                           <input type="text" class="form-control" id ="companyName"  name="companyName" required>
                       </div>
                       <div class="mt-4">
                           <label for="companySize"><strong>Company Size:</strong></label>
                           <input type="text" class="form-control" id ="companySize" name="companySize" required>
                       </div>
                       <div class="mt-4">
                           <label for="country"><strong>Country:</strong></label>
                           <input type="text" class="form-control" id ="country" name="country"  required>
                       </div>
                       <div class="mt-4">
                           <label for="details"><strong>Anything else?</strong></label>
                           <input type="text" class="form-control" id ="details" name="details"  required>
                       </div>
                       <div class="col-12 mt-5 button">
                            <button type="submit" class="secondary-btn">Submit</button>
                        </div>
                    </form>
                        <a href="gcash-payment">Payment</a>
                        
                        
                </div>
            </div>
        </div>
</div>
</div>

@endsection
