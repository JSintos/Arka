@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA')

<div class="container">
    <h4 class="my-4">Welcome admin</h4>
    <table class="table">
  <thead style="background-color:#90CCF4;">
    <tr>
      <th scope="col">User ID</th>  
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Enrollment Status</th>
      <th scope="col">Subscription Expiry Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1000000001</td>
      <td>Juan Dela Cruz</td>
      <td>juancruz@gmail.com</td>
      <td>Not enrolled</td>
      <td>January 23, 2024</td>
      <td><div class="button">
        <button type="submit" class="btn btn-danger" style="background-color: white; color: red;">Deactivate</button></div>
      </td>
    </tr>
    <tr>
      <td>1000000002</td>
      <td>Mariah Santos</td>
      <td>mariahsantos@gmail.com</td>
      <td>Enrolled</td>
      <td>January 23, 2024</td>
      <td><div class="button">
        <button type="submit" class="btn btn-danger" style="background-color: white; color: red;">Deactivate</button></div>
      </td>
    </tr>
    <tr>
      <td>1000000003</td>
      <td>John Doe</td>
      <td>johndoe@gmail.com</td>
      <td>Enrolled</td>
      <td>January 23, 2024</td>
      <td><div class="button">
        <button type="submit" class="btn btn-danger" style="background-color: white; color: red;">Deactivate</button></div>
      </td>
    </tr>
  </tbody>
</table>
</div>
@endsection