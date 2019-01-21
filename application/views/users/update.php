
<form  id="update_form" method="post" action="<?php echo base_url() ?>User/update_user_data">
  <div class="container">
    <h1>Update</h1>
      <h4 style='color: red;'><?php echo $this->session->flashdata('error');?></h4>
        <h4 style='color: green;'><?php echo $this->session->flashdata('success');?></h4>


    <hr>
    <input type="hidden" name='id' value="<?php echo $data[0]['id'] ?>">
    <label for="firstname"><b>first name</b></label>
    <input type="text" placeholder="first name" name="firstname" value="<?php echo $data[0]['firstname']?>">

    <label for="lastname"><b>last name</b></label>
    <input type="text" placeholder="last name" name="lastname" value="<?php echo $data[0]['lastname']?>">

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required value="<?php echo $data[0]['email']?>">

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" value="<?php echo $data[0]['password']?>">
    <hr>

    <button type="submit" class="registerbtn">Update</button>
  </div>
  
  </form>


    