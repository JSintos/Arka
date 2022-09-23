<!-- header -->
<?php 
  $title = 'Communities';
  require_once 'includes/header.php'; ?>
</div>
</nav>
<!-- Select community options -->
<div class="community-container">
<h2>What's your top 3 interests?</h2>
<form action="" method="post">
  <select id="community" name="community[]" class="custom-select" multiple>
      <option value="architecture">Architecture</option>
      <option value="accounting">Accounting</option>
      <option value="biology">Biology</option>
      <option value="business">Business</option>
      <option value="computer science">Computer Science</option>
      <option value="design">Design</option>
      <option value="law">Law</option>
      <option value="engineering">Engineering</option>
      <option value="math">Math</option>
      <option value="language">Language</option>
      <option value="Photography">Photography</option>
      <option value="science">Science</option>
  </select>
  <hr/>
  <a href= "main.php" class="community-btn">Submit</a>

  
</form>
</div>
<!--scripts -->
<script src="js/community.js"></script>
<!-- footer -->
<?php require_once 'includes/footer.php'; ?>

 
  