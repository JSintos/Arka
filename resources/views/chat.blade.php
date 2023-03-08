@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','Chat')

<div class="view chat">
    <div class="card">
        <div class="chat-header">Chats</div>
    </div>
    <div class="card-body">
        <chat-messages v-on:firstbadge="firstBadge" v-on:secondbadge="secondBadge" v-on:thirdbadge="thirdBadge" :messages="messages" :user="{{ Auth::user() }}"></chat-messages>
    </div>
    <div class="chat-footer">
        <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
        <button id="muteBtn">mute</button>
        <button id="joinOrLeaveBtn">join</button>
        <!-- <br><label> Local Audio Level :</label>
        <input type="range" min="0" id= "localAudioVolume" max="100" step="1"><br>
        <label> Remote Audio Level :</label>
        <input type="range" min="0" id= "remoteAudioVolume" max="100" step="1"> -->
    </div>
</div>

@endsection
