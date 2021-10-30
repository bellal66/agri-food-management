<?php include './header.php'; ?>
<?php include './side.php'; ?>
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
      <h5><i class="fa fa-users"></i>Employee Setting</h5>
    </div>
  </div>



<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <div id="withdrawSettingContent">
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
</main>
<script src="js/jquery.min.js"></script>
<script>
 $(document).ready(function () {
    $("#withdrawSettingContent").load('employeeSettingContent.php');
 });
</script>
