@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','Chat')

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
    <div class="card">
        <div class="card-header">Chats</div>
        <div class="card-body">
            <chat-messages v-on:firstbadge="firstBadge" v-on:secondbadge="secondBadge" v-on:thirdbadge="thirdBadge" v-on:reportuser="reportUser" :messages="messages" :user="{{ Auth::user() }}"></chat-messages>
        </div>
        <div class="card-footer">
            <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
        </div>
    </div>
    
    <div class="view chat">
        <div class="card">
            <div class="chat-header">Chats</div> 
        </div>
        <div class="card-body">
            <chat-messages v-on:firstbadge="firstBadge" v-on:secondbadge="secondBadge" v-on:thirdbadge="thirdBadge" v-on:reportuser="reportUser" :messages="messages"></chat-messages>
        </div>
        <div class="chat-footer">
            <chat-form class="chat-form" v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
        </div>
    </div>
</div>

@endsection
