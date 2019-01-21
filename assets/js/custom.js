
$(document).ready(function() {
  $('form[id="my_form"]').validate({
    rules: {
      firstname: 'required',
      lastname: 'required',
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 8,
      }
    },
    messages: {
      firstname: 'This field is required',
      lastname: 'This field is required',
      email: 'Enter a valid email',
      password: {
        minlength: 'Password must be at least 8 characters long'
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });

  $('form[id="login_form"]').validate({
    rules: {
     
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 8,
      }
    },
    messages: {
      
      email: 'Enter a valid email',
      password: {
        minlength: 'Password must be at least 8 characters long'
      }
    },
    submitHandler: function(form) {
      form.submit();
    }
  });

 
});
 function delete_user(id){
     var url= base_url+"User/delete_user";
    $.ajax({
       url:url,
       data:{'id':id},
       type:"post",
       success: function(result){
            location.reload();
        }

      });
  }
  

