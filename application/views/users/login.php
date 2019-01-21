<div class="container">
  <h2>Login </h2>
  <h4 style='color: red;'><?php echo $this->session->flashdata('error');?></h4>
  <form id="login_form"  method="post" action="<?php echo base_url() ?>User/login_user">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <div style="">
    <button type="submit" class="btn btn-default registerbtn">Submit</button>
    <p>Create an account? <a href='<?php echo base_url()?>User/signup'>SignUp </a>.</p>
  </div>
  </form>
</div>