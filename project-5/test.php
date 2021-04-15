<?php //include "main_header.php";?>
<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">
<style>
* {
  box-sizing: border-box;
}

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
  width: 50%;
  /*padding: 0px;*/
}
.column4 {
  float: left;
  width: 50%;
  padding: 0px;
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
  width: 400px;
  background-color: #f0f0f0;
  margin: 10px;
}
</style>
  <div class="w3-row w3-padding-64">
    <!-- <div class="w3-twothird w3-container"> -->
     <div class="comment more">
  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  Vestibulum laoreet, nunc eget laoreet sagittis,
  quam ligula sodales orci, congue imperdiet eros tortor ac lectus.
  Duis eget nisl orci. Aliquam mattis purus non mauris
  blandit id luctus felis convallis.
  Integer varius egestas vestibulum.
  Nullam a dolor arcu, ac tempor elit. Donec.
</div>
<div class="comment more">
  Duis nisl nibh, egestas at fermentum at, viverra et purus.
  Maecenas lobortis odio id sapien facilisis elementum.
  Curabitur et magna justo, et gravida augue.
  Sed tristique pellentesque arcu quis tempor.
</div>
<div class="comment more">
  consectetur adipiscing elit. Proin blandit nunc sed sem dictum id feugiat quam blandit.
  Donec nec sem sed arcu interdum commodo ac ac diam. Donec consequat semper rutrum.
  Vestibulum et mauris elit. Vestibulum mauris lacus, ultricies.
</div>
   
    
  </div>

<!--   <div class="w3-row">
    <div class="w3-twothird w3-container">
      <h1 class="w3-text-teal">Heading</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum
        dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    
  </div> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
  var showChar = 100;
  var ellipsestext = "...";
  var moretext = "more";
  var lesstext = "less";
  $('.more').each(function() {
    var content = $(this).html();

    if(content.length > showChar) {

      var c = content.substr(0, showChar);
      var h = content.substr(showChar-1, content.length - showChar);

      var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

      $(this).html(html);
    }

  });

  $(".morelink").click(function(){
    if($(this).hasClass("less")) {
      $(this).removeClass("less");
      $(this).html(moretext);
    } else {
      $(this).addClass("less");
      $(this).html(lesstext);
    }
    $(this).parent().prev().toggle();
    $(this).prev().toggle();
    return false;
  });
});
  </script>
<?php include "footer.php";?>
