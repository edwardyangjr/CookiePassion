<?php
$_SESSION["isMember"] = true;
//".$_SESSION['uname']."
//$name = $_POST['uname'];
$name= "admin" ;


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



// here change last line "$name" to SESSION[username]
$all="SELECT userorder.orderId,userorder.total,userorder.orderTime, orderdetail.cookieID, cookie.name, cookie.description, cookie.price, cookie.imageLocation FROM userorder INNER JOIN orderdetail ON userorder.orderId = orderdetail.orderId INNER JOIN cookie ON orderdetail.cookieID = cookie.cookieID WHERE userorder.username='".$name."' 
";     


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


<h3> Your Order History</h3>


<?php



while($row0 = mysqli_fetch_array($o_result,MYSQLI_ASSOC)){

  $order_id_1[]=$row0['orderId'];
  $order_total_1[]=$row0['total'];
  $order_time_1[]=$row0['orderTime'];

}



while($row = mysqli_fetch_array($uo_result,MYSQLI_ASSOC)){

  $order_id[]=$row['orderId'];
  $order_total[]=$row['total'];
  $order_time[]=$row['orderTime'];
  $order_cookieID[]=$row['cookieID'];
  $order_name[]=$row['name'];
  $order_price[]=$row['price'];
  $order_img[]=$row['imageLocation'];


}
//-*--------------**-----------*------------*------


$num_t = mysqli_num_rows($uo_result);
$num_i = mysqli_num_rows($o_result);

/*
$order_id=array_unique($order_id);
$order_total=array_unique($order_total);
$order_time=array_unique($order_time);
*/


//print_r();
$currentIndex = 0;

for ($i=0; $i < $num_i; $i++) {   
  # code..

  echo "<h2> order number: ".$order_id_1[$i]."</h2>";
  echo "<h2> total price:    ".$order_total_1[$i]."</h2>";
  
  echo "<br>-----------</br>";

while ($currentIndex < $num_t) { 
 
if($order_id_1[$i]==$order_id[$currentIndex]){


  echo "<img class='o_img' src=". $order_img[$currentIndex]." >";
  echo "<p1>".$order_id[$currentIndex]."</p1>";
  echo "<p1>".$order_cookieID[$currentIndex]."</p1>";
  echo "<p1>". $order_name[$currentIndex]."</p1>";
  echo "<p1>". $order_price[$currentIndex]."</p1>";
  echo "<p1>".$order_time[$currentIndex]."</p1>";
  echo "<div></div>";
  $currentIndex++;

  } 



 }


 $currentIndex=0;


}





?>



</body>
</html>



