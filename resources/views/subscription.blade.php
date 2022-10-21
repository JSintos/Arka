@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Subscription')
</div>
</nav>

<div class="container justify-content-center align-items-center mt-5 ">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 ">
            <div class="card p-5 mt-3 mb-3">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                </div>
                <h2>Upgrade your Subscription</h2>
                <p>Experience more with our premium plans.</p>
                <div class="row">
                        <div class="col-12">
                           <label class="form-label"></label>
                             <select class=" form-select" aria-label="Default select example">
                                <option selected>Choose a subscription plan</option>
                                <option value="">Individual Premium Plan</option>
                                <option value="">Organizational Plan</option>
                            </select>
                        </div>
                        <div class="col-12 ">
                           <label class="form-label mt-4"></label>
                             <select class=" form-select" aria-label="Default select example">
                                <option selected>Choose your payment plan</option>
                                <option value="">Monthly</option>
                                <option value="">Yearly</option>
                            </select>
                        </div>

                        <div class="col-12 button mt-5">
                            <a class="nav-link secondary-btn" href="{{ route('payment-portal') }}" >Proceed</a>
            
                        </div>
                </div>
                
            </div>
        </div>
    </div>


</div>

@endsection