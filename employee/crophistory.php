<?php include './header.php'; ?>
<?php include './side.php'; ?>
<?php
if (isset($_COOKIE['adminPanel'])) {
    $warehouse = $_COOKIE['warehouse'];
} else {
    $warehouse = $_SESSION['warehouse'];
}

?>
<main class="app-content">
    <div class="bs-component">
        <div class="card">
            <h5 class="card-header">Add Crop*</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tile">
                            <div class="tile-body">
                                <h4 class="btn btn-primary addCrop">Add Crop</h4>
                                <div class="alert alert-success" style="display: none;">
                                    <span style="margin-left: 45%;">Succesfull</span>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover addCropTable">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <h5 class="card-header">Crops List*</h5>
                <div class="row">
                    <div class="col-lg-12">
                    	<div class="tile">
                            <div class="tile-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="sampleTable">
                                    	<thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Crop Name</th>
                                                <th>Description</th>
                                                <th>Buying Price</th>
                                                <th>Selling Price</th>
                                                <th>Quantity (kg)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        	$i=0;
                                        	    $query = "SELECT * FROM monocrop WHERE areaForFamous='$warehouse' ORDER BY id ASC";
                                                $result = $db->select($query);
                                                if($result){
                                    	            while($resultRow = $result->fetch_assoc()){
                                    	            	$i++;
                                        	        ?>
                                        	        <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th><?php echo $resultRow['cropName']; ?></th>
                                                        <th><?php echo $resultRow['description']; ?></th>
                                                        <th><?php echo $resultRow['buyingPrice']; ?></th>
                                                        <th><?php echo $resultRow['sellingPrice']; ?></th>
                                                        <th><?php echo $resultRow['totalAmount']; ?></th>
                                                    </tr>
                                                    <?php
                                                    } 
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include './footer.php'; ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script type="text/javascript">
    $('.addCrop').click(function(){
      var html = '<tr>';
      html += '<th><input type="text" class="cropName" placeholder="Crop Name"></th>';
      html += '<th><textarea type="text" class="description"  placeholder="Description"></textarea></th>';
      html += '<th><input type="number" class="buyingPrice"  placeholder="Buying Price"></th>';
      html += '<th><input type="number" class="sellingPrice"  placeholder="Selling Price"></th>';
      html += '<th><input type="submit" class="addCropSubmit btn btn-primary"  value="Insert"></th>';
      html += '</tr>';
      $('.addCropTable').prepend(html);
    });
    $(document).on('click', '.addCropSubmit', function(){
        var cropName = $('.cropName').val();
        var description = $('.description').val();
        var buyingPrice = $('.buyingPrice').val();
        var sellingPrice = $('.sellingPrice').val();
        $.ajax({
        method: "POST",
        url: "addCropInsert.php",
        data: {
            addCropName: cropName,
            description: description,
            buyingPrice: buyingPrice,
            sellingPrice: sellingPrice
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
    .addCropTable{
        border: 1px solid white;
    }
    .cropName, .buyingPrice, .sellingPrice{
        height: 40px;
        width: 150px;
    }
     .description{
        height: 50px;
        width: 200px;
     }
</style>
<style type="text/css">
    tbody tr th{
        font-weight: normal;
    }
</style>