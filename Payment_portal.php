<!DOCTYPE html>
<html>
<head>
	<title>
		Payment Portal
	</title>
	<script type="text/javascript">
		function action(){
			document.getElementById("show").style.visibility="visible";
		}
	</script>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<style type="text/css">
		body{
			background-color: #FFFDD0;
		}
		h1{
			color: black;
			font-family: "Trebuchet MS",sans-serif;
			font-weight: 100;
		}
		.loader {
			margin-top: -35px;
			margin-left: 875px;
  			border: 16px solid #f3f3f3;
  			border-radius: 50%;
  			border-top: 3px solid blue;
  			border-right: 3px solid green;
  			border-bottom: 3px solid red;
  			border-left: 3px solid pink;
  			width: 0.75em;
  			height: 0.75em;
  			-webkit-animation: spin 2s linear infinite;
  			animation: spin 2s linear infinite;
		}

		@-webkit-keyframes spin {
  			0% { -webkit-transform: rotate(0deg); }
  			100% { -webkit-transform: rotate(360deg); }
		}

		@keyframes spin {
  			0% { transform: rotate(0deg); }
  			100% { transform: rotate(360deg); }
		}
		div.forms{
			margin-left: 400px;
		}
		input{
			width: 40px;
		}
		div.pictures{
			margin-left: 20px;
		}
		button{
			margin-left: 100px;
		}
		div.show{
			visibility: hidden;
		}
		table, th, td {
  			border: 1px solid black;
  			border-collapse: collapse;
		}
		th, td {
			padding-bottom: -40px;
			padding-top: -40px;
  			padding-left: 75px;
  			padding-right: 75px;
		}
		#pay{
			background-color: red;
			border: none;
  			color: white;
  			padding: 16px 32px;
  			text-decoration: none;
 			margin: 15px 2px;
 			cursor: pointer;
 			width: 450px;
		}
	</style>
</head>
<body background="#FFFDD0">
	<h1 align="center">Payment Portal</h1>
	<p align="center">
	<?php
	$name=$_GET['usname'];
	$dono=$_GET['donoo'];
	echo "Establishing Connection...";
	echo "<br>";
	?></p>
	<p><div class="loader"></div></p>
	<p align="center">
	<?php
	for ($k = 0; $k < 5; $k++) {

    flush();
    ob_flush();
    sleep(1);
    if($k==3)
    {
    	echo "Connected to Server";
    	echo "<br>";
    }
    }
	?>
</p>
<br><br><br><br>
<div class="forms">
	<div class="pictures" >
		<img src="visa.jpg" height="30px" width="40px">
		<img src="paypal.png" height="30px" width="45px">
		<img src="mastercard.png" height="30px" width="45px"><br><br>
	</div>
	<form>
		<label>Card Number</label>
		<input type="number" name="card1" id="card1" placeholder="XXXX" min="1000" max="9999" required autofocus>
		<input type="number" name="card2" id="card2" placeholder="XXXX" min="1000" max="9999" required >
		<input type="number" name="card3" id="card3" placeholder="XXXX" min="1000" max="9999" required >
		<input type="number" name="card4" id="card4" placeholder="XXXX" min="1000" max="9999" required ><br><br>
		<div>
			<label>Expiry Date</label>
  			<select name="cars" id="cars">
    			<option value="Jan">Jan</option>
    			<option value="Feb">Feb</option>
    			<option value="Mar">Mar</option>
    			<option value="Apr">Apr</option>
    			<option value="May">May</option>
    			<option value="Jun">Jun</option>
    			<option value="Jul">Jul</option>
    			<option value="Aug">Aug</option>
    			<option value="Sep">Sep</option>
    			<option value="Oct">Oct</option>
    			<option value="Nov">Nov</option>
    			<option value="Dec">Dec</option>
    			<input style="margin-left: 10px; width:60px;" type="number" name="year" id="year" placeholder="20XX" min="2020">
  			</select><br><br>
  			<label style="">Name on Card:</label>
  			<input style="width: 100px;" type="text" name="name" placeholder="Name"><br>
  		</div><br>
  		</form>
  		<button onclick="action()" id="pay">Submit</button>
</div>
<div class="show" id="show" align="center">
	<h3>Thank you for your donation....</h3><br><br>
	<table>
		<tr>
			<td><p>
	<?php 
	echo "$name";
	?>
	</p></td>
	<td>
		<p>
	<?php 
	echo "$dono";
	?>
	</p>
	</td>
		</tr>
	</table>
	<br>
	<a href="http://localhost/homepage.html">Back to Homepage</a>
</div>
	
</form>
</body>
</html>
