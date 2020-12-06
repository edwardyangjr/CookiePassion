<!--
  page for handling user registration
-->

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- external files -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

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
  <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Register</h2>
  <!-- Icon Divider-->
  <div class="divider-custom">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
    <div class="divider-custom-line"></div>
  </div>

  <!-- registration section -->
  <form action="lib/checkUser.php" method="post">

    <div class="imgcontainer">
    </div>

    <div class="container">
      <label for="uname" class="text-uppercase"><b>Username</b></label>
      <input id="uname" type="text" placeholder="Enter Username" name="uname" required>
      
      <label for="email" class="text-uppercase"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="Email" id="Email" required>
      
      <label for="psw" class="text-uppercase"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

      <!--button-->
      <button id="rbtn" type="button" class="buttonLogin">Create account</button>
      <div id="avalibility"></div>
    </div>
  </form>

</body>
<script>
  $(document).ready(function() {
    $('#rbtn').click(function() {

      var username = $('input[name="uname"]').val();
      var email = $('input[name="Email"]').val();
      var password = $('input[name="psw"]').val();
      $('#avalibility').css("color", "black");

      // clean up entered text
      if (username.trim() == '') {
        $('#avalibility').html("please enter Username.");
        return;
      }
      if (email.trim() == '') {
        $('#avalibility').html("please enter Email.");
        return;
      }
      if (password.trim() == '') {
        $('#avalibility').html("please enter Password.");
        return;
      }

      // check availabilty of unique username
      $.ajax({
        url: 'lib/checkUser.php',
        method: "POST",
        data: {
          uname: username,
          Email: email,
          psw: password,

        },
        success: function(data) {
          console.log(data);
          let msg = data.trim();
          if (msg == "success") {
            $('#avalibility').css("color", "green");
            $('#avalibility').html("New record created successfully. Redirecting...");
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