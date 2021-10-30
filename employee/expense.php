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
            <h5 class="card-header">Expense*</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tile">
                            <div class="tile-body">
                                <h4 class="btn btn-primary addExpense">Add Expense</h4>
                                <div class="alert alert-success" style="display: none;">
                                    <span style="margin-left: 45%;">Succesfull</span>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover addExpenseTable">
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <h5 class="card-header">Expense List*</h5>
                <div class="row">
                    <div class="col-lg-12">
                    	<div class="tile">
                            <div class="tile-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="sampleTable">
                                    	<thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Expense Name</th>
                                                <th>Description</th>
                                                <th>Amont</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        	$i=0;
                                        	    $query = "SELECT * FROM warehouseexpense WHERE warehouse='$warehouse' ORDER BY id DESC";
                                                $result = $db->select($query);
                                                if($result){
                                    	            while($resultRow = $result->fetch_assoc()){
                                    	            	$i++;
                                        	        ?>
                                        	        <tr>
                                                        <th><?php echo $i; ?></th>
                                                        <th><?php echo $resultRow['expenseName']; ?></th>
                                                        <th><?php echo $resultRow['description']; ?></th>
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
                </div>
            </div>
        </div>
    </div>
</main>

<?php include './footer.php'; ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<script type="text/javascript">
    $('.addExpense').click(function(){
      var html = '<tr>';
      html += '<th><input type="text" class="expenseName" placeholder="Crop Name"></th>';
      html += '<th><textarea type="text" class="description"  placeholder="Description"></textarea></th>';
      html += '<th><input type="number" class="amount"  placeholder="Buying Price"></th>';
      html += '<th><input type="submit" class="addExpenseSubmit btn btn-primary"  value="Insert"></th>';
      html += '</tr>';
      $('.addExpenseTable').prepend(html);
    });
    $(document).on('click', '.addExpenseSubmit', function(){
        var expenseName = $('.expenseName').val();
        var description = $('.description').val();
        var amount = $('.amount').val();
        $.ajax({
        method: "POST",
        url: "addExpenseInsert.php",
        data: {
            expenseName: expenseName,
            description: description,
            amount: amount
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
    .addExpenseTable{
        border: 1px solid white;
    }
    .expenseName, .amount{
        height: 50px;
        width: 200px;
    }
     .description{
        height: 50px;
        width: 300px;
     }
</style>
<style type="text/css">
    tbody tr th{
        font-weight: normal;
    }
</style>