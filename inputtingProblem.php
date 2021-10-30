<?php
include './lib/Database.php';
$db = new Database();
?>
<div class="inputting-problem-box">
	<div class="question1">
		<div class="question-header">Q</div>
		<div class="question-text">
			<textarea class="question-text-value question-value"></textarea><br>
			<input class="question-text-submit question-submit" type="submit" value="Submit">
		</div>
	</div><br><br>
	<?php 
	$i=0;
	$query = "SELECT * FROM inputtingproblem ORDER BY id desc";
    $resultProblem = $db->select($query);
    if($resultProblem){
        while($resultProblemm = $resultProblem->fetch_assoc()){
        	if($resultProblemm['question'] != '' && $i<3){
        		$i++;
	?>
	    <div class="question">
		    <div class="question-header">Q</div>
		    <div class="question-text"><?php echo $resultProblemm['question']; ?></div>
		    <div class="question-date">[<?php echo $resultProblemm['date']; ?>]</div>
	    </div>
	    <?php
	    $query = "SELECT * FROM inputtingproblem WHERE questionId='$resultProblemm[id]'";
        $resultAnswer = $db->select($query);
        if($resultAnswer){
            while($resultAnswerr = $resultAnswer->fetch_assoc()){
	    ?>
	        <div class="answer">
		        <div class="answer-header">A</div>
		        <div class="answer-text"><?php echo $resultAnswerr['answer']; ?></div>
	        </div>
	    <?php
            }
        }
        ?>
        <br><br>
        <?php
            }
        }
    }
	?>
</div>
<script type="text/javascript">
$('.comment-reply-option').click(function(){
	var questionId = $(this).attr('questionId');
	var html = '<div class="answer">';
      html += '<div class="answer-header">A</div>';
      html += '<div class="answer-text">';
      html += '<textarea class="question-text-value answer-value"></textarea><br>';
	  html += '<input class="question-text-submit" id="answer-submit" questionId="'+questionId+'" type="submit" value="Submit">';
      html += '</div>';
      html += '</div>';
      html += '</div>';
      $(this).parent().prepend(html);
});
$('.question-submit').click(function(){
	var question = $('.question-value').val();
	$.ajax({
        method: "POST",
        url: "insertQuestionAnswer.php",
        data: {
            question: question,
        },
        success: function (data) {
            $('.assistance-header-option-detail').hide();
            $('.assistance-header-option-detail2').show();
            $('.assistance-header-option-detail2').load('inputtingProblem.php');
        }
    });
});
$(document).on('click', '#answer-submit', function(){
	var answer = $('.answer-value').val();
	var questionId = $(this).attr('questionId');
	$.ajax({
        method: "POST",
        url: "insertQuestionAnswer.php",
        data: {
            answer: answer,
            questionId: questionId
        },
        success: function (data) {
            $('.assistance-header-option-detail').hide();
            $('.assistance-header-option-detail2').show();
            $('.assistance-header-option-detail2').load('inputtingProblem.php');
        }
    });
});
</script>
<style type="text/css">
.inputting-problem-box{
	margin-left: 5%;
	padding-top: 5%;
}
.question,.question1{
	font-size: 20px;
}
.question-header{
	width: 40px;
	height: 40px;
	border-radius: 50%;
	background: #989898;
	float: left;
	font-size: 30px;
	font-weight: bold;
	text-align: center;
}
.question-text{
	margin-left: 5%;
	padding-top: 10px;
}
.question-date{
	float: right;
	clear: both;
	margin-top: -25px;
	font-size: 15px;
	color: #989898;
}
.comment-reply{
	font-size: 16px;
	margin-left: 15%;
	margin-top: 15px;
}
.comment-reply-option{
	margin-left: 10px;
	cursor: pointer;
}
.answer{
	margin-left: 6%;
	padding-top: 3%;
	clear: both;
}
.answer-header{
	width: 30px;
	height: 30px;
	border-radius: 50%;
	background: #989898;
	float: left;
	font-size: 25px;
	font-weight: bold;
	text-align: center;
}
.answer-text{
	margin-left: 4%;
	padding-top: 7px;
}
.question-text-value{
	height: 80px;
	width: 70%;
	clear: both;
}
.question-text-submit{
	height: 30px;
	width: 15%;
	text-align: center;
	font-size: 17px;
	color: green;
}
</style>