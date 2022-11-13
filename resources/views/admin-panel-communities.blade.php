@extends('layouts.admin-header')
@include('layouts.admin-nav')
@section('content')
@section('title','ARKA-Admin')

<div class="container p-5">
        <div class="row">
            <div class="col-lg-12 margin-tb mb-2">
                <div class="pull-left ml-4">
                    <h2>Arka Community List</h2> 
                </div>
                <div class="pull-right">
                    <a class="add-btn" href="{{ route('admin/community/create') }}"><i class="fa-solid fa-plus mr-2"></i>Create New Community</a>
                </div>
            </div>
        </div>
    
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    <div class="shadow-4 rounded-2 overflow-hidden">
            <table class="table table-bordered">
            
                <tr>
                    <th>ID</th>
                    <th>Community Name</th>
                    <th width="180px">Action</th>
                </tr>
                    
                @foreach ($communities as $community)
                <tr>
                    <td>{{ $community->communityId }}</td>
                    <td>{{ $community->communityName }}</td>
                    <td>
                        <form action="{{ route('admin/community/{community}/delete',$community->communityId) }}" method="POST">
            
                            <a class="btn btn-link btn-rounded btn-sm fw-bold" href="{{ route('admin/community/{community}/edit',$community->communityId) }}"><i class="fa-sharp fa-solid fa-pen-to-square"></i></i></a>
        
                            @csrf
            
                            <button type="submit" class="btn btn-link-danger btn-rounded btn-sm fw-bold"><i class="fa-solid fa-trash"></i></button>
                            
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
</div>


    


  
@endsection