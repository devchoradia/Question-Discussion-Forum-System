<?php
 include "header.php";
?>
<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">
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
</style>
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
  width: 100%;
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
  /*text-decoration: underline;*/
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
.align{
  /*margin-left:15px;*/ 
  text-indent: 15px; 
}
.ans_align{
  text-indent: 25px;  
}
</style>
  <div class="w3-row w3-padding-64">
    <!-- <div class="w3-twothird w3-container"> -->
      <?php 

      $key = $_GET['key'];
      $category = array("1"=>"Algorithm","2"=>"Machine Learning","3"=>"System","4"=>"Java Script");
        $select_que = mysqli_query($con,"SELECT * FROM question where status='1' AND qid='".$key."'");
        while($fet_que = mysqli_fetch_assoc($select_que)){ ?>
      <div class="row">
       <!--  <input type="button" name="space" value="Algorithm" readonly="readonly"> -->
      <h3 class="w3-text-teal" style="text-align: center;"><?php echo $category[$fet_que['space']];?></h3>
          
          <div class="column2" >
            <div class="align">
             <h5 style=""><b style="color:blue;font-weight:bold"><?php echo $fet_que['creatorName'];?></b>  <small class="w3-center w3-small w3-opacity">Posted on <span><?php echo date('d-m-Y h:i:s A',strtotime($fet_que['time']));?></span></small></h5>
             
            <h2><?php echo $fet_que['title'];?></h2>
            <p class="comment more"><?php echo $fet_que['content'];?></p>
            <hr>
            <div class="ans_align">
            <?php 
              $vote = mysqli_query($con,"SELECT * FROM upvote where status='1' AND qid='".$fet_que['qid']."'");
              $sel_ans = mysqli_query($con,"SELECT * FROM answer where qid='".$fet_que['qid']."'");
              $ans_cnt = mysqli_num_rows($sel_ans);
              $vote_cnt = mysqli_num_rows($vote);

              while($fet_sel_ans = mysqli_fetch_assoc($sel_ans)){?>
                 <h5 style=""><b style="color: blue;"><?php echo $fet_sel_ans['uname'];?></b>  <small class="w3-center w3-small w3-opacity">answered on <span><?php echo date('d-m-Y h:i:s A',strtotime($fet_sel_ans['added_date']));?></span></small></h5>

                <p><?php echo $fet_sel_ans['content'];?></p><hr>
             <?php }
              ?>
            
            </div>
            <hr>
           
            <div class="column3" id="vote_<?php echo $fet_que['qid'];?>" style="color:#1e90ff;"><b>Upvote</b> (<b id="vote_dis_<?php echo $fet_que['qid'];?>"><?php echo $vote_cnt;?></b>)</div>
         
          <div class="column4 pointer" onclick="submitAns('<?php echo $fet_que['qid'];?>')">Answer(<?php echo $ans_cnt;?>)</div>
          <div class="column5"><a href="index.php">Back</a></div>
          </div>
          </div>
        </div>
      <?php }?>
   
    
  </div>
 <script type="text/javascript">
  
  </script>
  
<?php 

include "footer.php";

?>