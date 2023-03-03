@extends('layouts.admin-header')
@include('layouts.admin-nav')
@section('content')
@section('title','ARKA-Admin')

<div class="container p-5">
    <div class="pull-left">
        <h2>Arka Community List</h2>
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Community List</button>
            <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Petitioned Communities</button>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="add-btn" href="{{ route('admin/community/create') }}"> <i class="fa-solid fa-plus mr-2"></i>Create New Community</a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>Community Name</th>
                    <th width="180px">Action</th>
                </tr>

                @foreach ($communities as $community)
                <tr>
                    <td>{{ $community->communityName }}</td>
                    <td>
                        <a class="btn" href="{{ route('admin/community/{community}/edit',$community->communityId) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                        <button type="button" class="btn  deleteCommunityBtn" value="{{ $community->communityId }}"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>Community Name</th>
                    <th width="180px"></th>
                </tr>
                @foreach ($petitions as $petition)
                <tr>
                    <td>{{ $petition->reportDescription }}</td>
                    <td>
                        <form action="{{ route('admin/community') }}" method="POST">
                            @csrf
                            <input type="hidden" id ="reportDescription" name="reportDescription" value="{{ $petition->reportDescription }}" required>
                        <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin/community/delete') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Community</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="community_delete_id" id="community_id">
                        <h5>Are you sure you want to delete this Community?</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.deleteCommunityBtn').click(function (e) {
            e.preventDefault();

            var community_id = $(this).val();
            $('#community_id').val(community_id);
            $('#deleteModal').modal('show');
        })
    })
</script>

@endsection
