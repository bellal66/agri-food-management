<?php 
session_start();
include './lib/Database.php';
$db = new Database();
?>
<br><br>
<div class="tile">
    <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Farmer Name</th>
                        <th>Amount(tk)</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=0;
                        $query = "SELECT * FROM warehousedetail WHERE farmer='$_COOKIE[username]' ORDER BY id DESC";
                        $result = $db->select($query);
                        if($result){
                            while($resultRow = $result->fetch_assoc()){
                                $i++;
                                ?>
                                <tr>
                                    <th><?php echo $i; ?></th>
                                    <th>
                                        <a class="cropSellDetail" href="cropSellDetail.php?id=<?=$resultRow['id']?>" style="font-size: 17px;">
                                            <u><?php echo $resultRow['farmer']; ?></u>
                                        </a>
                                    </th>
                                    <th><?php echo $resultRow['debit']; ?></th>
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
                    

<script src="js/jquery.min.js"></script>
<style type="text/css">
tbody tr th{
        font-weight: normal;
}
body{
    margin: 0;
    left: 0;
    top: 0;
    background-color: #eee;
}
.main-header{
    height: 90px;
    width: 100%;
    background: white;
}
.header-title{
    font-size: 30px;
    margin-left: 140px;
    padding-top: 25px;
}
.header-title-logo{
}
.header-option {
    float: right;
    margin-right: 80px;
    margin-top: -30px;
}
.header-option li{
    float: left;
    margin-left: 50px;
    list-style: none;
    font-size: 17px;
}
.active{
    color: green;
}
.monocrop-detail{
    margin-top: 25%;
    width: 100%;
}
.monocrop-list{
    margin-left: 10%;
}
.monocrop-list-one{
    height: 200px;
    width: 200px;
    float: left;
}
.monocrop-name{
    margin-top: -230px;
    margin-left: 55%;
    height: 60px;
    width: 60px;
    border-radius: 50%;
    background: #989898;
    font-weight: bold;
    text-align: center;
    float: left;
}
.monocrop-body{
    height: 200px;
    width: 200px;
    background: white;
    float: left;
}
.monocrop-body-detail{
    padding-top: 15px;
    margin-left: 10px;
}
a{
    text-decoration: none;
    color: black;
}
.assistance-header{
    margin-left: 5%;
    margin-top: 20px;
    width: 90%;
    height: auto;
    background: white;
}
.assistance-header-option{
    margin-left: 20px;
    padding-top: 20px;
    clear: both;
    font-size: 17px;
}
.assistance{
    float: left;
    margin-left: 10px;
    width: 130px;
    height: 40px;
    text-align: center;
    margin-top: 5px;
    padding-top: 15px;
    cursor: pointer;
}
.assistance-show{
    border-left: 1px solid black;
    border-right: 1px solid black;
    border-top: 1px solid black;
    background: #eee;
}
.assistance-header-option-detail{
    clear: both;
    margin-left: 30px;
    width: 90%;
    border-top: 1px solid #c2c2c2;
}
.assistance-header-option-detail2{
    clear: both;
    margin-left: 30px;
    width: 90%;
    border-top: 1px solid #c2c2c2;
    display: none;
}
.direct-contact-name{
    margin-left: 10%;
    width: 20%;
    float: left;
    font-size: 17px;
}
.direct-contact-box{
    height:  auto;
    margin-top: 30px;
    border-bottom: 1px solid #eee;
}
.direct-contact-detail{
    margin-left: 30%;
    font-size: 17px;
}
.monocrop-search{
    width: 100%;
    background: white;
}
.monocrop-search-bar{
    margin-left: 10%;
    padding-top: 50px;
    float: left;
}
.monocrop-search-detail{
    margin-left: 50%;
    padding-top: 30px;
}
.table {
  width: 100%;
  max-width: 100%;
  margin-bottom: 1rem;
  background-color: transparent;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
  border-top: 2px solid #dee2e6;
}

.table .table {
  background-color: #FFF;
}

.table-bordered {
  border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
  border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
  border-bottom-width: 2px;
}

.table-responsive {
  display: block;
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar;
}

.table-responsive > .table-bordered {
  border: 0;
}
</style>
