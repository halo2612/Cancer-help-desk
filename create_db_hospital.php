<?php 
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

$name="P.d hinduja national hospital and medical research center Surya Hospital";
$email="info@hindujahospital.com";
$phonenum="912224451515";
$address="SVS Rd, Mahim West, Shivaji Park, Mumbai, Maharashtra";
$pin="400016";
$sector="Public";

$conn = OpenCon();
if($conn === false)
{
	die("ERROR: Could not connect. " . $conn->connect_error."<br>");
}
else
   echo "Connected Successfully"."<br>";

$sql="CREATE TABLE IF NOT EXISTS hospitals(
      id INT PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR(30) NOT NULL,
      email VARCHAR(70) NOT NULL UNIQUE,
      phonenum BIGINT NOT NULL,
      address VARCHAR(150) NOT NULL,
      pin INT NOT NULL,
      sec VARCHAR(30) NOT NULL
)";

if($conn->query($sql) === true)
{
    echo "Table created successfully."."<br>";
} 
else
{
	echo "ERROR: Could not able to execute $sql. " . $conn->error."<br>";
}

$sql1="INSERT INTO hospitals SET name='$name', email='$email', phonenum='$phonenum', address='$address', pin='$pin',sec='$sector'";

if($conn->query($sql1) === true)
{
	echo "Inserted into table successfully."."<br>";
}
else
{
    echo "ERROR: Could not able to execute $sql1. " . $conn->error."<br>";
}

$sql3 = "SELECT * FROM hospitals";  
$result = $conn->query($sql3);

if ($result->num_rows> 0) 
{
  while($row = $result->fetch_assoc()) 
  {
      echo "id: " . $row["id"]." ". " Name: " . $row["name"]." ". "Email: " . $row["email"]." ". "Sector: ".$row["sec"]." "."Phone number: ".$row["phonenum"]." "."Address: ".$row["address"].",".$row["pin"]."<br>";
  }
}

CloseCon($conn);

?>