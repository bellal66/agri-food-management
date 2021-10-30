<?php include './header.php'; ?>
<?php include './side.php'; ?>

<main class="app-content">
    <div class="bs-component">
        <div class="card">
            <h5 class="card-header">Warehouse Debit And Credit</h5>
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
                                                <th>Warehouse Name</th>
                                                <th>Total Buying Crop</th>
                                                <th>Total Selling Crop</th>
                                                <th>Total Employee Salary</th>
                                                <th>Total Save Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        	$i=0;
                                        	    $query = "SELECT * FROM warehoue_debitprofit ORDER BY id DESC";
                                                $result = $db->select($query);
                                                if($result){
                                    	            while($resultRow = $result->fetch_assoc()){
                                    	            	$i++;
                                        	        ?>
                                        	        <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th><?php echo $resultRow['warehouse']; ?></th>
                                                        <th>
                                                            <?php echo $resultRow['totalBuyingCrop']; ?>
                                                        </th>
                                                        <th>
                                                            <?php echo $resultRow['totalSellingCrop']; ?>
                                                        </th>
                                                        <th>
                                                            <?php echo $resultRow['totalExpense']; ?>
                                                        </th>
                                                        <th><?php echo $resultRow['totalSaveAmount']; ?></th>
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
<style type="text/css">
    tbody tr th{
        font-weight: normal;
    }
</style>