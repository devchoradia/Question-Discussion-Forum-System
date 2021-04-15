<?php include "header.php";?>

<!-- Main content: shift it to the right by 250 pixels when the sidebar is visible -->
<div class="w3-main" style="margin-left:250px">
  
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
  /*text-decoration: underline;*/
  color: #1e90ff;
}
.column5 {
  float: left;
  width: 33.33%;
  padding: 0px;
  cursor: pointer;
  text-decoration: underline;
  color: #1e90ff;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;

}
.row{
  background-color: #f7e1f7;
}
textarea {
  width: 100% !important;
  padding: 15px !important;
  margin: 5px 0 22px 0 !important;
  
  border: none !important;
  background: white !important;

}
</style>
  <div class="w3-row w3-padding-64">
    <!-- <div class="w3-twothird w3-container"> -->
      <?php 
      //print_r($con);
      $key = $_GET['key'];
      $category = array("1"=>"Algorithm","2"=>"Machine Learning","3"=>"System","4"=>"Java Script");
        $select_que = mysqli_query($con,"SELECT * FROM question where status='1' AND space='".$key."' ORDER BY qid DESC");
        while($fet_que = mysqli_fetch_assoc($select_que)){ ?>
      <div class="row">
       <!--  <input type="button" name="space" value="Algorithm" readonly="readonly"> -->
      <h3 class="w3-text-teal" style="text-align: center;"><?php echo $category[$fet_que['space']];?></h3>
          <div class="column1" >
            <h2 style=""><?php echo $fet_que['creatorName'];?></h2>
            <p><?php echo date('d-m-Y',strtotime($fet_que['time']));?></p>
          </div>
          <div class="column2" >
            <a href="details.php?key=<?php echo $fet_que['qid'];?>" id="column5"><h2><?php echo $fet_que['title'];?></h2></a>
            <p class="comment more"><?php echo $fet_que['content'];?></p>
            <?php 
              $sel_ans = mysqli_query($con,"SELECT * FROM answer where qid='".$fet_que['qid']."'");
              $ans_cnt = mysqli_num_rows($sel_ans);
              $vote = mysqli_query($con,"SELECT * FROM upvote where status='1' AND qid='".$fet_que['qid']."'");
              $vote_cnt = mysqli_num_rows($vote);
              ?>
            
            <hr>
            <div class="column3">Upvote (<?php echo $vote_cnt;?>)</div>
          <div class="column4 pointer" onclick="submitAns('<?php echo $fet_que['qid'];?>')">Answer(<?php echo $ans_cnt;?>)</div>
          <!-- <div class="column5">Details</div> -->
          </div>
          
        </div>
      <?php }?>
   
    
  </div>
  
  
<?php include "footer.php";
?>