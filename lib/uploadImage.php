<?php
$target_dir = "../images/cookies/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['newImageLocation'] = $target_file;
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
header("Location: http://localhost/CookiePassion/project_browse.php");
exit();
?>