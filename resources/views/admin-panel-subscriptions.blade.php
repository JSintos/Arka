<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  </head>
  <body>

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
        <a class="nav-link active" href="{{url('admin/subscriptions')}}">Subscriptions <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="{{url('admin/community')}}">Communities</a>
        <a class="nav-link" href="">Reports</a>
        <a class="nav-link" href="feedbacks">Feedback</a>
        <a class="nav-link" href="">Badges Leaderboard</a>
      </div>
    </div>
    </nav>

    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Unverified Subscriptions</button>
        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Verified Subscriptions</button>
    </nav>
    @if($message = Session::get('success'))
            <div class="alert alert-success">
              <p>{{ $message }}</p>
            </div>
          @endif

      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <table class="table table-bordered">
            <tr>
              <th>User ID</th>
              <th>Reference Number</th>
              <th>Phone Number</th>
              <th width="280px"></th>
            </tr>
          @foreach ($subscriptions as $subscription)
            <tr>
              <td>{{ $subscription->userId }}</td>
              <td>{{ $subscription->referenceNumber }}</td>
              <td>{{ $subscription->phoneNumber }}</td>
              <td>
                <form action="{{ route('admin/subscriptions') }}" method="POST">
                  @csrf
                  <input type="hidden" id ="subscriptionId" name="subscriptionId" value="{{ $subscription->subscriptionId }}" required>
                  <button type="submit" class="btn btn-primary">Verify</button>
                </form>
              </td>            
            </tr>
            @endforeach
          </table>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <table class="table table-bordered">
            <tr>
              <th>User ID</th>
              <th>Reference Number</th>
              <th>Phone Number</th>
            </tr>
          @foreach ($verifiedSubs as $verifiedSub)
            <tr>
              <td>{{ $verifiedSub->userId }}</td>
              <td>{{ $verifiedSub->referenceNumber }}</td>
              <td>{{ $verifiedSub->phoneNumber }}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>

  </body>
</html>