<?php include './header.php'; ?>
<?php include './side.php'; ?>

<main class="app-content">
    <div class="bs-component">
        <div class="card">
            <h5 class="card-header">Farmer</h5>
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
                                                <th>Farmer Name</th>
                                                <th>Password</th>
                                                <th>Address</th>
                                                <th>Crop Type</th>
                                                <th>Agri Land</th>
                                                <th>Warehouse</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        	$i=0;
                                        	    $query = "SELECT * FROM farmer ORDER BY id DESC";
                                                $result = $db->select($query);
                                                if($result){
                                    	            while($resultRow = $result->fetch_assoc()){
                                    	            	$i++;
                                        	        ?>
                                        	        <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th><?php echo $resultRow['username']; ?></th>
                                                        <th><?php echo $resultRow['password']; ?></th>
                                                        <th><?php echo $resultRow['address']; ?></th>
                                                        <th><?php echo $resultRow['cropType']; ?></th>
                                                        <th><?php echo $resultRow['agriLand']; ?></th>
                                                        <th><?php echo $resultRow['warehouse']; ?></th>
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