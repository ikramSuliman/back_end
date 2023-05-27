<?php
include('db.php');
if(count($_POST)>0) {
mysqli_query($con,"UPDATE users set id='" . $_POST['id'] . "', username='" 
. $_POST['username'] . "', password='" . $_POST['password'] . 
"', email='" . $_POST['email'] . "' WHERE id='" . $_POST['id'] . "'");
$message ="<script src='aaa.js'></script>";
}

$result = mysqli_query($con,"SELECT * FROM users WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<!-- <link href='logincss.css' rel='stylesheet' type='text/css'> -->
<link rel="stylesheet" href="editecss.css">
<title>Users Data</title>
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
    line-height: 0.9em;
}
a{
    text-decoration: none;
    color: orange;
}
h1{
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
    opacity: 0.5;
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
           <div class="container">
            <h1 class="logo"><a href="index.html">Edite Data:</a></h1>
            <ul>
                <li><a class="current  "href="login.php">Edite Data</a></li>
                <li> <a href="manage.php">Employee List</a></li>
                <li><a href="#">About</a></li>
            </ul>
           </div>
        </nav>
    </header>
<div   class="login" >
<form name="frmUser" method="post" action="">
 
<div><?php if(isset($message)) { echo $message; } ?>
</div>


</div>

<div class="main-w3layouts wrapper">
		<h1>Creative SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				
                
					<input class="text" type="text" name="id"  class="login-input" value="<?php echo $row['id']; ?>"placeholder="ID" required="">
					<input class="text email" type="text" name="username" class="txtField" value="<?php echo $row['username']; ?>" class="login-input"   placeholder="Username" required="">
					<input class="text"  type="password" name="password" class="txtField" value="<?php echo $row['password']; ?>" class="login-input"  placeholder="Password" required="">
					<input class="text w3lpass"  type="email" name="email" class="txtField" value="<?php echo $row['email']; ?>"  class="login-input"  placeholder="Email" required="">
					<div class="wthree-text">
						<!-- <label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label> -->
						<div class="clear"> </div>
					</div>
					<input value="Edite" class="signin" type="submit" name="sign_in" value="Submit" class="buttom">
				
				
			</div>
		</div>


</form>
</div>
</body>
</html>

