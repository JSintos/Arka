@extends('layouts.header')
@section('content')
@section('title','ARKA')

</div>
</nav>

<div class="admin">
    <div class="container mt-3">
        <div class="row">
            @foreach ($communities as $community)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $community->communityName }}</h5>

                        <a href="#" class="card-link">Go inside</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
