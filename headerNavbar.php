<header class="main-header">
    <nav class="navbar navbar-expand-lg main-nav nav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="project_browse.php">Shop</a>
            </li>
            <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION["privilege"]) && isset($_SESSION["userName"]) && isset($_SESSION["isMember"])) {
                echo ' <li class="nav-item">
                            <a class="nav-link" href="#">User</a>
                        </li>';
                echo '<button class="btn btn-warning" type="button" id="logoutbut">Logout</button>';
            }
            else {
                echo '<li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>';
            }
            ?>
            
        </ul>
    </nav>
    <h1 class="shop-name shop-name-large">Cookie Passion</h1>
</header>
<script>
    $(document).ready(function () {
        $('#logoutbut').click(function() {
            $.post("lib/checkUser.php",
            {
                action: "logout",
            },
            function (data, status) {
                alert("Logout:" + status);
                location.reload();
            });
        })
    });
</script>