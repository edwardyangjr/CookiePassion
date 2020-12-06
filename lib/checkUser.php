<?php
$name =$_POST['uname'];
$email =$_POST['Email'];
$psw =$_POST['psw'];


session_start();
setUser(false, "", "none");


$servername = "localhost";
$username = "root";
//$password = "root";
$password = "";
//$db = "myproject";
$db = "cookiepassion";

// Create connection
$conn = new mysqli($servername, $username, $password , $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


/*
$name = $conn->real_escape_string($_POST["uname"]);
$email = $conn->real_escape_string($_POST["Email"]);
$psw = $conn->real_escape_string($_POST["psw"]);
$isLogin =$conn->real_escape_string($_POST['isLogin']);
*/

 
if( $email == ""){
	//for login.html
	isFromLogin($conn, $name, $psw);
}else if($email != ""){
	//for Register.html
	isFromRegister($conn, $name, $psw, $email);
}


function isFromLogin($conn, $name, $psw){
	//$result = $conn-> query("SELECT * FROM users WHERE  username = '{$name}'");
	$result = $conn-> query("SELECT * FROM user WHERE  username = '{$name}'");
	$row = $result->fetch_array();
	$dbPsw = $row["password"];

	if($dbPsw == ""){
		setUser(false, "", "none");
		echo "User Not Registered.";
		$conn->close();
		return;
	}

	if(password_verify($psw , $dbPsw)||($psw == $dbPsw)){
		setUser(true, $name, $row["privilege"]);
		echo "success";
	}
	else if($psw != $dbPsw){
		setUser(false, "", "none");
		echo "Password Incorrect.";

	}
	
	$conn->close();
}


function isFromRegister($conn, $name, $psw, $email){
	//$result = $conn-> query("SELECT * FROM users WHERE  username = '{$name}'");
	$result = $conn-> query("SELECT * FROM user WHERE  username = '{$name}'");
	$num = mysqli_num_rows($result);
	
	if ($num > 0){
		echo " Username Not Available";
	}
	
	// if username available then do Register
	else{

		$hashed_password = password_hash($psw, PASSWORD_DEFAULT);
		//echo var_dump($hashed_password);
		
		//$sql="INSERT INTO users (username,email,password) Values ('$name', '$email', '$hashed_password')";
		$sql="INSERT INTO user (username,email,password) Values ('$name', '$email', '$hashed_password')";
		
		if ($conn->query($sql) === TRUE) {
		  setUser(true, $name, "user");
		  echo "success";
		  
		} else {
		  setUser(false, "", "none");
		  echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	
	$conn->close();
}


function setUser($isUser, $name, $privilege) {
	$_SESSION["userName"] = $name;
	$_SESSION["privilege"] = "none";
	if($isUser){
		$_SESSION["isMember"] = true;
		$_SESSION["privilege"] = $privilege;
	}else{
		$_SESSION["isMember"] = false;
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['action'])) {
		if ($_POST['action'] == "logout"){
			session_destroy();
		}
	}
}


?>

