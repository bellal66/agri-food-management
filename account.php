<?php
session_start();
?>
<?php include './header.php'; ?>
<div class="assistance-header">
	<div class="assistance-header-option">
		<div class="assistance account assistance-show">Account</div> 
		<div class="assistance sell-history">Crop Sell History</div>  
		<div class="assistance account-update" style="width: 150px;">Account Update</div>
	</div><br><br>
	<div class="assistance-header-option-detail">


      <?php
          $query = "SELECT * from `farmer` where username='$_COOKIE[username]' and password='$_COOKIE[password]' LIMIT 1";
          $result = $db->select($query);
          if ($result) {
            $Profile = $result->fetch_assoc();
      ?>           
      
            <div class="containerr">
              <label ><b>Username*</b></label>
              <input type="text" name="username" value="<?php echo $Profile['username']; ?>" disabled="disabled">
              <label><b>Password*</b></label>
              <input type="text"  name="pass" value="<?php echo $Profile['password']; ?>" disabled="disabled">
              <label><b>Address*</b></label>
              <input type="text" name="address" value="<?php echo $Profile['address']; ?>" disabled="disabled">
              <label><b>Warehouse*</b></label>
              <input type="text" name="address" value="<?php echo $Profile['warehouse']; ?>" disabled="disabled">
              <label><b>Crop*</b></label>
              <input type="text" name="address" value="<?php echo $Profile['cropType']; ?>" disabled="disabled">
              <label><b>Agri-Land (Percent)*</b></label>
              <input type="text" name="address" value="<?php echo $Profile['agriLand']; ?>" disabled="disabled">
            </div><br><br><br>

      <?php
         }
      ?>


	</div>
	<div class="assistance-header-option-detail2"></div>
</div>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.account').click(function(e) {
        $('.sell-history').removeClass('assistance-show');
        $('.account-update').removeClass('assistance-show');
        $(this).addClass('assistance-show');
        e.preventDefault();
        $('.assistance-header-option-detail2').hide();
        $('.assistance-header-option-detail').show();
    });
    $('.sell-history').click(function(e) {
        $('.account').removeClass('assistance-show');
        $('.account-update').removeClass('assistance-show');
        $(this).addClass('assistance-show');
        e.preventDefault();
        $('.assistance-header-option-detail').hide();
        $('.assistance-header-option-detail2').show();
        $('.assistance-header-option-detail2').load('farmerSellHistory.php');
    });
    $('.account-update').click(function(e) {
        $('.sell-history').removeClass('assistance-show');
        $('.account').removeClass('assistance-show');
        $(this).addClass('assistance-show');
        e.preventDefault();
        $('.assistance-header-option-detail').hide();
        $('.assistance-header-option-detail2').show();
        $('.assistance-header-option-detail2').load('updateAccount.php');
    });
});
</script>
<style type="text/css">
	ul{
		list-style: none;
	}
	.containerr {
           padding: 16px;
           background-color: white;
        }

        input[type=text], input[type=password], input[type=email], #dMethodt, #dTo, #wType, #wMethod {
            width: 100%;
            padding: 10px;
            margin: 5px 0 5px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
         }

          input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, #dMethodt:focus, #dTo:focus,
           #wType:focus, #wMethod:focus{
             background-color: #ddd;
             outline: none;
         }
         hr {
           border: 1px solid #f1f1f1;
           margin-bottom: 5px;
          }
</style>