<?php include './header.php'; ?>
<?php include './side.php'; ?>

<main class="app-content">
    <div class="bs-component">
        <div class="card">
            <h5 class="card-header">Warehouse Per Sell/Buy</h5>
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
                                                <th>Customer Name</th>
                                                <th>Credit</th>
                                                <th>Debit</th>
                                                <th>Warehouse</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        	$i=0;
                                        	    $query = "SELECT * FROM warehousedetail ORDER BY id DESC";
                                                $result = $db->select($query);
                                                if($result){
                                    	            while($resultRow = $result->fetch_assoc()){
                                    	            	$i++;
                                        	        ?>
                                        	        <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th><?php echo $resultRow['farmer']; ?></th>
                                                        <th><?php echo $resultRow['credit']; ?></th>
                                                        <th><?php echo $resultRow['debit']; ?></th>
                                                        <th><?php echo $resultRow['warehouse']; ?></th>
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
                </div>
            </div>
        </div>
    </div>
</main>

<?php include './footer.php'; ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script type="text/javascript">$('#sampleTable2').DataTable();</script>
<style type="text/css">
    tbody tr th{
        font-weight: normal;
    }
</style>