

 <h4 style='color: red;'><?php echo $this->session->flashdata('error');?></h4> 
<form  id="my_form" method="post" action="<?php echo base_url() ?>User/register_user">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="firstname"><b>first name</b></label>
    <input type="text" placeholder="first name" name="firstname">

    <label for="lastname"><b>last name</b></label>
    <input type="text" placeholder="last name" name="lastname">

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email">

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password">
    <hr>
    <p>By creating an account you agree to our <a href='<?php echo base_url()?>User/term'>Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div style="padding-left: 600px">
    <p>Already have an account? <a href='<?php echo base_url()?>User/page_login'>Login </a>.</p>
  </div>
</form>


    