
<?php
session_start();

 if(isset($_SESSION['id']) &&($_SESSION['id'] !='')){
  include "main_header.php";
   $uid   = $_SESSION['id'];
   $uname = $_SESSION['name'];

if(isset($_POST['title'])){
    $add_que = mysqli_query($con,"INSERT INTO question(space,title,content,creatorid,creatorName,status,up) values('".$_POST['space']."','".$_POST['title']."','".$_POST['content']."','".$uid."','".$uname."','1','0')");
    
    header("location:home.php");
}
  ?>
<body>

  <style>
body {
  font-family: Arial, Helvetica, sans-serif;
 /* background-color: black;*/
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
  margin-left: 250px;
  margin-top: 65px;
  height: 100%;
}

/* Full-width input fields */
.form-control {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #e1e1f1;
}
input[type=radio] {
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #e1e1f1;
}
textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  
  border: none;
  background: #e1e1f1;

}
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>

<form action="" method="post" autocomplete="off">
  <div class="container">
    <h1>Ask your question</h1>
    <!-- <p>Please fill in this form to create an account.</p> -->
    <hr>
    <label for="Title"><b>Title</b></label>
    <input type="text" placeholder="Enter title" name="title" id="title" class="form-control" required autocomplete="off">
    <label for="Space"><b>Space</b></label><br><b>
    <input type="radio" name="space" value="1" checked> Algorithm &nbsp;
    <input type="radio" name="space" value="2"> Machine Learning &nbsp;
    <input type="radio" name="space" value="3"> System &nbsp;
    <input type="radio" name="space" value="4"> Java Script</b><br>
    <label for="Content"><b>Content</b></label><br>
    <textarea name="content" id="content" value="" required></textarea>
   
    <hr>
    <button type="submit" class="registerbtn">ADD</button>
  </div>
  
</form>

<?php }else{
    header("location:index.php");
  }?>
