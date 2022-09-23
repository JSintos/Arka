<!-- header -->
<?php 
  $title = 'Account';
  require_once 'includes/header.php'; ?> 
</div>
</nav>

<div class="profile-container">
<h3>User Profile Modification</h3><hr>
  <div class="profile-item">
      <div class=" item-left">
      <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h5>Upload a different photo...</h5>
        <div class="mb-4">
        <input class="form-control-sm" type="file" id="formFile">
        </div>
      </div>
    <div class="item-right"> 
      <h4>Personal Information</h4>
      <div class="input-group mb-3">
        <input type="text" aria-label="First name" placeholder= "First name" class="form-control" value="John">
        <input type="text" aria-label="Last name" placeholder= "Last name" class="form-control" value="Doe">
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Username" aria-label="Username" value="@johnd">
      </div>
      <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Email" aria-label="Email" value="">
      </div>
      <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="School" aria-label="School" value="">
      </div>
        <button type="button" class="update-btn"><a href="main.php">Update</a></button>
        <button type="button" class="cancel-btn"><a href="main.php">Cancel</a></button>
    </div>
 
    </div>
  </div>
  
  
  
    
    
    
  
  
  
</div>


<!-- footer -->
<?php require_once 'includes/footer.php'; ?>