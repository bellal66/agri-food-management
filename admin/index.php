<?php include './header.php'; ?>
<?php include './side.php'; ?>
<?php
if (isset($_POST['addWarehouse'])) {
    $name = $_POST['name'];
    $division = $_POST['division'];
    if ($name != '') {

        $query = "INSERT INTO `warehouse`(`name`,`division`)"
                . " VALUES ('$name','$division')";
        $result = $db->insert($query);
        if ($result) {
            
        }
    }
}else if(isset($_POST['addEmployee'])){
    $name = $_POST['name'];
    $password = $_POST['password'];
    $salary = $_POST['salary'];
    $workType = $_POST['workType'];
    if ($name != '' && $password != '' && $salary != '') {

        $query = "INSERT INTO `employee`(`username`,`password`,`salary`,`workType`)"
                . " VALUES ('$name','$password','$salary','$workType')";
        $result = $db->insert($query);
        $query = "INSERT INTO `workstation`(`name`)"
                . " VALUES ('$name')";
        $result = $db->insert($query);
        if ($result) {
            
        }
    }
}else if(isset($_POST['addCrop'])){
    $name = $_POST['name'];
    $division = $_POST['division'];
    if ($name != '') {

        $query = "INSERT INTO `monocrop`(`cropName`,`areaForFamous`)"
                . " VALUES ('$name','$division')";
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
                        $query = "select * from debitprofit";
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
            <div class="widget-small info coloured-icon"><i class="icon fa fa-vcard "></i>
                <div class="info">
                    <h6>Total Export</h6>
                    <p>
                       <?php echo round($TotalBalance['totalExport'], 2);?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-vcard "></i>
                <div class="info">
                    <h6>Total Import</h6>
                    <p>
                       <?php echo round($TotalBalance['totalImport'], 2);?>
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
                        <div id="add-new-number" class="modal" style=" ">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" class="form-group" method="post">
                                            <div class="form-group">
                                                <label for="phone">Warehouse Name:</label>
                                                <input name="name" type="text" class="form-control" id="number" autofocus required="1"><br>
                                                <label for="phone">Select Division:</label><br>
                                                <select name="division" style="width: 100%;padding: 10px;margin: 5px 0 5px 0;display: inline-block;border:2px solid grey;border-radius:4px;background: #f1f1f1;">
                                                   <option disabled selected value>Select method</option>
                                                   <option value="dhaka">Dhaka</option>
                                                   <option value="mymensingh">Mymensingh</option>
                                                   <option value="rajshahi">Rajshahi</option>
                                                   <option value="rangpur">Rangpur</option>
                                                   <option value="sylhet">Sylhet</option>
                                                   <option value="khulna">Khulna</option>
                                                   <option value="chittagong">Chittagong</option>
                                                   <option value="barisal">Barisal</option>
                                                    
                                                </select><br>
                                            </div>

                                            <button name="addWarehouse" type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="bs-component">
                            <div class="list-group">
                                <li class="list-group-item list-group-item-action "><h6>Add Warehouse</h6></li>
                                <?php
                                $query = "SELECT * FROM warehouse LIMIT 5";
                                $result = $db->select($query);
                                if ($result) {
                                    while ($resultt = $result->fetch_assoc()) {

                                        ?>
                                        <li class="list-group-item list-group-item-action" ><?php echo $resultt['name']; ?><a href="indexActionSection.php?warehouseDelete=<?php echo $resultt['id']; ?>" onclick="return confirm('are you sure ?')"class=" btn btn-sm btn-info pull-right">delete</a></li>

                                        <?php
                                    }
                                }
                                ?>
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#add-new-number">Add new</a>

                            </div>
                        </div>
                    </div>
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
                                                <label for="phone">Employee Name:</label>
                                                <input name="name" type="text" class="form-control" id="number" autofocus required="1"><br>
                                                <label for="phone">Warehousen password:</label>
                                                <input name="password" type="text" class="form-control" id="number" autofocus required="1"><br>
                                                <label for="phone">Warehousen salary:</label>
                                                <input name="salary" type="text" class="form-control" id="number" autofocus required="1"><br>
                                                <label for="phone">Work Type:</label><br>
                                                <select name="workType" style="width: 100%;padding: 10px;margin: 5px 0 5px 0;display: inline-block;border:2px solid grey;border-radius:4px;background: #f1f1f1;">
                                                   <option disabled selected value>Select method</option>
                                                   <option value="1">Warehouse</option>
                                                   <option value="2">Agri assist</option>
                                                </select><br><br>
                                            </div>

                                            <button name="addEmployee" type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="bs-component">
                            <div class="list-group">
                                <li class="list-group-item list-group-item-action "><h6>Add Employee</h6></li>
                                <?php
                                $query = "SELECT * FROM employee LIMIT 5";
                                $result = $db->select($query);
                                if ($result) {
                                    while ($resultt = $result->fetch_assoc()) {

                                        ?>
                                        <li class="list-group-item list-group-item-action" ><?php echo $resultt['username']; ?> (<?php if($resultt['workType']==1){echo "Warehouse";}else{echo "Assistant";} ?>)<a href="indexActionSection.php?employeeDelete=<?php echo $resultt['id']; ?>" onclick="return confirm('are you sure ?')"class=" btn btn-sm btn-info pull-right">delete</a></li>

                                        <?php
                                    }
                                }
                                ?>
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#add-new-number-rcv">Add new</a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="margin-bottom: 15px;">
                        <div id="add-new-number-method" class="modal" style=" ">
                            <div class="modal-dialog modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="" class="form-group" method="post">
                                            <div class="form-group">
                                                <label for="phone">Crop Name:</label>
                                                <input name="name" type="text" class="form-control" id="number" autofocus required="1"><br>
                                                <label for="phone">Crop Division:</label><br>
                                                <select name="division" style="width: 100%;padding: 10px;margin: 5px 0 5px 0;display: inline-block;border:2px solid grey;border-radius:4px;background: #f1f1f1;">
                                                   <option disabled selected value>Select method</option>
                                                   <option value="dhaka">Dhaka</option>
                                                   <option value="mymensingh">Mymensingh</option>
                                                   <option value="rajshahi">Rajshahi</option>
                                                   <option value="rangpur">Rangpur</option>
                                                   <option value="sylhet">Sylhet</option>
                                                   <option value="khulna">Khulna</option>
                                                   <option value="chittagong">Chittagong</option>
                                                   <option value="barisal">Barisal</option>
                                                    
                                                </select><br>
                                            </div>

                                            <button name="addCrop"type="submit" class="btn btn-info">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bs-component">
                            <div class="list-group">
                                <li class="list-group-item list-group-item-action "><h6>Add Crop</h6></li>
                                <?php
                                $query = "SELECT * FROM monocrop LIMIT 5";
                                $result = $db->select($query);
                                if ($result) {
                                    while ($resultt = $result->fetch_assoc()) {

                                        ?>
                                        <li class="list-group-item list-group-item-action" ><?php echo $resultt['cropName']; ?> (<?php echo $resultt['areaForFamous']; ?>)<a href="indexActionSection.php?cropDelete=<?php echo $resultt['id']; ?>" onclick="return confirm('are you sure ?')"class=" btn btn-sm btn-info pull-right">delete</a></li>

                                        <?php
                                    }
                                }
                                ?>
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#add-new-number-method">Add new</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer text-muted"></div>
        </div>
    </div>
</main>
<?php include './footer.php'; ?>
<script type="text/javascript">
    $('#clubMember').DataTable();

</script>