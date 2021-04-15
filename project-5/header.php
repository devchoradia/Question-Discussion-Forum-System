<?php include "db.php";?>
<!DOCTYPE html>
<html lang="en">
<title>Forum</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
/*.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 43px;
  bottom: 0;
  height: inherit;
}*/
.w3-theme {
    color: #fff !important;
    background-color: #151384 !important;
        padding: 10px;
}
.w3-sidebar {
    z-index: 3;
    width: 250px;
    top: 70px;
    bottom: 0;
    height: inherit;
}
a {
  color: #0254EB
}
a:visited {
  color: #0254EB
}
a.morelink {
  text-decoration:none;
  outline: none;
}
.morecontent span {
  display: none;
}
.comment {
  width: 100%;
 /* background-color: #f0f0f0;*/
  margin: 10px;
}
</style>
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
  margin-top: 43px;
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
.search {
  width: 50% !important;
  box-sizing: border-box !important;
  border: 2px solid #ccc !important;
  border-radius: 4px !important;
  font-size: 16px !important;
  background-color: white !important;
  background-image: url('searchicon.png');
  background-position: 10px 10px !important; 
  background-repeat: no-repeat !important;
  padding: 12px 20px 12px 40px !important;
}
</style>
<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<!-- <div class="w3-main" style="margin-left:250px"> -->
<style>


/* Create three equal columns that floats next to each other */
.column1 {
  float: left;
  width: 23%;
  padding: 0px;
  text-align: center;
  /*height: 200px;*/ /* Should be removed. Only for demonstration */
}
.column2 {
  float: left;
  width: 77%;
  padding: 0px;
  /*height: 200px;*/ /* Should be removed. Only for demonstration */
}
.column3 {
  float: left;
  width: 33.33%;
  cursor: pointer;
 /* text-decoration: underline;*/
  color: #1e90ff;
  /*padding: 0px;*/
}
.column4 {
  float: left;
  width: 33.33%;
  padding: 0px;
  cursor: pointer;
 /* text-decoration: underline;*/
  color: #1e90ff;
}
.column5 {
  float: left;
  width: 33.33%;
  padding: 0px;
  cursor: pointer;
  /*text-decoration: underline;*/
  color: #1e90ff;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;

}
.row{
  background-color: #e6e4e4;
}
textarea {
  width: 100% !important;
  padding: 15px !important;
  margin: 5px 0 22px 0 !important;
  
  border: none !important;
  background: white !important;

}
</style>

<body>
<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-theme-l1">ASKME</a>
    <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Home</a>
    <a href="hot_key.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">HOT</a>
   <a href="#" class="w3-bar-item w3-button w3-hide-small w3-hover-white" id="askque">Ask Question</a>
    <a class="w3-bar-item w3-button w3-hide-small w3-hover-white"> 
      <form action="search_title1.php" method="post">
      <input type="text" placeholder="Search.." name="search" style="width:600px;">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </a>
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Sign In</a>
    <a href="register.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Register</a>
  </div>
  
</div>


<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>

  <a class="w3-bar-item w3-button w3-hover-black" href="category_filter_key.php?key=1">Algorithm</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="category_filter_key.php?key=2">Machine Learning</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="category_filter_key.php?key=3">System</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="category_filter_key.php?key=4">Java Script</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<script type="text/javascript">
  $(document).ready(function(){
      $('#askque').click(function(){
          alert('Please Sign In');
      });
  });
</script>