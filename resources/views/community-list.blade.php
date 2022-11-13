@extends('layouts.header')
@section('content')
@section('title','ARKA')

<div class="container">
    <h4>Community list</h4>
    <table class="table table-bordered">
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
                    <button type="submit" class="btn btn-link-danger btn-rounded btn-sm fw-bold"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <h4>User list</h4>
    <table class="table table-bordered">
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
