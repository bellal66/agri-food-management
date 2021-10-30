<?php include './header.php'; ?>
<?php include './side.php'; ?>
<?php
 $operator='';
 if(isset($_GET["operator"]))
  {
    $operator = (string)$_GET["operator"];
  } 
?>
<style type="text/css">
.container {
           display: block;
           position: relative;
           padding-left: 35px;
           margin-bottom: 12px;
           cursor: pointer;
           -webkit-user-select: none;
           -moz-user-select: none;
           -ms-user-select: none;
           user-select: none;
          }
         .container input {
           position: absolute;
           opacity: 0;
           cursor: pointer;
           height: 0;
           width: 0;
          }
          .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
           }
           .container:hover input ~ .checkmark {
            background-color: #ccc;
            }
           .container input:checked ~ .checkmark {
            background-color: #2196F3;
            }
           .checkmark:after {
             content: "";
             position: absolute;
             display: none;
             }
            .container input:checked ~ .checkmark:after {
             display: block;
              }
            .container .checkmark:after {
              left: 9px;
               top: 5px;
               width: 5px;
               height: 10px;
               border: solid white;
               border-width: 0 3px 3px 0;
               -webkit-transform: rotate(45deg);
               -ms-transform: rotate(45deg);
               transform: rotate(45deg);
               }
               ul{
                list-style: none;
               }
</style>
<main class="app-content">
  <div class="app-title">
    <div>
      <h5><i class="fa fa-users"></i> Employee: <span style="color: red;"><?php echo $operator ?></span> </h5>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">

              <?php
                $i=0;
                $query = "SELECT * FROM `warehouse` ";
                $result = $db->select($query);
                if ($result) {
                while ($resultt = $result->fetch_assoc()) {
                  
                  $query="SELECT * FROM workstation WHERE employeeId='$operator'";
                  $warehouseActivee = $db->select($query);
                  $warehouseActivee = $warehouseActivee->fetch_assoc();
                  $i++;

              ?>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="">
                  <h4>
                  	<a role="button" data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="true" aria-controls="">

                      <?php
                        if($resultt['division'] == 'mymensingh'){
                          ?>
                          <?php echo $i; ?>
                          &nbsp;&nbsp;
                          <?php echo $resultt['name']; ?>
                          &nbsp;&nbsp;

                          <?php
                            if ($warehouseActivee['Mymensingh'] == 1) {
                              ?>                                                                                                          
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-primary  btn-sm mymensinghSelectInactive"  value="Inactive">

                              <?php
                                } else {
                              ?>                                             
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-danger  btn-sm mymensinghSelectActive"  value="Active">

                              <?php
                              }
                              ?>
                              <hr>
                        <?php
                          }
                      ?>
                      <?php
                        if($resultt['division'] == 'dhaka'){
                          ?>
                          <?php echo $i; ?>
                          &nbsp;&nbsp;
                          <?php echo $resultt['name']; ?>
                          &nbsp;&nbsp;

                          <?php
                            if ($warehouseActivee['Dhaka'] == 1) {
                              ?>                                                                                                          
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-primary  btn-sm dhakaSelectInactive"  value="Inactive">

                              <?php
                                } else {
                              ?>                                             
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-danger  btn-sm dhakaSelectActive"  value="Active">

                              <?php
                              }
                              ?>
                              <hr>
                        <?php
                          }
                      ?>
                      <?php
                        if($resultt['division'] == 'rajshahi'){
                          ?>
                          <?php echo $i; ?>
                          &nbsp;&nbsp;
                          <?php echo $resultt['name']; ?>
                          &nbsp;&nbsp;

                          <?php
                            if ($warehouseActivee['Rajshahi'] == 1) {
                              ?>                                                                                                          
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-primary  btn-sm rajshahiSelectInactive"  value="Inactive">

                              <?php
                                } else {
                              ?>                                             
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-danger  btn-sm rajshahiSelectActive"  value="Active">

                              <?php
                              }
                              ?>
                              <hr>
                        <?php
                          }
                      ?>
                      <?php
                        if($resultt['division'] == 'rangpur'){
                          ?>
                          <?php echo $i; ?>
                          &nbsp;&nbsp;
                          <?php echo $resultt['name']; ?>
                          &nbsp;&nbsp;

                          <?php
                            if ($warehouseActivee['Rangpur'] == 1) {
                              ?>                                                                                                          
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-primary  btn-sm rangpurSelectInactive"  value="Inactive">

                              <?php
                                } else {
                              ?>                                             
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-danger  btn-sm rangpurSelectActive"  value="Active">

                              <?php
                              }
                              ?>
                              <hr>
                        <?php
                          }
                      ?>
                      <?php
                        if($resultt['division'] == 'sylhet'){
                          ?>
                          <?php echo $i; ?>
                          &nbsp;&nbsp;
                          <?php echo $resultt['name']; ?>
                          &nbsp;&nbsp;

                          <?php
                            if ($warehouseActivee['Sylhet'] == 1) {
                              ?>                                                                                                          
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-primary  btn-sm sylhetSelectInactive"  value="Inactive">

                              <?php
                                } else {
                              ?>                                             
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-danger  btn-sm sylhetSelectActive"  value="Active">

                              <?php
                              }
                              ?>
                              <hr>
                        <?php
                          }
                      ?>
                      <?php
                        if($resultt['division'] == 'khulna'){
                          ?>
                          <?php echo $i; ?>
                          &nbsp;&nbsp;
                          <?php echo $resultt['name']; ?>
                          &nbsp;&nbsp;

                          <?php
                            if ($warehouseActivee['Khulna'] == 1) {
                              ?>                                                                                                          
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-primary  btn-sm khulnaSelectInactive"  value="Inactive">

                              <?php
                                } else {
                              ?>                                             
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-danger  btn-sm khulnaSelectActive"  value="Active">

                              <?php
                              }
                              ?>
                              <hr>
                        <?php
                          }
                      ?>
                      <?php
                        if($resultt['division'] == 'barisal'){
                          ?>
                          <?php echo $i; ?>
                          &nbsp;&nbsp;
                          <?php echo $resultt['name']; ?>
                          &nbsp;&nbsp;

                          <?php
                            if ($warehouseActivee['Barisal'] == 1) {
                              ?>                                                                                                          
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-primary  btn-sm barisalSelectInactive"  value="Inactive">

                              <?php
                                } else {
                              ?>                                             
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-danger  btn-sm barisalSelectActive"  value="Active">

                              <?php
                              }
                              ?>
                              <hr>
                        <?php
                          }
                      ?>
                      <?php
                        if($resultt['division'] == 'chittagong'){
                          ?>
                          <?php echo $i; ?>
                          &nbsp;&nbsp;
                          <?php echo $resultt['name']; ?>
                          &nbsp;&nbsp;

                          <?php
                            if ($warehouseActivee['Chittagong'] == 1) {
                              ?>                                                                                                          
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-primary  btn-sm chittagongSelectInactive"  value="Inactive">

                              <?php
                                } else {
                              ?>                                             
                              <input type="submit" id="<?php echo $warehouseActivee['id'] ?>" class="btn btn-danger  btn-sm chittagongSelectActive"  value="Active">

                              <?php
                              }
                              ?>
                              <hr>
                        <?php
                          }
                      ?>
                      
                  	</a>
                  </h4>
                </div>
              </div>
            </div>

               <?php
                  }
                 }
               ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include './footer.php'; ?>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/employeeSettingContentSelect.js"></script>
