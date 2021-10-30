<?php
session_start();
include './lib/Database.php';
$db = new Database();
?>

      <          $result = $db->select($query);
          if ($result) {
            $Profile = $result->fetch_assoc();
      ?>           
      
            <div class="containerr">
              <input type="text" class="success" value="Success" style="text-align: center;font-size: 17px; display: none;">
              <input type="text" class="failure" value="Something Error" style="text-align: center;font-size: 17px; display: none;">
              <label ><b>Username*</b></label>
              <input type="text" class="username" value="<?php echo $Profile['username']; ?>" disabled="disabled">
              <label><b>Password*</b></label>
              <input type="text"  class="password" value="<?php echo $Profile['password']; ?>">
              <label><b>Address*</b></label>
              <input type="text" class="address" value="<?php echo $Profile['address']; ?>">
              <label><b>Warehouse*</b></label>
              <input type="text" class="warehouse" value="<?php echo $Profile['warehouse']; ?>" list="warehouse">
              <datalist id="warehouse">
                <?php
                  $query = "SELECT * FROM warehouse";
                  $result = $db->select($query);
                  if($result){
                    while($resultt = $result->fetch_assoc()){
                      ?>
                        <option value="<?php echo $resultt['division'] ?>"></option>
                      <?php
                    }
                  }
                ?>
              </datalist>
              <label><b>Crop*</b></label>
              <input type="text" class="crop" value="<?php echo $Profile['cropType']; ?>">
              <label><b>Agri-Land (Percent)*</b></label>
              <input type="text" class="agriLand" value="<?php echo $Profile['agriLand']; ?>"><br><br>
              <input type="submit" class="UpdateAccount" value="Update Account">
            </div><br><br><br>

      <?php
         }
      ?>

<style type="text/css">
.UpdateAccount{
  width: 150px;
  height: 40px;
  text-align: center;
  font-weight: bold;
}
</style>
<script type="text/javascript">
$('.UpdateAccount').click(function () {
    var username = '';
    var password = $('.password').val();
    var address = $('.address').val();
    var warehouse = $('.warehouse').val();
    var cropType = $('.crop').val();
    var agriLand = $('.agriLand').val();
    $.ajax({
        method: "POST",
        url: "UpdateAccountUpdate.php",
        data: {
            username: username,
            password: password,
            address: address,
            warehouse: warehouse,
            cropType: cropType,
            agriLand: agriLand
        },
        success: function (data) {
            if(data == 'okk'){
              $('.success').show();
            }else{
              $('.failure').show();
            }
        }
    });
}); 
</script>