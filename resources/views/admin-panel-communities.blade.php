<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  </head>
  <body>

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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Arka Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link" href="{{url('admin/subscriptions')}}">Subscriptions</a>
        <a class="nav-link active" href="{{url('admin/community')}}">Communities<span class="sr-only">(current)</span></a>
        <a class="nav-link" href="">Reports</a>
        <a class="nav-link" href="feedbacks">Feedback</a>
        <a class="nav-link" href="">Badges Leaderboard</a>
      </div>
    </div>
    </nav>


    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Community List</button>
        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Petitioned Communities</button>
    </nav>
  

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Arka Community List</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('admin/community/create') }}"> Create New Community</a>
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
                    <a class="btn btn-primary" href="{{ route('admin/community/{community}/edit',$community->communityId) }}">Edit</a>
                    <button type="button" class="btn btn-danger deleteCommunityBtn" value="{{ $community->communityId }} ">Delete</button>
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
                    <th>Count</th>
                    <th width="180px"></th>
                </tr>
                @foreach ($petitions as $petition)
                <tr>
                    <td>{{ $petition->reportDescription }}</td>
                    <td>{{ $petition->Count}}</td>
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
    </body>
</html>