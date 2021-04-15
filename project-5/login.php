<?php include "header.php";
  
?>


<form action="#" method="post" autocomplete="off">
  <div class="container">
    <h1>Sign In</h1>
   <!--  <p>Please fill in this form to create an account.</p> -->
    <hr>
    <label for="email"><b>E-mail</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" class="form-control">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" class="form-control" required autocomplete="off">
    <hr>
    <a href="register.php" style="color: rgb(255, 255, 255);color: #087ccd;">Register</a>
    <span><!-- |</span>&nbsp;<a class="" style="cursor: pointer; line-height: 30px; color: rgb(8, 124, 205);" href="#">Forgot password</a> -->
   
    <button type="button" class="registerbtn">Sign In</button>
  </div>
  
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $('.registerbtn').click(function(){
            if($('#email').val() !=''){
                var email = $('#email').val();
            }else{
                alert('Please enter email Id..');
                return false;
            }
             if($('#psw').val() !=''){
                 var psw = $('#psw').val();
            }else{
                alert('Please enter password');
                return false;
            }
            
           
             $.ajax({
                url:'ajax_login.php',
                type:'POST',
                data:{'email':email,'psw':psw},
                success:function(data){
                   if(data =='1'){
                       // alert('Welcome '+email);
                        window.location.href = 'home.php';
                   }else{
                        alert('Incorrect user name and password..');

                   }
                }
            });
        });
    });
</script>
</body>
</html>
