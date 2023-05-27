<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body,html{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 0.8em;
}
a{
    text-decoration: none;
    color: orange;
}
h1,h2,h3{
    padding-bottom: 20px;
}
p{
    margin: 10px 0 ;
}
.container{
    margin: 0;
    padding: 0 20px;
    max-width:1100px ;
    overflow: auto;
}
#navbar{
    color: bisque;
    background-color: black;
    overflow: auto;
}
#navbar a{
    color: blanchedalmond;
}
#navbar h1{
    float: left;
    padding-top: 20px;
}
#navbar ul{
    list-style: none;
    float: right;
}
#navbar ul li {
    float: left;
}
#navbar ul li a{
    display: block;
    padding : 20px;
    text-align: center;
}
#navbar ul li a:hover ,
#navbar ul li a.current{
background: royalblue;
color: bisque;
}

/* showcase*/
#showcase{
    background: url('../images/showcase.jpg') no-repeat center center/cover;
    height: 600px;
}
#showcase .showcase_content{
    text-align: center;
    padding-top: 190px;
    color: white;
}
#showcase .showcase_content h1{
    font-size: 60px;
    line-height: 1.2em;
}
.text_primary{
    color: rgb(73, 36, 36);
}

</style>
    <header>
        <nav id="navbar">
           <div style="color=red" class="container">
            <h1 class="logo"><a href="index.html">LOGIN</a></h1>
            <ul>
                <li><a class="current  "href="login.php">Home</a></li>
                <li><a  href="#">About</a></li>
                 
            </ul>
           </div>
        </nav>
    </header>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: manage.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="email" class="login-input" name="email" placeholder="Email" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
  </form>
<?php
    }
?>
</body>
</html>
