 @section('navbar')
<nav class="navbar sticky-top navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/home">
      <img src="images/logoarka.png" alt="logo">
    </a> 
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse  navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
           <a href="/home">Home</a>
         </li>
        <li class="nav-item mt-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="secondary-btn">Logout</button>
            </form>
        </li>
      </ul>
      </ul>
    </div>

    </div>
</nav>

