<?php
$title = 'Payment'; 
require_once 'includes/header.php' ?>

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
          <a class="nav-link" href="select-community.php" >Logout</a>
        </li>
      </ul>
      </ul>
    </div>
  </div>
</nav>

<style>
<?php include 'css/payment.css'; ?>
</style>

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Start your subscription</strong></h2>
                <p>Fill all form fields to go to the next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Account</strong></li> 
                                <li id="personal"><strong>Personal</strong></li> 
                                <li id="payment"><strong>Payment</strong></li> 
                                <li id="confirm"><strong>Finish</strong></li> 
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Account Information</h2>
                                    <input type="email" name="email" placeholder="Email"/>
                                    <input type="text" name="uname" placeholder="User name"/>
                                    <input type="password" name="pwd" placeholder="Password"/>
                                    <input type="password" name="cpwd" placeholder="Confirm Password"/>
                                </div>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Personal Information</h2>
                                    <input type="text" name="fname" placeholder="First Name"/>
                                    <input type="text" name="lname" placeholder="Last Name"/>
                                    <input type="text" name="phno" placeholder="Contact No."/>
                                    <input type="text" name="phno_2" placeholder="Alternate Contact No."/>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="next" class="next action-button" value="Next Step"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Payment Information</h2>
                                    <div class="radio-group">
                                        <div class='radio' data-value="credit"><img src="https://play-lh.googleusercontent.com/ufwUy4SGVTqCs8fcp6Ajxfpae0bNImN1Rq2cXUjWI7jlmNMCsXgQE5C3yUEzBu5Gadkz" width="200px" height="200px"></div>
                                        <br>
                                    </div>
                                    <label class="pay">Gcash registered name*</label>
                                    <input type="text" name="holdername" placeholder=""/>
                                    <div class="row">
                                        <div class="col-9">
                                            <label class="pay">Gcash registered number*</label>
                                            <input type="text" name="cardno" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-9">
                                            <label class="pay">Reference number*</label>
                                            <input type="text" name="cardno" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label class="pay">Amount</label>
                                            <input type="text" name="cardno" placeholder=""/>
                                        </div>
                                        
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                <input type="button" name="make_payment" class="next action-button" value="Confirm"/>
                            </fieldset>
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title text-center">Success !</h2>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-3">
                                            <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row justify-content-center">
                                        <div class="col-7 text-center">
                                            <h4>Your subscription has been recorded successfully</h4>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript'>$(document).ready(function(){
    
var current_fs, next_fs, previous_fs; //fieldsets
var opacity;

$(".next").click(function(){
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
        }, 
        duration: 600
    });
});

$(".previous").click(function(){
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
                'display': 'none',
                'position': 'relative'
            });
            previous_fs.css({'opacity': opacity});
        }, 
        duration: 600
    });
});

$('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
});

$(".submit").click(function(){
    return false;
})
    
});</script>
                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>
                            

<!-- footer -->
<?php require_once 'includes/footer.php'; ?>