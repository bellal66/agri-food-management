<?php include './header.php'; ?>

<div class="assistance-header">
	<div class="assistance-header-option">
		<div class="assistance direct-contact assistance-show">Direct Contact</div> 
		<div class="assistance inputting-problem">Inputting Problem</div>  
		<div class="assistance unknown-problem" style="width: 150px;">Problem & Answer</div>
	</div>
	<div class="assistance-header-option-detail">
	    <?php
	    $i=0;
			$query = "SELECT * FROM warehouse";
            $resultHouse = $db->select($query);
            if($resultHouse){
                while($resultHousee = $resultHouse->fetch_assoc()){
                	$i +=1;
                    ?>
                    <div class="direct-contact-box">
                    	<div class="direct-contact-name">
                    		<?php echo $i;echo ". "; echo $resultHousee['division']; ?>
                    	</div>
			            <div class="direct-contact-detail">
			              <ul>
			            	<?php
			            	    $query = "SELECT * FROM assistcontact where warehouse='$resultHousee[division]'";
                                $resultContact = $db->select($query);
                                if($resultContact){
                                    while($resultContactt = $resultContact->fetch_assoc()){
                                    	?>
                                    	 <li>Phone: <?php echo $resultContactt['phone']; ?></li>
                                    	 <li>Mobile: <?php echo $resultContactt['mobile']; ?></li>
                                    	 <li>Email: <?php echo $resultContactt['email']; ?></li>
                                    	<?php
                                    }
                                }
			            	?>
			              </ul>
			            </div>
			        </div>
                    <?php
                }
            }
	    ?>
	</div>
	<div class="assistance-header-option-detail2"></div>
	<div style="margin-top: 20px;">.</div>
</div>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.direct-contact').click(function(e) {
        $('.inputting-problem').removeClass('assistance-show');
        $('.unknown-problem').removeClass('assistance-show');
        $(this).addClass('assistance-show');
        e.preventDefault();
        $('.assistance-header-option-detail2').hide();
        $('.assistance-header-option-detail').show();
    });
    $('.inputting-problem').click(function(e) {
        $('.direct-contact').removeClass('assistance-show');
        $('.unknown-problem').removeClass('assistance-show');
        $(this).addClass('assistance-show');
        e.preventDefault();
        $('.assistance-header-option-detail').hide();
        $('.assistance-header-option-detail2').show();
        $('.assistance-header-option-detail2').load('inputtingProblem.php');
    });
    $('.unknown-problem').click(function(e) {
        $('.inputting-problem').removeClass('assistance-show');
        $('.direct-contact').removeClass('assistance-show');
        $(this).addClass('assistance-show');
        e.preventDefault();
        $('.assistance-header-option-detail').hide();
        $('.assistance-header-option-detail2').show();
        $('.assistance-header-option-detail2').load('unknownProblem.php');
    });
});
</script>
<?php include './footer.php' ?>
<style type="text/css">
	ul{
		list-style: none;
	}
</style>