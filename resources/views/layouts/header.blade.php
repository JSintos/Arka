<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href = "{{asset('css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css')}}"> 
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <script src="{{asset('https://kit.fontawesome.com/3edd8f198d.js')}}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css')}}">
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}"> 
    <link href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js')}}"> 
     <!-- logo -->
  <nav class="navbar sticky-top navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="images/logoarka.png" alt="logo">
    </a> 
  </head>
  <body>
    @yield('content')
    @include('layouts.footer')
    </body>
</html>
