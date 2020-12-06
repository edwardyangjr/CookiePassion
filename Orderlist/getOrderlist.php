<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "cookiepassion";

$conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//else{ echo "connect success"; }

//".$_SESSION['uname']."
$name = $_POST['uname'];
//$name= "admin" ;

$u_orderId ="SELECT orderId from userorder where username='".$name."'";    
$d_orderId ="SELECT * FROM `orderdetail` WHERE orderId IN (".$u_orderId.")"; 

$d_result = mysqli_query($conn, $d_orderId);
while($row = mysqli_fetch_array($d_result,MYSQLI_ASSOC)){
  $myArray[]=$row;
}

echo json_encode($myArray);

mysqli_close($conn);
?>







