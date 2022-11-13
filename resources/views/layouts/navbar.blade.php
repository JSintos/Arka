 @section('navbar')

 <nav class="navbar sticky-top navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <img src="images/logoarka.png" alt="logo">
        </a>

        <div class="collapse  navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

