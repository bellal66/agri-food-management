<?php include './header.php'; ?>

<div class="contact-page">
    <div class="contact-detail">
    	<span class="fa fa-phone"></span> Phone: 02-6682257<br>
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;02-6682257<br>
    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;02-6682257<br><br>
        <span class="fa fa-mobile"></span> Mobile: 123456789<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456789<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456789<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;123456789<br><br>
        <span class="fa fa-envelope-o"></span> Email: mymensingh@gmail.com
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mymensingh@gmail.com<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mymensingh@gmail.com<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mymensingh@gmail.com<br>
    </div>
    <div class="contact-map">
    	<div class="map-bd" id="map-bd">
    		<script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map-bd'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 3
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk&callback=initMap"
    async defer></script>
    	</div>
    </div>
</div>
<style type="text/css">
    .contact-page{
    	margin-top: 10px;
    	margin-left: 5%;
    	width: 90%;
    	background: white; 
    	clear: both;
    	height: 600px;
    }
	.contact-detail{
		margin-left: 5%;
		padding-top: 50px;
		width: 30%;
		font-size: 18px;
		float: left;
	}
	.contact-map{
		margin-left: 30%;
	}
	.map-bd{
		padding-top: 5.2%;
		width: 800px;
		height: 500px;
		border: 1px solid #eee;
	}
</style>