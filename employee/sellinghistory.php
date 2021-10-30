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
            <h5 class="card-header">Selling Crop History</h5>
            <div class="card-body">
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
                                                <th>Quantity</th>
                                                <th>Selling Price</th>
                                                <th>Amount</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        	$i=0;
                                        	    $query = "SELECT * FROM warehousedetail2 WHERE warehouse='$warehouse' ORDER BY id DESC";
                                                $result = $db->select($query);
                                                if($result){
                                    	            while($resultRow = $result->fetch_assoc()){
                                    	            	if($resultRow['sellingPrice'] != 0){
                                    	            	$i++;
                                        	        ?>
                                        	        <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th><?php echo $resultRow['cropName']; ?></th>
                                                        <th><?php echo $resultRow['quantity']; ?></th>
                                                        <th><?php echo $resultRow['sellingPrice']; ?></th>
                                                        <th><?php echo $resultRow['amount']; ?></th>
                                                        <th><?php echo $resultRow['date']; ?></th>
                                                    </tr>
                                                    <?php
                                                       }
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
<style type="text/css">
    tbody tr th{
        font-weight: normal;
    }
</style>