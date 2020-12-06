<!--
  page for handling user login
-->

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- external files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/loginCSS2.css"> 
  <link rel="stylesheet" href="css/styles.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
  <?php
    include("headerNavbar.php");
  ?>
  
  </br>
  <!-- Section Heading-->
  <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Login</h2>
  <!-- Icon Divider-->
  <div class="divider-custom">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
    <div class="divider-custom-line"></div>
  </div>

  <!-- login section -->
  <form action="lib/login.php" method="post">
    <div class="container">
      
      <label for="uname" class="text-uppercase"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>
    
      <label for="psw" class="text-uppercase"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button id="loginBtn" type="button" class="buttonLogin">Login</button>

      <button onclick="location.href='Register.html'" type="button" class="buttonLogin">Create account</button>
      <div id="avalibility"></div>
    </div>
  </form>

</body>

<script>
  $(document).ready(function() {

    $('#loginBtn').click(function() {

      var username = $('input[name="uname"]').val();
      var password = $('input[name="psw"]').val();
      $('#avalibility').css("color", "red");

      // clean up inputted text
      if (username.trim() == '') {
        $('#avalibility').html("please enter Username.");
        return;
      }

      if (password.trim() == '') {
        $('#avalibility').html("please enter Password.");
        return;
      }

      // check if user exists; if yes, redirect 
      $.ajax({
        url: 'lib/checkUser.php',
        method: "POST",
        data: {
          uname: username,
          psw: password,
          Email: ''
        },
        success: function(data) {
          let msg = data.trim();
          console.log(data);
          if (msg == "success") {
            $('#avalibility').css("color", "green");
            $('#avalibility').html("Login Successfully. Redirecting...");
            setTimeout(() => {
              window.location.href = "lib/afterLogin.php";
            }, 3000);
          } else {
            $('#avalibility').html(msg);
          }
        }
      })
    });
  });
</script>

</html>