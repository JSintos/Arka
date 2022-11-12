@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','Chat')

<div class="container">
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
