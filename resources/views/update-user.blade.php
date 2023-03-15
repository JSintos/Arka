@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Account Settings')

<div class="form-container">
    <div class="row justify-content-center">
        <div class="user-card">
            <div class="card-header" style="text-align: center"><i class='fa fa-user mr-3'></i>{{Auth::user()->username}}'s Profile</div>
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
                    <div class="mb-4 text-center">
                        <h5 class="mb-4">Badges</h5>

                        @foreach ($badgeList as $badgeCategory => $count)
                        <button type="button" class="btn btn-primary" disabled>
                            @if($badgeCategory == "badgeOne")
                                Empath badge <span class="badge badge-light">{{ $count }}</span>
                            @endif

                            @if($badgeCategory == "badgeTwo")
                                Genius badge <span class="badge badge-light">{{ $count }}</span>
                            @endif

                            @if($badgeCategory == "badgeThree")
                                Kind badge <span class="badge badge-light">{{ $count }}</span>
                            @endif
                        </button>
                        @endforeach
                    </div>

                    <hr style="height: 2px; border: none; color: #333; background-color: #333;">

                    <div>
                        <h5>Update user details</h5>

                        <form action="{{ route('update-user') }}" method="POST">
                        @csrf
                            <div class="mt-4">
                                <label for="name" class="form-label"><strong>Name:</strong></label>
                                <input type="text" class="form-control" id ="name" name="name" value="{{Auth::user()->username}}" required>
                            </div>

                            <div class="mt-4">
                                <label for="email" class="form-label"><strong>Email:</strong></label>
                                <input type="text" class="form-control" id ="email" value="{{ Crypt:: DecryptString(Auth::user()->email)}}" name="email" required>
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
        </div>
    </div>
</div>

@endsection
