@extends('layouts.header')
@section('content')
@section('title','Account Settings')
</div>
</nav>

<div class="form-container">
    <div class="row justify-content-center">
            <div class="user-card">
                <div class="card-header" style="text-align: center"><i class='fa fa-user'></i>{{Auth::user()->username}}'s Profile</div>
                        @if ($errors->any())
                            <div class="mb-3">
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
                    <form action="{{route('proxy-update-user')}}" method="POST">
                    @csrf
                        <div class="mt-4">
                           <label for="name" class="form-label"><strong>Name:</strong></label>
                           <input type="text" class="form-control" id ="name" name="name" value="{{Auth::user()->username}}" required>
                       </div>
                       <div class="mt-4">
                           <label for="email" class="form-label"><strong>Email:</strong></label>
                           <input type="text" class="form-control" id ="email" value="{{Auth::user()->email}}" name="email" required>
                       </div>
                    
                        <div class="button">
                            <a class="change-pass" href="{{ route('change-password') }}">
                                {{ __('Change password') }}
                            </a>
                            <button class="update-btn" type="submit">Update Profile</button> 
                    </form>
                
                </div>
            </div>
        
</div>

@endsection
