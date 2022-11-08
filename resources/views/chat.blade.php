<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
</head>
<body>
    <div id="app">
        <div class="container">
            <div class="card">
                <div class="card-header">Chats</div>
                <div class="card-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="card-footer">
                    <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
