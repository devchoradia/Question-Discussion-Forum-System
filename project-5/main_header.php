<?php 
//session_start();
// echo "<pre>";
// print_r($_SESSION);
include "db.php";?>
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
.w3-sidebar {
  z-index: 3;
  width: 250px;
  top: 43px;
  bottom: 0;
  height: inherit;
}
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
.column6 {
  float: left;
  width: 100%;
  padding: 0px;
  cursor: pointer;
  background-color: #e6e4e4;
  /*height: 200px;*/ /* Should be removed. Only for demonstration */
}
</style>

<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    <a href="home.php" class="w3-bar-item w3-button w3-theme-l1">ASKME</a>
    <a href="home.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Home</a>
    <a href="hot.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">HOT</a>
   <!--  <a href="add_question.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white">Ask Question</a> -->
    <a class="w3-bar-item w3-button w3-hide-small w3-hover-white"> <form action="search_title.php" method="post">
      <input type="text" placeholder="Search.." name="search" style="width:750px;">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    
  </a>
  
    <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-hover-white" ><span><?php echo $_SESSION['name'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign Out</a>
  </div>
  
</div>


<!-- Sidebar -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-theme-l5 w3-animate-left" id="mySidebar">
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
    <i class="fa fa-remove"></i>
  </a>

  <a class="w3-bar-item w3-button w3-hover-black" href="category_filter.php?key=1">Algorithm</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="category_filter.php?key=2">Machine Learning</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="category_filter.php?key=3">System</a>
  <a class="w3-bar-item w3-button w3-hover-black" href="category_filter.php?key=4">Java Script</a>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
