@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Payment')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 ">
            <div class="card p-5 mt-3 mb-3">
                <div class="col-10 align-self-center mb-0">
                        <h3>Payment</h3>
                        <p>You may scan this QR code to pay your subscription via GCash.</p>
                    </div>
                <div>
                    <img src="../images/qr.jpg" alt="qrcode" class="pimg-fluid mx-auto ">
                </div>
                <div class="mt-4 text-justify" >
                    <p>After payment, please fill out the required details below. Premium subscription will be applied to your account after verfication of payment.</p>
                </div>
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
                    <form action="{{route('gcash-payment')}}" method="POST">
                    @csrf
                        <div>
                           <label for="referenceNumber"><strong>Reference Number:</strong></label>
                           <input type="text" class="form-control" id ="referenceNumber" name="referenceNumber" required>
                       </div>
                       <div class="mt-4">
                           <label for="phoneNumber"><strong>Phone Number:</strong></label>
                           <input type="text" class="form-control" id ="phoneNumber" name="phoneNumber" required>
                       </div>
                       <div class="mt-4">
                           <label for="amount"><strong>Amount Paid:</strong></label>
                           <input type="number" class="form-control" id ="amount" name="amount" required>
                       </div>
                       <div class="col-12 mt-4 button">
                            <button type="submit" class="secondary-btn">Submit</button>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
</div>

@endsection