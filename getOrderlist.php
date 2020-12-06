<?php

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


$u_orderId ="SELECT orderId from userorder where username='".$name."'";    
$t_orderId ="SELECT total from userorder where username='".$name."'";    

$d_orderId ="SELECT * FROM `orderdetail` WHERE orderId IN (".$u_orderId.")"; 

$d_result = mysqli_query($conn, $d_orderId);
$t_result = mysqli_query($conn, $t_orderId);

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
  max-width: 250px;
  height: 180px;
}
p1,p2,h4,h3{

  position: relative;
  left: 50px;
}
h3,h4,p2{
    font-weight: bold;
}
h3,h4{
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

$num = mysqli_num_rows($d_result);

//$row = mysqli_fetch_array($d_result,MYSQLI_ASSOC);


while($row = mysqli_fetch_array($d_result,MYSQLI_ASSOC)){
 
  $orderId_detail[]=$row['orderId'];
  $order_amount[]=$row['amount'];
 
}

?>

<DIV>

<?php 

//SELECT * FROM `cookie` WHERE id in (4, 6, 11, 12, 13, 15, 3)
$uni_orderid = array_unique($orderId_detail);

// uni_orderid = arr(16,17,18 )

foreach ($uni_orderid as $uid) {
  
  echo "<br><h4>User OrderID: " .$uid. "</h4>"; 
  
    $s_oid_result="SELECT cookieID FROM orderdetail WHERE orderId= '".$uid."' ";

    $oid_result = mysqli_query($conn, $s_oid_result);

    while($row = mysqli_fetch_array($oid_result,MYSQLI_ASSOC)){

      $cookieId_orderdetail[]=$row['cookieID'];
   
  }


    //echo "Here is cookieID: "."<br> "; 
    foreach ($cookieId_orderdetail as $cid) {
      
      //echo "<p1>here is cookieid in orderdetail: ".$cid. "</p1><br>"." "; 
      
      $c_sql= "SELECT * from cookie where id= '".$cid."' ";
      $c_result = mysqli_query($conn, $c_sql);
      $cookieId_orderdetail=null;
      while($row = mysqli_fetch_array($c_result,MYSQLI_ASSOC)){

       
        echo "<div><img class='o_img' src=". $row['imageLocation']." ></div>";
        echo "<p1>".$row['id']."</p1><br> ";
        echo "<p2>".$row['name']."</p2><br> ";
        //echo "<p1>".$row['ingredient']."</p1><br> ";
        echo "<p1>".$row['description']."</p1><br> ";   
        echo "<p1>".$row['price']."</p1><br>";
        echo "<div></p1></div>";
        
      }
    }
}

?>
</DIV>
</body>
</html>



