@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA')

<div class="admin">
    <div class="container mt-5 mb-5">
        <div>
            <h4>Other options</h4>
        </div>
        <div>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href='community-list'>Community List</a></li>
                    <li class="breadcrumb-item"><a href='update-user'>Account Settings</a></li>
                    <li class="breadcrumb-item"><a href='subscription'>Subscriptions</a></li>
                    <li class="breadcrumb-item"><a href='admin/subscriptions'>Admin Panel</a></li>
                </ol>
            </nav>
        </div>

        <div class="mt-5">
            <h4>Your communities</h4>
        </div>
        <div class="row">
            @foreach ($communities as $community)
            <div class="col">
                <div class="home-card" style="width: 18rem;">
                    <div class="card-body ">
                        <h5 class="card-title">{{ $community->communityName }}</h5>
                        <a href="/chat" class="main-btn">Join Chat</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "6333e2110d1c0600075a35c7";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<!-- End of ChatBot code -->

@endsection
