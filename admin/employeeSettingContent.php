<?php
 include '../lib/Database.php';
 $db = new Database();
?>

        <div class="col-lg-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Expense Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=0;
                      $query = "SELECT * FROM `employee` WHERE workType=1";
                      $result = $db->select($query);
                      if ($result) {
                        while ($operator = $result->fetch_assoc()) {
                          $i++
                        ?>
                        <tr>
                          <th><?php echo $i; ?></th>
                          <th><?php echo $operator['username']; ?></th>
                          <th><a href="employeeSettingContentSelect.php?operator=<?=$operator['username'];?>"><b class="btn btn-primary">Setup</b></a> </th>
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


<?php include './footer.php'; ?>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
