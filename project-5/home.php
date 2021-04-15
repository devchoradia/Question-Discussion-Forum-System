<?php 
session_start();

 if(isset($_SESSION['id']) &&($_SESSION['id'] !='')){
include "main_header.php";

?>
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
  /*text-decoration: underline;*/
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
  background-color: #f7e1f7;
}
textarea {
  width: 100% !important;
  padding: 15px !important;
  margin: 5px 0 22px 0 !important;
  
  border: none !important;
  background: white !important;

}
.btnask{
  border: 3px solid #a78fff;
  margin: 2px;
  padding: 2px;
  cursor: pointer;
  background: #1d0a63;
  color: white;
}
</style>
  <div class="w3-row w3-padding-64">
    <input type="hidden" name="uid" class="uid" value="<?php echo $_SESSION['id']; ?>">
    <input type="hidden" name="uname" class="uname" value="<?php echo $_SESSION['name']; ?>">
       <span style="margin-left:90%;"><a href="add_question.php"><button class = "btnask">Ask Question</button></a></span>
      <div class="column6">
     <label><b style="color:#1e90ff;font-weight:bold;margin-left: 15px; font-size: 20px;"><?php echo $_SESSION['name'];?></label></b>
     <textarea class="question" style="margin-left: 15px;" readonly="readonly">What is your question?</textarea>
 </div>
      <?php 
      $category = array("1"=>"Algorithm","2"=>"Machine Learning","3"=>"System","4"=>"Java Script");
        $select_que = mysqli_query($con,"SELECT * FROM question where status='1' ORDER BY qid DESC");
        while($fet_que = mysqli_fetch_assoc($select_que)){ 
              $vote = mysqli_query($con,"SELECT * FROM upvote where status='1' AND qid='".$fet_que['qid']."'");
              $sel_ans = mysqli_query($con,"SELECT * FROM answer where qid='".$fet_que['qid']."' ORDER BY aid DESC");
              $ans_cnt = mysqli_num_rows($sel_ans);
              $vote_cnt = mysqli_num_rows($vote);
              $vote1 = mysqli_query($con,"SELECT * FROM upvote where status='1' AND qid='".$fet_que['qid']."' AND uid='".$_SESSION['id']."'");
              $fet_vote = mysqli_fetch_assoc($vote1);
              ?>
      <div class="row">
       <!--  <input type="button" name="space" value="Algorithm" readonly="readonly"> -->
      <h3 class="w3-text-teal" style="text-align: center;"><?php echo $category[$fet_que['space']];?></h3>
          <div class="column1" >
            <h2 style=""><?php echo $fet_que['creatorName'];?></h2>
            <p><?php echo date('d-m-Y',strtotime($fet_que['time']));?></p>
          </div>
          <div class="column2" >
            <a href="question_details.php?key=<?php echo $fet_que['qid'];?>" style="color:#1e90ff;"><h2><?php echo $fet_que['title'];?></h2></a>
            <p class="comment more"><?php echo $fet_que['content'];?></p>
            
            <hr>
            <?php if(isset($fet_vote['status'])){?>
            <div class="column3" style="color:green;" id="vote_<?php echo $fet_que['qid'];?>" ><b onclick="vote('<?php echo $fet_que['qid'];?>')">Upvote</b> (<b id="vote_dis_<?php echo $fet_que['qid'];?>"><?php echo $vote_cnt;?></b>)</div>
          <?php }else{?>
            <div class="column3" id="vote_<?php echo $fet_que['qid'];?>" onclick="vote('<?php echo $fet_que['qid'];?>')" style="color:#1e90ff;">Upvote (<b id="vote_dis_<?php echo $fet_que['qid'];?>"><?php echo $vote_cnt;?></b>)</div>
          <?php }?>
          <!-- <div class="column4 pointer" href="question_details.php?key=<?php echo $fet_que['qid'];?>" onclick="submitAns('<?php echo $fet_que['qid'];?>')">Answer(<?php echo $ans_cnt;?>)</div> -->
           <div class="column5"><a href="question_details.php?key=<?php echo $fet_que['qid'];?>">Answer(<?php echo $ans_cnt;?>)</a></div> 
          </div>
          
        </div>
      <?php }?>
   
    
  </div>

  <script type="text/javascript">
    function vote(id){
      var uid    = $('.uid').val();
      var uname  = $('.uname').val();
        $.ajax({
                url:'ajax_submit_vote.php',
                type:'POST',
                data:{'qid':id,'uid':uid,'uname':uname},
                success:function(data){
                   if(data =='1'){
                        var vote = $('#vote_dis_'+id).text();
                        var cnt  = parseInt(vote)+parseInt(1);
                        $('#vote_dis_'+id).text(cnt);
                        $('#vote_'+id).css("color","green");
                        $('#vote_'+id).css("font-weight","bold");
                   }else{
                    $('#vote_'+id).css("color","#1e90ff");
                    var vote = $('#vote_dis_'+id).text();
                    var cnt  = parseInt(vote)-parseInt(1);
                    $('#vote_dis_'+id).text(cnt);
                    //alert('Your already voted this question.');
                   }
                }
            });
    }
   

  </script>
  
<?php include "main_footer.php";
}else{
    header("location:index.php");
  }
?>