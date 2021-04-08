<?php
if(isset($_POST["register"]))
{
  $name=$_POST["name"];
  $email=$_POST["email"];
  $phonenum=$_POST["phonenum"];
  $address=$_POST["address"];
  $city=$_POST["city"];
  $pin=$_POST["pin"];
  $ppl=$_POST["ppl"];
  $pass=$_POST["pass"];
  $toh=array($_POST["toh1"],$_POST["toh2"],$_POST["toh3"],$_POST["toh4"]);
  $toh=implode(",", $toh);

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
  else
   echo "Connected Successfully"."<br>";


  $sql = "CREATE TABLE IF NOT EXISTS patients(
      id INT PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR(30) NOT NULL,
      email VARCHAR(70) NOT NULL UNIQUE,
      phonenum BIGINT NOT NULL UNIQUE,
      address VARCHAR(150) NOT NULL,
      city VARCHAR(20) NOT NULL,
      pin INT NOT NULL,
      ppl INT NOT NULL,
      pass VARCHAR(70) NOT NULL,
      toh VARCHAR(20) NOT NULL
  )";

  if($conn->query($sql) === true)
  {
    echo "Table created successfully."."<br>";
  } 
  else
  {
    echo "ERROR: Could not able to execute $sql. " . $conn->error."<br>";
  }

  $sql1="INSERT INTO patients SET name='$name', email='$email', phonenum='$phonenum', address='$address', city='$city', pin='$pin', ppl='$ppl',pass='$pass', toh='$toh'";

  if($conn->query($sql1) === true)
  {
    echo "Inserted into table successfully."."<br>";
  }
  else
  {
    echo "ERROR: Could not able to execute $sql1. " . $conn->error."<br>";
  }

  $sql4="SELECT * FROM patients WHERE phonenum='$phonenum'";
  $result2=$conn->query($sql4);

  if ($result2->num_rows>0)
  {
    while($row=$result2->fetch_assoc())
    {
      $patient=explode(",", $row["toh"]);
    }
  }

  CloseCon($conn);

  header("Location: http://localhost/login.html");
  exit();

  /*$sql5="SELECT * FROM ngos";
  $result3=$conn->query($sql5);

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
         echo "id: " . $row["id"]." ". " Name: " . $row["name"]." ". "Email: " . $row["email"]." ". "Services provided: ".$row["tohp"]." "."Phone number: ".$row["phonenum"]." "."Address: ".$row["address"].",".$row["pin"]."<br>";
      }
    }
  }*/
}

?>