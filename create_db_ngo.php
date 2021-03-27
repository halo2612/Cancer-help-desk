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

$name="ngo10";
$email="ngo10@gmail.com";
$phonenum="10";
$address="street 10";
$pin="1010";
$tohp=array(0,1,1,1);
$tohp=implode(",", $tohp);

$conn = OpenCon();
if($conn === false)
{
	die("ERROR: Could not connect. " . $conn->connect_error."<br>");
}
else
   echo "Connected Successfully"."<br>";

$sql="CREATE TABLE IF NOT EXISTS ngos(
      id INT PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR(30) NOT NULL,
      email VARCHAR(70) NOT NULL UNIQUE,
      phonenum INT NOT NULL,
      address VARCHAR(150) NOT NULL,
      pin INT NOT NULL,
      tohp VARCHAR(200) NOT NULL
)";

if($conn->query($sql) === true)
{
    echo "Table created successfully."."<br>";
} 
else
{
	echo "ERROR: Could not able to execute $sql. " . $conn->error."<br>";
}

$sql1="INSERT INTO ngos SET name='$name', email='$email', phonenum='$phonenum', address='$address', pin='$pin', tohp='$tohp'";

if($conn->query($sql1) === true)
{
	echo "Inserted into table successfully."."<br>";
}
else
{
    echo "ERROR: Could not able to execute $sql1. " . $conn->error."<br>";
}

$sql3 = "SELECT * FROM ngos";  
$result = $conn->query($sql3);

if ($result->num_rows> 0) 
{
  while($row = $result->fetch_assoc()) 
  {
      echo "id: " . $row["id"]." ". " Name: " . $row["name"]." ". "Email: " . $row["email"]." ". "Services provided: ".$row["tohp"]." "."Phone number: ".$row["phonenum"]." "."Address: ".$row["address"].",".$row["pin"]."<br>";
      // $ngo=explode(",", $row["tohp"]);
  }
}



// print_r($ngo);

CloseCon($conn);

?>