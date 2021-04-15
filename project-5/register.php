<?php include "header.php";
  
?>

</head>
<body>

<form action="#" method="post" autocomplete="off">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="name" id="name" class="form-control" required autocomplete="off">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" class="form-control" required autocomplete="off">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" class="form-control" required autocomplete="off">

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="repsw" id="repsw" class="form-control" required autocomplete="off">
    <hr>
    <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->

    <button type="button" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
<script type="text/javascript">
    $(document).ready(function(){
        $('.registerbtn').click(function(){
            var name = $('#name').val();
            var email = $('#email').val();
            var psw = $('#psw').val();
            var repsw = $('#repsw').val();
            if(psw == repsw){  

            $.ajax({
                url:'ajax_register.php',
                type:'POST',
                data:{'name':name,'email':email,'psw':psw,'repsw':repsw},
                success:function(data){
                   // location.reload();
                   //$('.modal-body').html(data);
                   if(data =='1'){
                    //window.location('login.php');
                    window.location.href = 'login.php';
                   }else{
                    alert('Some Error, Please try again..');
                   }
                }
            });

            }else{
                alert('Password Is not equal..');
            }
        });
        $('#email').keyup(function(){
            var email = $(this).val();
             $.ajax({
                url:'ajax_email_checking.php',
                type:'POST',
                data:{'email':email},
                success:function(data){
                   if(data =='1'){
                        alert('Email-Id Already exist...');
                        $('#email').val('');
                   }
                }
            });
        });
    });
</script>
</body>
</html>
