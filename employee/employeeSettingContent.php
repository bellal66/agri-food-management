<?php
session_start();
 include '../lib/Database.php';
 $db = new Database();
?>
<?php
                $query = "SELECT * FROM `employee` ";
                $result = $db->select($query);
                if ($result) {
                while ($operator = $result->fetch_assoc()) {

              ?>

            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
              <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="">
                  <h4>
                  	<a role="button" data-toggle="collapse" data-parent="#accordion" href="" aria-expanded="true" aria-controls="">

                  	  <?php echo $operator['username']; ?>
                              &nbsp;&nbsp;                        
                        <a href="employeeSettingContentSelect.php?operator=<?=$operator['username'];?>"><b class="btn btn-primary">Setup</b></a> 

                      <hr>

                  	</a>
                  </h4>
                </div>
              </div>
            </div>

               <?php
                  }
                 }
               ?>

