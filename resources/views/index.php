<!-- header -->
<?php 
  $title = 'Home';
  require_once 'includes/header.php'; ?>

  <!-- navigation bar -->
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse  navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#offers">Offers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="select-community.php" >Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Signup</a>
        </li>
      </ul>
      </ul>
    </div>
  </div>
</nav>
<!-- Home section -->
    <section class= "main" id="home">
        <div class="main-heading">
          <h1>Boost Academic Performance with Collaboration</h1>
          <p>Make new friends and be part of building a positive community!</p>
          <a class="main-btn" href="#">Join now</a>
        </div>
    </section>
<!-- About Us section -->
    <section class="about"id="about">
        <div class="about-img">
        <img src="images/About.png">
      </div> 
      <div class="about-text">
        <h2>Find your study partner</h2>
        <p>ARKA  is the shortened version of “Aral Kaibigan”. It is a web-based
          application where you can find study buddies and have real-time 
          communication with them. Our goal is to build an environment for you 
          who wish to collaborate and find peers with the same interests. </p>
      </div>
    </section>
<!-- Offers section -->
    <section class="offers" id="offers">
      <h2>Simple plans made for you</h2>
      <div class="offer-container">
        <div class="offer-box">
          <div class="o-img">
            <img src="images/basic.png"/>
          </div>
          <div class="o-text">
            <h4><strong>Basic</strong> </h4>
            <h6>Free</h6>
            <p>Have a max of 10 Arka communities and a max of 8 Arka users in a room</p>
            <a class="offer-btn" href="#">Start for free</a>
          </div>
        </div>

        <div class="offer-box">
          <div class="o-img">
            <img src="images/individual.png"/>
          </div>
          <div class="o-text">
            <h4><strong>Individual</strong> </h4>
            <h6>For as low as ₱135</h6>
            <p>Have unlimited communities and a max of 15 Arka users per chatroom</p>
            <a class="offer-btn" href="#">Subscribe now</a>
          </div>
        </div>

        <div class="offer-box">
          <div class="o-img">
            <img src="images/organization.png"/>
          </div>
          <div class="o-text">
            <h4><strong>Organization</strong> </h4>
            <h6>For ₱1,464 annually</h6>
            <p>Have unlimited communities and a max of 15 Arka users per chatroom</p>
            <a class="offer-btn" href="contact-sales.php">Contact sales</a>
          </div>
        </div>
      </div>
    </section>
<!-- Back to top button -->
<button id="back-to-top-btn"><i class="fa-solid fa-circle-chevron-up"></i></button>
  <!--scripts -->
  <script src="js/button.js"></script>
<!-- footer -->
<?php require_once 'includes/footer.php'; ?>
  