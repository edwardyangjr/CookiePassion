 <?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
print_r($_SESSION);
header("Location: http://localhost/CookiePassion/project_browse.php");
exit();
?>

</body>
</html> 