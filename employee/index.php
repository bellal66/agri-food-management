<?php include './header.php'; ?>
<?php include './side.php'; ?>
<?php
if(isset($_POST['addWholesaller'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $salary = $_POST['salary'];
    $warehouse = $_POST['warehouse'];
    $crop = $_POST['crop'];
    if ($name != '' && $password != '' && $salary != '') {

        $query = "INSERT INTO `wholesaller`(`username`,`password`,`salary`,`warehouse`,`cropId`)"
                . " VALUES ('$name','$password','$salary','$warehouse','$crop')";
        $result = $db->insert($query);
        if ($result) {
            
        }
    }
}
?>
<main class="app-content">
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-user-circle "></i>
                <div class="info">
                    <h6>Total Buying Crop Amount</h6>
                    <p>
                        <?php
                        $query = "select * from warehoue_debitprofit";
                        $TotalBalance = $db->select($query);

                        if ($TotalBalance) {
                            $TotalBalance = $TotalBalance->fetch_assoc();
                            echo round($TotalBalance['totalBuyingCrop'], 2);
                        }
                        ?>

                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-user-secret "></i>
                <div class="info">
                    <h6>Total Selling Crop Amount</h6>
                    <p>
                        <?php echo round($TotalBalance['totalSellingCrop'], 2);?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-vcard "></i>
                <div class="info">
                    <h6>Total Expense</h6>
                    <p>
                       <?php echo round($TotalBalance['totalExpense'], 2);?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-dollar fa-3x"></i>
                <div class="info">
                    <h6>Total Saveing Amount</h6>
                    <p>
                        <?php echo round($TotalBalance['totalSaveAmount'], 2);?>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="bs-component">
        <div class="card">
            <h5 class="card-header">All  Category</h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4" style="margin-bottom: 15px;">
                        <div id="add-new-number-rcv" class="modal" style=" ">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" class="form-group" method="post">
                                            <div class="form-group">
                                                <label for="phone">Wholesaller Name:</label>
                                                <input name="name" type="text" class="form-control" id="number" autofocus required="1"><br>
                                                <label for="phone">Wholesaller password:</label>
                                                <input name="password" type="text" class="form-control" id="number" autofocus required="1"><br>
                                                <label for="phone">Wholesaller salary:</label>
                                                <input name="salary" type="text" class="form-control" id="number" autofocus required="1"><br>
                                                <label for="phone">Warehouse Type:</label><br>
                                                <select name="warehouse" style="width: 100%;padding: 10px;margin: 5px 0 5px 0;display: inline-block;border:2px solid grey;border-radius:4px;background: #f1f1f1;">
                                                   <option disabled selected value>Select Warehouse</option>
                                                   <?php
                                                      $query = "SELECT * FROM workstation where employeeId='$_SESSION[adminPanel]'";
                                                      $resultwarehouse = $db->select($query);
                                                      if ($resultwarehouse) {
                                                        while ($resultwarehousee = $resultwarehouse->fetch_assoc()) {
                                                        ?>

                                                        <?php
                                                        if($resultwarehousee['Mymensingh'] == 1){
                                                        ?>
                                                        <option value="mymensingh">Mymensingh</option>
                                                        <?php 
                                                        }elseif($resultwarehousee['Dhaka'] == 1){
                                                        ?>
                                                        <option value="dhaka">Dhaka</option>
                                                        <?php 
                                                        }elseif($resultwarehousee['Rajshahi'] == 1){
                                                        ?>
                                                        <option value="rajshahi">Rajshahi</option>
                                                        <?php 
                                                        }elseif($resultwarehousee['Rangpur'] == 1){
                                                        ?>
                                                        <option value="rangpur">Rangpur</option>
                                                        <?php 
                                                        }elseif($resultwarehousee['Sylhet'] == 1){
                                                        ?>
                                                        <option value="sylhet">Sylhet</option>
                                                        <?php 
                                                        }elseif($resultwarehousee['Khulna'] == 1){
                                                        ?>
                                                        <option value="khulna">Khulna</option>
                                                        <?php 
                                                        }elseif($resultwarehousee['Chittagong'] == 1){
                                                        ?>
                                                        <option value="chittagong">Chittagong</option>
                                                        <?php 
                                                        }elseif($resultwarehousee['Barisal'] == 1){
                                                        ?>
                                                        <option value="barisal">Barisal</option>
                                                        <?php } ?>


                                                        <?php
                                                        }
                                                      }
                                                    ?>
                                                </select><br>
                                                <label for="phone">Crop Type:</label><br>
                                                <select name="crop" style="width: 100%;padding: 10px;margin: 5px 0 5px 0;display: inline-block;border:2px solid grey;border-radius:4px;background: #f1f1f1;">
                                                   <option disabled selected value>Select crop</option>
                                                   <?php
                                                      $query = "SELECT * FROM monocrop";
                                                      $resultcrop = $db->select($query);
                                                      if ($resultcrop) {
                                                        while ($resultcropp = $resultcrop->fetch_assoc()) {
                                                        ?>
                                                        <option value="<?php echo $resultcropp['id']; ?>"><?php echo $resultcropp['cropName']; ?></option>
                                                        <?php
                                                        }
                                                      }
                                                    ?>
                                                </select><br><br>
                                            </div>

                                            <button name="addWholesaller" type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="bs-component">
                            <div class="list-group">
                                <li class="list-group-item list-group-item-action "><h6>Add Wholesaller</h6></li>
                                <?php
                                $query = "SELECT * FROM wholesaller";
                                $result = $db->select($query);
                                if ($result) {
                                    while ($resultt = $result->fetch_assoc()) {

                                        ?>
                                        <li class="list-group-item list-group-item-action" ><?php echo $resultt['username']; ?> <a href="indexActionSection.php?wholesallerDelete=<?php echo $resultt['id']; ?>" onclick="return confirm('are you sure ?')"class=" btn btn-sm btn-info pull-right">delete</a></li>

                                        <?php
                                    }
                                }
                                ?>
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#add-new-number-rcv">Add new</a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-footer text-muted"></div>
        </div>
    </div>
</main>
<?php include './footer.php' ?>
<script type="text/javascript">
    $('#clubMember').DataTable();

</script>