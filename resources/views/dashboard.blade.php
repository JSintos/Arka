@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA')

<meta name="valid" content="{{ $valid }}">
<!-- Stars Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="POST" action="{{ route('storeMonthlyFeedback') }}">
                @csrf
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Academic performance check</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h3 style="text-align: center;">Rate your academic performance after using Arka</h3>
                    <p>
                    <div class="rating" id="monthlyFeedback" name="monthlyFeedback">
                        <div class="star-icon">
                            <input type="radio" value="1" name="rating" checked id="rating1" >
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                        </div>
                    </div>
      </div>
      <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
    </div>
  </div>
</div>

<div class="admin">
    <div class="container mt-5 mb-5">
        <div>
            <h4>Other options</h4>
        </div>
        <div>
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href='community-list'>Community List</a></li>
                    <li class="breadcrumb-item"><a href='update-user'>Profile</a></li>
                    <li class="breadcrumb-item"><a href='subscription'>Subscriptions</a></li>
                    @if(Auth::user()->userType == 1)
                    <li class="breadcrumb-item"><a href='admin/subscriptions'>Admin Panel</a></li>
                    @endif
                    @if(Auth::user()->userType == 3)
                    <li class="breadcrumb-item"><a href='/school-admin'>Admin Panel</a></li>
                    @endif
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
                        <a href="/chat/{{ $community->communityName }}" id="joinChatBtn" class="main-btn">Join Chat</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Button trigger modal -->
        <div class="mt-5">
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Rate Arka now
            </button>
        </div>
    </div>
</div>

<!-- Old star-rating feature -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('storeMonthlyFeedback') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Monthly academic performance check!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <h3 style="text-align: center;">Rate your academic performance after using Arka</h3>
                    <p>
                    <div class="rating" id="monthlyFeedback" name="monthlyFeedback">
                        <div class="star-icon">
                            <input type="radio" value="1" name="rating" checked id="rating1" >
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<script type="application/javascript">
    var valid = $('meta[name="valid"]').attr('content');

    $(document).ready(function(){
        if(valid){
            $('#exampleModal').modal('show');
        }
    });

    window.__be = window.__be || {};
    window.__be.id = "637091ec6fd6ba0007db3b6f";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>

@endsection
