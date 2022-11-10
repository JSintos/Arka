@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Subscriptions')

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
    <div class="row m-5">
        <div class="text-center">
            <h2>Choose your subscription plan</h2>
        </div>
        <div class="col-md-6 p-5">
            <div class="scard">
                <div class="scard-body">
                    <h5 class="scard-title">Premium (Individual)</h5>
                    <p class="card-text">For as low as P135</p>
                    <p class="card-text">Join a maximum of 25 communities.</p>
                    <p class="card-text">Have a maximum of 15 Arka users per room.</p>
                    <a href="gcash-payment" class="subscribe-btn">Subscribe Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-5">
            <div class="scard"> 
                <div class="scard-body">
                    <h5 class="scard-title">Premium (Organization)</h5>
                    <p class="card-text" >Pay annually for only P1,464</p>
                    <p class="card-text" >Bring Arka as part of your organization.</p>
                    <p class="card-text">20% cheaper than purchasing normal premium </p>
                    <a href="organizational-subscription" class="subscribe-btn">Contact Sales Now</a>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection