<?php include './header.php'; ?>

<div class="index-main-content">
	<div class="monocrop-detail" style="padding-top: 25%;">
		<div class="monocrop-list">
			<?php 
			  $query = "SELECT * FROM monocrop Limit 3";
              $resultCrop = $db->select($query);
              if($resultCrop){
                while($resultCropp = $resultCrop->fetch_assoc()){
			?>
			        <div class="monocrop-list-one" style="margin-left: 10%;">
				        <div class="monocrop-body">
				        	<div class="monocrop-body-detail">
				        		<img src="img/<?php echo $resultCropp['cropName']; ?>.png" width="60px" height="60px"><br>
				        		<span style="font-weight: bold;"><?php echo $resultCropp['areaForFamous']; ?></span><br><br>
				        		<span>Retail Selling Price= <b><?php echo $resultCropp['sellingPrice']; ?></b></span><br>
				        		<span>Total Available Amount= <b><?php echo $resultCropp['totalAmount']; ?></b></span>
				        	</div>
				        </div>
				        <div class="monocrop-name">
                            <div class="monocrop-name-text">
                                <span><?php echo $resultCropp['cropName']; ?></span>
                            </div>
                        </div>
				    </div>
			<?php
			    }
		       }
			?>
		</div>
	</div>
</div>
<div class="monocrop-search">
	<div class="monocrop-search-bar">
        <select id="dMethodt" style="width: 150%;height: 70px; background: #eee; border: 1px solid #c1c1c1;font-size: 20px;margin-top: 50px;">
                <option disabled selected value>Select Crop</option>
                        <?php
                            $query = "SELECT * FROM monocrop";
                            $resultCrop = $db->select($query);
                            if($resultCrop){
                            while($resultCropp = $resultCrop->fetch_assoc()){
                              ?>
                               <option value="<?php echo $resultCropp['id'];?>" cropName="<?php echo $resultCropp['cropName'];?>">
                                   <?php echo $resultCropp['cropName']; echo"..."; echo $resultCropp['areaForFamous']; ?>
                               </option>
                              <?php
                              }
                            }
                        ?>
              </select>
		
	</div>
	<div class="monocrop-search-detail">
        <div class="cropDisplayLogo">
            <img src="img/leaf.png" width="100px" height="100px"><br>
        </div>
        <label><b>Warehouse? = </b></label> <label class="warehouse"></label><br>
        <label><b>Crop description? = </b></label> <label class="description"></label><br>
        <label><b>Retail selling price? = </b></label> <label class="sellingPrice"></label><br>
        <label><b>Total Available Crop Amount? = </b></label> <label class="totalAmount"></label><br>
    </div>
</div>
<div class="agri-info">
    <div class="agri-info-part">
        <div class="agri-info-part-head">
            <img class="agri-info-part-head-logo" src="img/farmer.png">
            <span class="contact-text">Farmer</span>
        </div>
        <div class="agri-info-part-body">
            <?php 
                $query = "SELECT * FROM farmer";
                $result = $db->select($query);
                $i=0;
                if($result){
                    while($resultt = $result->fetch_assoc()){
                        $i++;
                    }
                }
                echo $i;
            ?>
        </div>
    </div>
    <div class="agri-info-part">
        <div class="agri-info-part-head">
            <img class="agri-info-part-head-logo" src="img/warehouse.jpg">
            <span class="contact-text">Warehouse</span>
        </div>
        <div class="agri-info-part-body">
            <?php 
                $query = "SELECT * FROM warehouse";
                $result = $db->select($query);
                $i=0;
                if($result){
                    while($resultt = $result->fetch_assoc()){
                        $i++;
                    }
                }
                echo $i;
            ?>
        </div>
    </div>
    <div class="agri-info-part">
        <div class="agri-info-part-head">
            <img class="agri-info-part-head-logo" src="img/employee.jpg">
            <span class="contact-text">Employee</span>
        </div>
        <div class="agri-info-part-body">
            <?php 
                $query = "SELECT * FROM employee";
                $result = $db->select($query);
                $i=0;
                if($result){
                    while($resultt = $result->fetch_assoc()){
                        $i++;
                    }
                }
                echo $i;
            ?>
        </div>
    </div>
</div>

<?php include('footer.php') ?>
<script type="text/javascript">

$( "select" ).change(function () {
    var cropId = "";
    var cropName ="";
    $( "select option:selected" ).each(function() {
        cropId = $(this).attr('value');
        cropName = $(this).attr('cropName');
    });
    $.ajax({
        method: "POST",
        url: "getValueForBuyingSelling.php",
        data: {
            cropId: cropId,
        },
        success: function (data) {
            $('.warehouse').text(data.warehouse);
            $('.description').text(data.description);
            $('.totalAmount').text(data.totalAmount);
            $('.sellingPrice').text(data.sellingPrice);
            $('.cropDisplayLogo').html('');
            $('.cropDisplayLogo').html('<img src="img/'+cropName+'.png" width="100px" height="100px">');
        }
    });
});
$('.agri-info-part-body').each(function () {
  var $this = $(this);
  jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
    duration: 3000,
    easing: 'swing',
    step: function () {
      $this.text(Math.ceil(this.Counter));
    }
  });
});
</script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<style type="text/css">
.index-main-content{
    margin-top: -25%;
    background-image: url('img/farmer.jpg');
    background-repeat: no-repeat;
    background-size: 100% 600px;
    height: 600px;
    width: 100%;
}
.monocrop-search{
    margin-top: 0%;
    height: 300px;
}
.monocrop-name-text{
    padding-top: 15px;
    margin-top: 5px;
    color: black;
}
.agri-info{
    height: 400px;
    background: #eee;
}
.agri-info-part{
    margin-left: 15%;
    float: left;
    width: 15%;
    padding-top: 6%;
}
.agri-info-part-head{
    width: 140px;
    height: 140px;
    border-radius: 50%;
}
.agri-info-part-head-logo{
    width: 140px;
    height: 140px;
    border: 2px solid green;
    border-radius: 50%;
}
.agri-info-part-body{
    font-size: 30px;
    margin-left: 27%;
    padding-top: 10%;
}
.contact-text {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    font-size: 20px;
}
.agri-info-part-head:hover .contact-text {
    visibility: visible;
}
</style>