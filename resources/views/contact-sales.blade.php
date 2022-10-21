@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Contact Sales')
    <div class="collapse  navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('register') }}">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>


<!-- Contact Sales Form -->
<div class="container justify-content-center align-items-center mt-5 p-5">
    <h2>Contact our Sales Team</h2>
    <p>Let's discuss more of our offers with you.</p>
    <form class="row g-3 d-flex" >
        <div class="col-md-6">
            <label  type="text" class="form-label">First Name</label>
            <input class="form-control">
        </div>
        <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input type="text" class="form-control" >
        </div>
        <div class="col-12">
            <label class="form-label">Work E-mail</label>
            <input type="email" class="form-control" >
        </div>
        <div class="col-12">
            <label class="form-label">Company Name</label>
            <input type="text" class="form-control"  >
        </div>
        <div class="col-12">
            <label class="form-label">Company Size</label>
            <select class=" form-select" aria-label="Default select example">
              <option selected>Choose..</option>
              <option value="1">1-4 members</option>
              <option value="2">5-19 members</option>
              <option value="3">20-99 members</option>
              <option value="3">100 and more members</option>
            </select>
        </div>
        <div class="col-12">
        <label class="form-label">Country</label>
            <select class=" form-select" aria-label="Default select example">
                <option selected>Choose..</option>
                <option value="1">Philippines</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="form-label">City</label>
            <select  class="form-select">
            <option selected>Choose...</option>
            <option value="1">Manila</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Zip</label>
            <input type="text" class="form-control">
        </div>
      
       <div class="col-12">
            <label class="form-label">Message</label>
            <textarea class="form-control" placeholder="Anything else?"></textarea>
       </div>
        <div class="col-12 button">
            <button type="submit" class="secondary-btn">Submit</button>
        </div>
    </form>
</div>

@endsection