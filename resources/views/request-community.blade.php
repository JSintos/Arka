@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA-Community')
  <div class="form-container mb-5">
    <div class="row justify-content-center">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h3>Request Community</h3>
                <p>Please input the name of the community you want to petition with other users.</p>
                    <div class="card-text">
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
                    </div>
                    <form action="{{route('request-community')}}" method="POST">
                    @csrf
                        <div class="mt-4">
                           <label for="communityName" class="form-label"><strong>Community Name:</strong></label>
                           <input type="text" class="form-control" id ="requestCommunity" name="requestCommunity" required>
                       </div>
                       <div class="button mt-4">
                            <x-button class="secondary-btn">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
            </div>   
        </div>     
    </div>
</div>
@endsection