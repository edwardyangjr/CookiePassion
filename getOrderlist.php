<?php

if (session_status() == PHP_SESSION_NONE) { // initialize session to retain shopping cart info
  session_start();
}
$_SESSION["isMember"] = true;
//".$_SESSION['uname']."
//$name = $_POST['uname'];
$name= $_SESSION["userName"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cookiepassion";

$conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//else{ echo "connect success"; }

// here change last line "$name" to SESSION[username]
$all="SELECT userorder.orderTime, orderdetail.amount,userorder.orderId,userorder.total, orderdetail.id, cookie.name, cookie.description, cookie.price, cookie.imageLocation FROM userorder INNER JOIN orderdetail ON userorder.orderId = orderdetail.orderId INNER JOIN cookie ON orderdetail.cookieID = cookie.id WHERE userorder.username='".$name."'";     


$u_orderId ="SELECT * from userorder where username='".$name."'";    
  
$uo_result = mysqli_query($conn, $all);

$o_result = mysqli_query($conn, $u_orderId);


?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
    <!-- external files -->
    <link rel="stylesheet" href="css/styles.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--script src="js/store.js" async></script> 
    <script src="js/edit.js" async></script>
    <script src="js/jquery.cookie.js"></script-->

<style type="text/css">

img {
  
  padding-left: 60px;
  max-width: 300px;
  height: 180px;
}
p1,p2{
  font-size: 30px;
  padding-left: 50px;
}
h3,h4{
    font-weight: bold;
}
h2,h3,h4{
  padding-left: 50px;
  color: black;
}


</style>

</head>
<body>
    <?php
    include("headerNavbar.php");
    ?>


<h1 style="text-align: center; font-weight: bold;"> Your Order History</h1>


<?php



while($row0 = mysqli_fetch_array($o_result,MYSQLI_ASSOC)){

  $order_id_1[]=$row0['orderId'];
  $order_total_1[]=$row0['total'];
  $order_time_1[]=$row0['orderTime'];

}

$orderDet = array();

while($row = mysqli_fetch_array($uo_result,MYSQLI_ASSOC)){

  if (!array_key_exists($row['orderId'], $orderDet)) {
    $orderDet[$row['orderId']] = array();
  }

  $tempArray = array();
  $tempArray['imageLocation'] = $row['imageLocation'];
  $tempArray['name'] = $row['name'];
  $tempArray['price'] = $row['price'];
  $tempArray['amount'] = $row['amount'];

  array_push($orderDet[$row['orderId']], $tempArray);
  
}
//-*--------------**-----------*------------*------


$num_t = mysqli_num_rows($uo_result);
$num_i = mysqli_num_rows($o_result);

//print_r();
$currentIndex = 0;

for ($i=$num_i-1; 0 <= $i; $i--) {   
  # code..

  echo "<h1> Order Number: ".$order_id_1[$i].", Total Price: $".$order_total_1[$i].", Order Date: ".$order_time_1[$i]."</h1>";
  //echo "<h1> Total Price:    ".$order_total_1[$i]."</h1>";
  
  echo "<hr/>";

  foreach ($orderDet[$order_id_1[$i]] as $arrRow) {
    echo "<img class='o_img' src=". $arrRow['imageLocation']." >";
    echo "<p1>Name: ". $arrRow['name']."</p1>";
    echo "<p1>Price: ". $arrRow['price']."</p1>";
    echo "<p1>Amount: ". $arrRow['amount']."</p1>";
    echo "<hr/>";
  }
  
}
?>



</body>
</html>



