<?php include './header.php'; ?>
<?php include './side.php'; ?>

<main class="app-content">
    <div class="bs-component">
        <div class="card">
            <h5 class="card-header">Import & Export</h5>
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
                                                <th>Country Name</th>
                                                <th>Description</th>
                                                <th>Export</th>
                                                <th>Import</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        	$i=0;
                                        	    $query = "SELECT * FROM abroad ORDER BY id DESC";
                                                $result = $db->select($query);
                                                if($result){
                                    	            while($resultRow = $result->fetch_assoc()){
                                    	            	$i++;
                                        	        ?>
                                        	        <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th>
                                                            <a href="ImportExportHistoryDetail.php?id=<?=$resultRow['id']?>" style="font-size: 17px;">
                                                                <u><?php echo $resultRow['countryName']; ?></u>
                                                            </a>
                                                        </th>
                                                        <th><?php echo $resultRow['description']; ?></th>
                                                        <th><?php echo $resultRow['export']; ?></th>
                                                        <th><?php echo $resultRow['import']; ?></th>
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
<style type="text/css">
    tbody tr th{
        font-weight: normal;
    }
</style>