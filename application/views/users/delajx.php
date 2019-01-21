   

<div>
  <table style="width: 100%;margin-left: 5px;margin-right: 5px;"> 
    <tr>
      
      <th ><h4 class="text-center" style="padding-left: 250px;">Users Details</h3>
      
    </th>

      </tr>
      </center>
      <tr>
    <th>Firstname</th>
    <th>Lastname</th> 
     <th> Email</th>
      <th>Password</th>
  </tr>
 
      <?php

      foreach($data as $key => $val){ ?>
          <tr>
    <td><?php echo $val['firstname'];?></td>
     <td><?php echo $val['lastname'];?></td>
      <td><?php echo $val['email'];?></td>
      <td><?php echo  $val['password'];?></td>
      <td><button><a href="<?php echo base_url('User/view/'.$val['id']) ?>">view</a></button></td>
      <td><button><a href="<?php echo base_url('User/update_user/'.$val['id']) ?>">update</a></button></td>
   
      <td><button><a href="<?php echo base_url('User/delete_user/'.$val['id']) ?>">delete</a></button></td>

      <?php } ?>

    </table>
    </div>
    
    
    <button type="submit"><a href="<?php echo base_url('User/logout') ?>">logout</a></button>

   
    </div>






    <script type="text/javascript" language="javascript" >  
 $(document).ready(function(){ 
  $(document).on('click', '.delete', function(){  
           var user_id = $(this).attr("id");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>crud/delete_single_user",  
                     method:"POST",  
                     data:{user_id:user_id},  
                     success:function(data)  
                     {  
                          alert(data);  
                          dataTable.ajax.reload();  
                     }  
                });  
           }  
           else  
           {  
                return false;       
           }  
      });
 </script>