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
                    <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                </div>
                
                <div class="col-10 align-self-center mb-0">
                    <h3>Payment</h3>
                    <p>You may scan this QR code to pay via GCash. A confirmation email will be sent to you. Thanks!</p>
                </div>
            
                <div class="col-10 align-self-center">
                    <div> 
                        <img src="../images/qr.jpg" alt="qrcode" class="img-fluid mx-auto ">
                    </div>
                </div>
                <div class="col-12 button mt-3">
                    <a class="nav-link secondary-btn">Finish</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection