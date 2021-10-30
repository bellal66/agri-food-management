<?php include './header.php'; ?>
<?php include './side.php'; ?>
<link rel="stylesheet" type="text/css" href="css/buying-crop.css">
<main class="app-content">
    <div class="bs-component">
                                
        <div class="card">
            <h5 class="card-header">Export</h5>
            <div class="alert alert-success" style="display: none;">
                <span style="margin-left: 45%;">Succesfull</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="buying-crop">
                            <label><b>Country Name* &nbsp;&nbsp;</b></label>
                            <input class="country-name" type="text" required> &nbsp;&nbsp; &nbsp;&nbsp;
                            <label><b>Date* &nbsp;&nbsp;</b></label>
                            <input class="date" type="Date" required><br><br>
                            <label><b>Description* &nbsp;&nbsp;</b></label>
                            <input class="descriptionOfCountry" type="text" required>
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
                                        <th style="width: 150px; text-align: center;">Selling Price</th>
                                        <th style="width: 150px; text-align: center;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <input class="cropName" type="text" list="cropNameList" required>
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
        </div><br><br>


                
            
    </div>
</main>

<?php include './footer.php'; ?>
<script type="text/javascript">
    $('#sampleTable').DataTable();
    
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
            $('.eachPrice').val(data.sellingPrice);
            $('.totalAmount').val(data.totalAmount);
        }
    });
}); 
$('.quantity').keyup(function(){
    $eachTotalAmount1=0;
    $eachTotalAmountLast=0;
    $quantity = $(this).val();
    $eachPrice = $('.eachPrice').val();
    $('.eachTotalAmount').text($quantity * $eachPrice);
    $eachTotalAmount1 = Number($('.eachTotalAmount1').text());
    $eachTotalAmountLast = Number($('.eachTotalAmountLast').text());
    $('.totalAmount').text(($quantity * $eachPrice) + $eachTotalAmount1 + $eachTotalAmountLast);
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
            $('.eachPriceLast').val(data.sellingPrice);
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
            $('.eachPrice1').val(data.sellingPrice);
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
    var exportCrop = 0;
    var countryName = $('.country-name').val();
    var descriptionOfCountry = $('.descriptionOfCountry').val();
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
            exportCrop: exportCrop,
            countryName: countryName,
            descriptionOfCountry: descriptionOfCountry,
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

<style type="text/css">
    tbody tr th{
        font-weight: normal;
    }
    .country-name {
    width: 60%;
    padding: 10px;
    margin: 5px 0 5px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    text-align: left;
}
    .descriptionOfCountry{
    width: 89%;
    padding: 10px;
    margin: 5px 0 5px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
    text-align: left;
}
.eachPrice, .quantity, .eachPriceLast, .quantityLast, .eachPrice1, .quantity1, .totalAmount, .totalAmount1, .totalAmountLast{
    border: 1px solid white;
}
.buyingCropSubmit{
    margin-left: 75%;
    width: 15%;
    height: 10%;
}
</style>