<!-- header -->
<?php 
  $title = 'Dashboard';
  require_once 'includes/header.php'; ?>
</div>
</nav>

<div class="container">
    <div class="side-bar">
        <div class="menu">
            <div class="item">
                <a class="sub-btn"><i class="fas fa-people-group"></i>Communities<i class="fas fa-angle-right dropdown"></i></a>
                <div class="sub-menu">
                    <a href="#" class="sub-item">Community 1</a>
                    <a href="#" class="sub-item">Community 2</a>
                    <a href="#" class="sub-item">Community 3</a>
                </div>
            </div>
            <div class="item"><a href="user-profile.php"><i class="fas fa-user"></i>Account Profile</a></div>
            <div class="item"><a href="payment.php"><i class="fas fa-credit-card"></i>Payment</a></div>
            <div class="item"><a href="#"><i class="fas fa-robot"></i>Arka Bot</a></div>
            <div class="item"><a href="#"><i class="fas fa-gear"></i>Settings</a></div>
            <div class="item"><a href="index.php"><i class="fas fa-arrow-right-from-bracket"></i>Logout</a></div>
        </div>
</div>
<div class="room-container">
    <div class="room-box ">
            <div class="r-img"><img src=""/></div>
            <div class="r-text">
                <h6><strong>Room 1</strong> </h6>
                <div class="join-btn"><a href="#">Join</a></div>
            </div>
    </div>
       
    <div class="room-box ">
            <div class="r-img"><img src=""/></div>
            <div class="r-text">
                <h6><strong>Room 2</strong> </h6>
                <div class="join-btn"><a href="#">Join</a></div>
            </div>
            </div>
      
    <div class="room-box ">
            <div class="r-img"><img src=""/></div>
            <div class="r-text">
                <h6><strong>Room 3</strong> </h6>
                <div class="join-btn"><a href="#">Join</a></div>
            </div>
    </div>
       
</div>

<!--scripts -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.sub-btn').click(function(){
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
        });
    });
    </script>
</body>
</html>
 