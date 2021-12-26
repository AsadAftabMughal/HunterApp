<!DOCTYPE html>
<style>
body, html {
    height: auto;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url(../assets/img/login.jpg);

  /* Control the height of the image */
  min-height: none;

  /* Center and scale the image nicely */
  background-position: center; 
  background-repeat: no-repeat;
  position: relative;
  background-size: 100% auto;

}
</style>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="bg-img">
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `customer` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: customerdashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Customer Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link" style="background:#4CAF50;color:white;border:2px solid white;width: 250px";><a href="registration.php">New Registration</a></p>
        <input type="submit" value="Home Screen" style="background:#4CAF50;color:white;border:2px solid white;width: 250px"; />
  </form>

<?php
    }
?>
</body>
</html>