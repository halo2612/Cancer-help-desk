<?php
if(isset($_POST["submit"]))
{
  
  $phonenum=$_POST["phonenum"];
  $pass=$_POST["pass"];

  function OpenCon()
  {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "CHD";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
     
    return $conn;
  }
   
  function CloseCon($conn)
  {
    $conn -> close();
  }

  $conn = OpenCon();
  if($conn === false)
  {
    die("ERROR: Could not connect. " . $conn->connect_error."<br>");
  }
  /*else
  	echo "Connected Successfully"."<br>";*/

  $sql1="SELECT * FROM patients where phonenum='$phonenum'";
  $result=$conn->query($sql1);

  if($conn->query($sql1)==true)
  {
  	while($row=$result->fetch_assoc())
  	{
  		if($pass==$row["pass"])
  		{
  			session_start();
			$_SESSION['username']=$phonenum;
			
			$sql4="SELECT * FROM patients WHERE phonenum='$phonenum'";
  			$result2=$conn->query($sql4);

			if ($result2->num_rows>0)
			{
			  while($row=$result2->fetch_assoc())
			  {
			    $patient=explode(",", $row["toh"]);
			  }
			}

			$sql5="SELECT * FROM ngos";
  			$result3=$conn->query($sql5);

  			echo "<table>
  			<tr>
  			<th>SR NO</th>
  			<th>NGO</th>
  			</tr>";

  			if ($result3->num_rows>0) 
  			{
    			while($row=$result3->fetch_assoc())
    			{
    		  		$flag=1;
      				$ngo=explode(",", $row["tohp"]);
      				for ($i=0; $i <count($patient) ; $i++) 
      				{ 
        				if($patient[$i]==1)
        				{
          					if($ngo[$i]==0)
          					{
            					$flag=0;
          					}
        				}
      				}
      				if($flag==1)
     				{
        				echo "<tr>";
        				echo "<td>".$row["id"]."</td>";
        				echo "<td>"."Name: ".$row["name"]."<br>"."Email: ".$row["email"]."<br>"."Services provided: ".$row["tohp"]."<br>"."Phone number: ".$row["phonenum"]."<br>"."Address: ".$row["address"].",".$row["pin"]."</td>";
      				}
    			}
  			}
  		}
  		else
  			echo "Invalid Password";

  		echo "</table>";
  	}
  }
  else
  	echo "Phone number not found in database";

  CloseCon($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="CH" content="html/css">
	<title>
		Cancer Help Desk
	</title>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
	<style>
		table{
			position: ;
			top: 90vh;
			left: 5vw;
			text-align: center;
			vertical-align: center;
		}
		.body{
			overflow-x: hidden;
			margin-top: 0vh;
			margin-left: 0vw;
			margin-right: 0vw;
			margin-bottom: 0vh;
			background-color: #FFFDD0;
		}
		.header{
			position: relative;
			top: 0vh;
			left: 0vw;
			right: 0vw;
			margin-top: 0vh;
			margin-left: 0vw;
			margin-right: 0vw;
			margin-bottom: 0vh;
			width: 100vw;
			height: 37vh;
		}
		#name{
			position: absolute;
			top: 12vh;
			left: 9vw;
			color: black;
			font-size: 10vh;
			font-family: "Trebuchet MS",sans-serif;
			font-weight: 100;
		}
		#motto{
			position: absolute;
			top: 24vh;
			left: 11.7vw;
			color: black;
			font-size: 2vh;
			font-family: "Trebuchet MS",sans-serif;
			font-weight: 100;
			font-style: italic;
		}
		#span{
			color: blue;
		}
		#logo{
			position: absolute;
			top: 0vh;
			left: 1vw;
			width: 9%;
			height: 100%;
		}
		.nav{
			position: absolute;
			right: 0vw;
			top: 0vh;
			color: black;
			text-align: center;
			font-family: monospace;
			font-size: 3vh;
			padding: 7vw;
		}
		.headerlinks:link,.headerlinks:visited{
			color: black;
			text-decoration: none;
			padding: 1vw;
		}
		.headerlinks:hover{
			color: blue;
			text-decoration: none;
		}
		.headerlinks:active{
			color: blue;
			text-decoration: none;
			padding: 1vw;
		}
		#currentpage{
			color: black;
			text-decoration: none;
			border-bottom: solid .2vw;
			border-bottom-color: #FF1493;
			padding: 1vw;
		}
		#currentpage:active{
			color: #FF1493;
			text-decoration: none;
			padding: 1vw;
		}
		#donate{
			color: white;
			text-decoration: none;
			padding: 1vw;
			background-color: blue;
			border: solid blue .1vw;
		}
		.section1{
			position: relative;
			top: 0vh;
			right: 0vw;
			left: 0vw;
			width: 100vw;
			height: 200vh;
			margin-top: 0vh;
			margin-left: 0vw;
			margin-right: 0vw;
			margin-bottom: 0vh;
		}
		#heading1{
			position: absolute;
			top: 0vh;
			width: 100vw;
			height: 20vh;
			color: black;
			font-size: 6vh;
			font-family: "Times New Roman",monospace;
			font-style: italic;
			font-weight:200;
			text-align: center;
		}
		#subheading1{
			position: absolute;
			top: 5vw;
			left: 0vw;
			width: 100vw;
			height: 5vh;
			color: black;
			font-size: 3vh;
			font-family: "Times New Roman",monospace;
			font-weight:200;
			text-align: center;
		}
		.info{
			position: absolute;
			font-size: 3vh;
			top: 18vh;
			left: 8vw;
			right: 0vw;
			color: black;
			margin: 0vw;
			width: 100vw;
			height: 90vh;
		}
		#infodetails{
			position: absolute;
			top: 15vh;
			left: 5vw;
			text-align: left;
			letter-spacing: 0.001vw;
			font-size: 7vh;
			font-family: "source sans pro",sans-serif;
			font-weight: 300;
			width: 45vw;
		}
		#infoheadingunderline{
			position: absolute;
			top: 10vh;
			left: 0vw;
			width: 21vw;
			height: 0.4vh;
			background-color: #ec008c;
		}
		#infomessage{
			left: 10vw;
			text-align: left;
			letter-spacing: 0.001vw;
			font-size: 7vh;
			font-family: "source sans pro",sans-serif;
			font-weight: 300;
		}
		.footer{
			position: relative;
			top: 0vh;
			left: 0vw;
			right: 0vw;
			width: 100vw;
		}
		#footing{
			position: absolute;
			top: 2vh;
			left: 47vw;
			text-align: center;
			font-size: 1vw;
			font-family: monospace;
		}
		#twitterlink{
			position: absolute;
			top: 1.5vh;
			left: 6vw;
			width: 40%;
			height: 100%;
		}
		#instalink{
			position: absolute;
			top: 1.5vh;
			left: 8vw;
			width: 40%;
			height: 100%;
		}
		.horizontalline1{
			top: 0vh;
			display:block;
    		border:none;
    		color: #FFFDD0;
    		height:1px;
    		background: blue;
    		background: -webkit-gradient(radial, 50% 50%, 0, 50% 50%, 350, from(#FF1493), to(#FFFDD0));
		}
		.horizontalline2{
			top: 2vh;
			display:block;
    		border:none;
    		color: #FFFDD0;
    		height:1px;
    		background: blue;
    		background: -webkit-gradient(radial, 50% 50%, 0, 50% 50%, 350, from(#FF1493), to(#FFFDD0));
		}
		footer{
			background-color:#484848;
			color: white;
			font-size: 10px;
			width: 100vw;
		}
		footer div.rig{
			float: right;
			margin-left: 0px;
			margin-right: 45px;
		}
		footer div{
			margin-left: 45px;
		}
	</style>
</head>
<body class="body">
	<header class="header">
		<img src="logo.png" alt="LOGO" id="logo">
		<div id="name">
			Help <span id="span">Desk</span>
		</div>
		<div id="motto">
			Guidance. Assistance. Assurance.
		</div>
		<nav class="nav">
			<a href="Homepage.html" title="main page" id="currentpage">HOME</a>
			<a href="mailto:adityadev2612@gmail.com" class="headerlinks">CONTACT US</a>
			<a href="Donate.html" title="Donate to our cause" id="donate">DONATE?</a>
		</nav>
	</header>
	<section class="section1">
		<hr class="horizontalline1">
		<div id="heading1">
			"Once you choose hope, anything is possible."
			<span id="subheading1">-Christopher Reeve, actor, director and activist.</span> 
		</div>
		<article class="info">
			<aside>
				<p>
					Based on your selections, here are a few options which we think are best suited for you.
				</p>
			</aside>
		</article>
	</section>

	<footer>
		<div class="rig">
			<br>© 2020 HELP DESK India
		</div>
		<div>
		<br><b>Disclaimer:</b> Please note that the products mentioned are to illustrate activities and the change that your donation can make to the lives of cancer patients.<br> Help Desk, based on the need on the ground, will allocate resources to areas that need funds the most.<br><br>Data Security: We take utmost precautions with your data, we will never share your information. We also do not store any sensitive information like your credit card or bank details.	
		</div>
	</footer>
</body>
</html>