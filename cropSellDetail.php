<?php
if(isset($_GET["id"]))
  {
    $id = $_GET["id"];
  }
?>
<?php include './header.php'; ?>
<div class="assistance-header">
	<div class="assistance-header-option">
		<div class="assistance account">Account</div> 
		<div class="assistance sell-history assistance-show">Crop Sell History</div>  
		<div class="assistance account-update" style="width: 150px;">Account Update</div>
	</div><br><br>
	<div class="assistance-header-option-detail"><br><br>
  <div class="tile">
    <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Crop Name</th>
                        <th>Selling Price</th>
                        <th>Buying Price</th>
                        <th>Quantity (kg)</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $i=0;
                      $query = "SELECT * FROM warehousedetail2 WHERE warehousedetailId='$id'";
                      $result = $db->select($query);
                      if($result){
                        while($resultRow = $result->fetch_assoc()){
                          $i++;
                          ?>
                          <tr>
                            <th><?php echo $i; ?></th>
                            <th><?php echo $resultRow['cropName']; ?></th>
                            <th><?php echo $resultRow['sellingPrice']; ?></th>
                            <th><?php echo $resultRow['buyingprice']; ?></th>
                            <th><?php echo $resultRow['quantity']; ?></th>
                            <th><?php echo $resultRow['amount']; ?></th>
                            <th><?php echo $resultRow['date']; ?></th>
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
  <div class="assistance-header-option-detail2"></div>
	
</div>
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.account').click(function(e) {
        window.location.href = 'http://localhost/final/account.php';
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
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
  border-top: 2px solid #dee2e6;
}

.table .table {
  background-color: #FFF;
}

.table-bordered {
  border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

.table-responsive > .table-bordered {
  border: 0;
}
</style>