<?php include './header.php'; ?>
<?php include './side.php'; ?>
<?php
if (isset($_COOKIE['adminPanel'])) {
    $warehouse = $_COOKIE['warehouse'];
} else {
    $warehouse = $_SESSION['warehouse'];
}

?>
<link rel="stylesheet" type="text/css" href="css/buying-crop.css">
<main class="app-content">
    <div class="bs-component">
        <div class="card">
            <h5 class="card-header">Buying Crop</h5>
            <div class="alert alert-success" style="display: none;">
            	<span style="margin-left: 45%;">Succesfull</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                    	<div class="buying-crop">
                    		<label><b>Farmer Name* &nbsp;&nbsp;</b></label>
                    		<input class="farmer-name" type="text" list="farmer-name-search" required> &nbsp;&nbsp; &nbsp;&nbsp;
                    		<datalist id="farmer-name-search">
                    			<?php
                    			    $query = "SELECT * FROM farmer";
                                    $resultFarmer = $db->select($query);
                                    if($resultFarmer){
                                    	while($resultFarmerr = $resultFarmer->fetch_assoc()){
                                    		?>
                                    		<option value="<?php echo $resultFarmerr['username'] ?>"><?php echo $resultFarmerr['address']; ?></option>
                                    		<?php
                                    	}
                                    }
                    			?>
                    		</datalist>
                    		<label><b>Date* &nbsp;&nbsp;</b></label>
                    		<input class="date" type="Date" required><br><br>
                    		<label><b>Address* &nbsp;&nbsp;</b></label>
                    		<input class="address" type="text" required>
                    	</div><br><br>
                    	<div>
                    		<table class="crop-selling-table">
                    			<thead>
                                    <tr style="background-color: #eee!important; height: 30px;">
                                        <th style="width: 175px; text-align: center;">Crope Name</th>
                                        <th style="width: 325px; text-align: center;">Description</th>
                                        <th style="width: 155px; text-align: center;">Availabe Area</th>
                                        <th style="width: 155px; text-align: center;">Availabe Amount(kg)</th>
                                        <th style="width: 150px; text-align: center;">Quantity (kg)</th>
                                        <th style="width: 150px; text-align: center;">Buying Price</th>
                                        <th style="width: 150px; text-align: center;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<tr>
                                		<th>
                                			<input class="cropName" type="text" list="cropNameList" required>
                                			<datalist id="cropNameList">
                                				<?php
                                				    $query = "SELECT * FROM monocrop WHERE areaForFamous='$warehouse'";
                                                    $resultCrop = $db->select($query);
                                                    if($resultCrop){
                                    	                while($resultCropp = $resultCrop->fetch_assoc()){
                                    		             ?>
                                    		             <option value="<?php echo $resultCropp['cropName'] ?>">
                                    		             </option>
                                    		             <?php
                                    	                }
                                                    }
                                				?>
                                			</datalist>
                                		</th>
                                		<th class="description"></th>
                                		<th class="AArea"></th>
                                        <th><input type="number" class="totalAmount"></th>
                                		<th><input class="quantity" type="number" required></th>
                                		<th><input class="eachPrice" type="number" required></th>
                                		<th class="eachTotalAmount"></th>
                                	</tr>
                                	<tr>
                                		<th>
                                			<input class="cropName1" type="text" list="cropNameList" required>
                                			<datalist id="cropNameList">
                                				<?php
                                				    $query = "SELECT * FROM monocrop";
                                                    $resultCrop = $db->select($query);
                                                    if($resultCrop){
                                    	                while($resultCropp = $resultCrop->fetch_assoc()){
                                    		             ?>
                                    		             <option value="<?php echo $resultCropp['cropName'] ?>">
                                    		             </option>
                                    		             <?php
                                    	                }
                                                    }
                                				?>
                                			</datalist>
                                		</th>
                                		<th class="description1"></th>
                                		<th class="AArea1"></th>
                                        <th><input type="number" class="totalAmount1"></th>
                                		<th><input class="quantity1" type="number" required></th>
                                		<th><input class="eachPrice1" type="number" required></th>
                                		<th class="eachTotalAmount1"></th>
                                	</tr>
                                	<tr class="lastRow" style="display: none;">
                                		<th>
                                			<input class="cropNameLast" type="text" list="cropNameList" required>
                                			<datalist id="cropNameList">
                                				<?php
                                				    $query = "SELECT * FROM monocrop";
                                                    $resultCrop = $db->select($query);
                                                    if($resultCrop){
                                    	                while($resultCropp = $resultCrop->fetch_assoc()){
                                    		             ?>
                                    		             <option value="<?php echo $resultCropp['cropName'] ?>">
                                    		             </option>
                                    		             <?php
                                    	                }
                                                    }
                                				?>
                                			</datalist>
                                		</th>
                                		<th class="descriptionLast"></th>
                                		<th class="AAreaLast"></th>
                                        <th><input type="number" class="totalAmountLast"></th>
                                		<th><input class="quantityLast" type="number" required></th>
                                		<th><input class="eachPriceLast" type="number" required></th>
                                		<th class="eachTotalAmountLast"></th>
                                	</tr>
                                	<tr>
                                		<th border="">
                                	        <span style="font-size: 30px; color: green;" class="fa fa-plus-square btn addCrop"></span>
                                	    </th>
                                	</tr>
                                </tbody>
                                <tfoot>
                                	<tr>
                                		<th></th>
                                		<th></th>
                                		<th></th>
                                		<th colspan="2"><b>Total  &nbsp;&nbsp; &nbsp;&nbsp; == </b></th>
                                		<th class="totalAmount"></th>
                                	</tr>
                                </tfoot>
                    		</table><hr style="border: 1px solid #eee;">
                    		<div>
                    			<label class="btn btn-primary buyingCropSubmit">Submit</label> 
                    		</div>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include './footer.php' ?>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    $('.addCrop').click(function(){
      $('.lastRow').toggle();
      $('.cropNameLast').val('');
      $('.descriptionLast').text('');
      $('.AAreaLast').text('');
      $('.eachPriceLast').val('');
      $('.quantityLast').val('');
      $('.eachTotalAmountLast').text('');
      eachTotalAmount1 = Number($('.eachTotalAmount1').text());
      $eachTotalAmount = Number($('.eachTotalAmount').text());
      $('.totalAmount').text($eachTotalAmount1 + $eachTotalAmount);
    });
});
$('.cropName').keyup(function () {
    var itemcode = 0;
    $('.cropName').each(function() {
        itemcode = $(this).val();
    });
    $.ajax({
        method: "POST",
        url: "getValueForBuyingSelling.php",
        data: {
            cropName: itemcode,
        },
        success: function (data) {
            $('.description').text(data.description);
            $('.AArea').text(data.areaForFamous);
            $('.eachPrice').val(data.buyingPrice);
            $('.totalAmount').val(data.totalAmount);
        }
    });
}); 
$('.cropNameLast').keyup(function () {
    var itemcode = 0;
    $('.cropNameLast').each(function() {
        itemcode = $(this).val();
    });
    $.ajax({
        method: "POST",
        url: "getValueForBuyingSelling.php",
        data: {
            cropName: itemcode,
        },
        success: function (data) {
            $('.descriptionLast').text(data.description);
            $('.AAreaLast').text(data.areaForFamous);
            $('.eachPriceLast').val(data.buyingPrice);
            $('.totalAmountLast').val(data.totalAmount);
        }
    });
}); 
$('.quantityLast').keyup(function(){
	$eachTotalAmount=0;
    $eachTotalAmount1=0;
    $quantity = $(this).val();
    $eachPrice = $('.eachPriceLast').val();
    $('.eachTotalAmountLast').text($quantity * $eachPrice);
    $eachTotalAmount1 = Number($('.eachTotalAmount1').text());
    $eachTotalAmount = Number($('.eachTotalAmount').text());
    $('.totalAmount').text(($quantity * $eachPrice) + $eachTotalAmount1 + $eachTotalAmount);
});
$('.cropName1').keyup(function () {
    var itemcode = 0;
    $('.cropName1').each(function() {
        itemcode = $(this).val();
    });
    $.ajax({
        method: "POST",
        url: "getValueForBuyingSelling.php",
        data: {
            cropName: itemcode,
        },
        success: function (data) {
            $('.description1').text(data.description);
            $('.AArea1').text(data.areaForFamous);
            $('.eachPrice1').val(data.buyingPrice);
            $('.totalAmount1').val(data.totalAmount);
        }
    });
}); 
$('.quantity1').keyup(function(){
	$eachTotalAmount=0;
    $eachTotalAmountLast=0;
    $quantity = $(this).val();
    $eachPrice = $('.eachPrice1').val();
    $('.eachTotalAmount1').text($quantity * $eachPrice);
    $eachTotalAmount = Number($('.eachTotalAmount').text());
    $eachTotalAmountLast = Number($('.eachTotalAmountLast').text());
    $('.totalAmount').text(($quantity * $eachPrice) + $eachTotalAmount + $eachTotalAmountLast);
});
$(document).on('click', '.buyingCropSubmit', function(){
	var buyingCrop = 0;
	var famerName = $('.farmer-name').val();
	var address = $('.address').val();
	var totalAmount = Number($('.totalAmount').text());

	var cropName = $('.cropName').val();
	var quantity = $('.quantity').val();
	var eachPrice = $('.eachPrice').val();
	var eachTotalAmount = Number($('.eachTotalAmount').text());

	var cropName1 = $('.cropName1').val();
	var quantity1 = $('.quantity1').val();
	var eachPrice1 = $('.eachPrice1').val();
	var eachTotalAmount1 = Number($('.eachTotalAmount1').text());

	var cropName2 = $('.cropNameLast').val();
	var quantity2 = $('.quantityLast').val();
	var eachPrice2 = $('.eachPriceLast').val();
	var eachTotalAmount2 = Number($('.eachTotalAmountLast').text());
	$.ajax({
        method: "POST",
        url: "BuyingSellingMemo.php",
        data: {
        	buyingCrop: buyingCrop,
            farmerName: famerName,
            address: address,
            totalAmount, totalAmount,
            cropName: cropName,
            quantity: quantity,
            eachPrice: eachPrice,
            eachTotalAmount: eachTotalAmount,
            cropName1: cropName1,
            quantity1: quantity1,
            eachPrice1: eachPrice1,
            eachTotalAmount1: eachTotalAmount1,
            cropName2: cropName2,
            quantity2: quantity2,
            eachPrice2: eachPrice2,
            eachTotalAmount2: eachTotalAmount2
        },
        success: function (data) {
            if(data == 'okk'){
            	$('.alert-success').show();
            	setInterval(function(){
            		location.reload();
                }, 2000);
            }else{
            	$('.alert-success').show();
            	$('.alert-success').html(data);
            }
        }
    });
});
</script>
<script type="text/javascript" src="js/selling-buying.js"></script>
<style type="text/css">
.eachPrice, .quantity, .eachPriceLast, .quantityLast, .eachPrice1, .quantity1, .totalAmount, .totalAmount1, .totalAmountLast{
    border: 1px solid white;
}
.buyingCropSubmit{
    margin-left: 75%;
    width: 15%;
    height: 10%;
}
</style>