<?php 
function OpenCon()
{
  $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "chd";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
     
    return $conn;
}
   
function CloseCon($conn)
{
    $conn -> close();
}

$name="Global Cancer Concern India";
$email="ho@gcci.org.in";
$phonenum="911242564473";
$address="A-404 Konark Orchid, Kesnand Rd, Wagholi, Pune, Maharashtra";
$pin="412207";
$tohp=array(1,1,1,1);
$tohp=implode(",", $tohp);
$location="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3781.9978692268924!2d73.99325251744384!3d18.574134799999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c36fd032b11b%3A0x3f4108291a758ed7!2sGlobal%20Cancer%20Concern%20India!5e0!3m2!1sen!2sin!4v1617604680201!5m2!1sen!2sin";

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
      phonenum BIGINT NOT NULL,
      address VARCHAR(150) NOT NULL,
      pin INT NOT NULL,
      tohp VARCHAR(200) NOT NULL,
      loc VARCHAR(8000) NOT NULL
)";

if($conn->query($sql) === true)
{
    echo "Table created successfully."."<br>";
} 
else
{
  echo "ERROR: Could not able to execute $sql. " . $conn->error."<br>";
}

$sql1="INSERT INTO ngos SET name='$name', email='$email', phonenum='$phonenum', address='$address', pin='$pin', tohp='$tohp', loc='$location'";

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

      /*echo "<iframe src=".$row["loc"]." width='600' height='450' style='border:0;' loading='lazy'></iframe>";*/
  }
}



CloseCon($conn);

?>

