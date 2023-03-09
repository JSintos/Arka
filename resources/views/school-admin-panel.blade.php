@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA')

<div class="container">
    <h4 class="my-4">Welcome {{ Auth::user()->username }} - {{ Auth::user()->educationalInstitution }}</h4>

    @if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        @foreach ($users as $user)
        <tr>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>

                <form action="{{ route('deactivate') }}" method="POST">
                    @csrf
                    <input type="hidden" id ="deactivateUserId" name="deactivateUserId" value="{{ $user->userId }}" required>
                    <button type="submit" class="btn btn-danger">Deactivate</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
