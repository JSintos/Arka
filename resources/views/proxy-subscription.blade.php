<!doctype html>
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
    <div class="container">
                        @if ($errors->any())
                            <div class="mb-4">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                                @endforeach
                            </ul>
                            </div>
                        @endif
                        @if(session()->get('message'))
                        <div class="alert alert-success" role="alert">
                            <strong>Success: </strong>{{session()->get('message')}}
                        </div>
                        @endif
    <div class="row">
        <div class="col-md-6 text-center">
            <div class="card" style="width: 20em; height: 18em">
                <div class="card-body">
                    <h5 class="card-title">Premium</h5>
                    <p class="card-text">For as low as P135</p>
                    <p class="card-text">Join a maximum of 25 communities.</p>
                    <p class="card-text">Have a maximum of 15 Arka users room.</p>
                    <a href="gcash-payment" class="btn btn-primary">Subscribe Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="card" style="width: 20rem; height: 18em"> 
                <div class="card-body" style="text-align: center;">
                    <h5 class="card-title" style="text-align: center;">Premium (Organization)</h5>
                    <p class="card-text" style="text-align: center;">Pay annually for only P1,464</p>
                    <p class="card-text" style="text-align: center;">Bring Arka as part of your organization.</p>
                    <p class="card-text" style="text-align: center;">20% cheaper than purchasing normal premium </p>
                    <a href="organizational-subscription" class="btn btn-primary">Contact Sales</a>
                </div>
            </div>
        </div>
    </div>
    </div>

  </body>
</html>