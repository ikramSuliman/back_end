<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="front-end/regester.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->

</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $confirmPassword = stripslashes($_REQUEST['confirm-password']);
        $confirmPassword = mysqli_real_escape_string($con, $confirmPassword);
        $create_datetime = date("Y-m-d H:i:s");

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password !== $confirmPassword) {
            echo "<div class='form'>
            <h3>check correct email Or Password and Confirm Password do not match";
            exit;
        }
        {

    $query    = "INSERT into `users` (username, password, email, create_datetime)
    VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        header("Location: manage.php");
        // header('Location :manage.php');
        // echo "<div class='form'>
        //     <h3>done";
        //     echo "<p class='link'>Click here to <a href='login.php'>login</a> now</p>";

      }  else {
    echo "<div class='form'>
        <h3>Required fields are missing.</h3><br/>
        <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
    </div>";

}}}
    else {
?>

	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Creative SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" class="login-input" name="username" placeholder="Username" required="">
					<input class="text email" type="email" class="login-input" name="email" placeholder="Email" required="">
					<input class="text" type="password" class="login-input" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" class="login-input" name="confirm-password" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<!-- <label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label> -->
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP">
				</form>
				<p>Don't have an Account? <a href="login.php"> Login Now!</a></p>
			</div>
		</div>
		<!-- copyright -->
				<?php
				include('front-end/a.html');
				?>
<?php
    }
?>
</body>
</html>
