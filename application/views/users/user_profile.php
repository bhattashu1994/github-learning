

<div class="container">
  <?php if(!empty($data)){ ?>
    
         <h4  class="text-align:center;" style="padding-left:150px;">User Detail</h4>
      
    
              <table style= width:"100% ;margin-left: 5px;margin-right: 5px;">
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
   
                     <td><button>
        <!-- <a href="<?php //echo base_url('User/delete_user/'.$val['id']) ?>">delete</a> -->
                      <a onclick="delete_user(<?php echo $val['id'];?>)">delete</a>
                      </button></td>

                <?php } ?>

    </table>   
  <?php }else{
        echo 'No user found';
      }
   ?>
    </div>
    
    
    
   
    </div>
 




