@extends('layouts.header')
@include('layouts.navbar')
@section('content')
@section('title','ARKA')

<div class="container p-5"> 
    <h4>List of available communities</h4>
    <p>You may add any community available below by pressing the plus (+) icon.</p>
    <table class="table table-bordered mt-2">
        <tr>
            <th>Community Name</th>
            <th width="180px">Action</th>
        </tr>

        @foreach ($communities as $community)
        <tr>
            <td>{{ $community->communityName }}</td>
            <td>
                <form action="{{ route('addCommunity', $community->communityId) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link-danger btn-rounded btn-sm fw-bold"><i class="fa-solid fa-add"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="mt-5 mb-3">
        <h4>Your community list</h4>
    </div>
    
    <div class="pull-right mb-2">
        <a class="add-btn" href="{{ route('request-community') }}"><i class="fa-solid fa-comment-plus mr-2"></i>Petition New Community</a>
    </div>
   
        <table class="table table-bordered second-table">
                <tr>
                    <th>Community Name</th>
                    <th width="180px">Action</th>
                </tr>

                @foreach ($communityList as $community)
                <tr>
                    <td>{{ $community->communityName }}</td>
                    <td>
                        <form action="{{ route('removeCommunity', $community->communityId) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link-danger btn-rounded btn-sm fw-bold"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
</div>

@endsection
