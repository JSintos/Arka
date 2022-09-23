<!-- header -->
<?php 
  $title = 'Contact Sales Form';
  require_once 'includes/header.php'; ?> 
</div>
</nav>
<div class="form-container">
  <form class="contact-form">
  <div>
    <h3>Contact our Sales Team</h3>
    <p>Let's discover our potential together.</p>
    </div>
  <div class="input-group mb-3">
        <input type="text" aria-label="First name" placeholder= "First name" class="form-control" value="">
        <input type="text" aria-label="Last name" placeholder= "Last name" class="form-control" value="">
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Work email" aria-label="workEmail" value="">
      </div>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Company Name" aria-label="company" value="">
      </div>
    <div class="mb-3">
        <select class="form-select" required aria-label="select example" >
          <option selected>Company Size</option>
            <option value="1">50-100 members</option>
            <option value="2">100-1k members</option>
            <option value="2">1k and above</option> 
        </select>
        <div class="invalid-feedback">Please fill in the required details</div>
      </div>
    <div class="mb-3">
        <label for="reportDescription" class="form-label"></label>
        <textarea class="form-control" id="reportDescription" placeholder="Anything else?" required></textarea>
        <div class="invalid-feedback">
        Required example textarea.
        </div>
      </div>
      <div class="col-12">
        <button class="report-btn" type="submit">Submit form</button>
      </div>
    </form>
</div>

</div>

<!-- footer -->
<?php require_once 'includes/footer.php'; ?>