<?php
include ('db.php');
$sql="SELECT * FROM users";
$result=$con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  
    <title>All Users</title>
    <style>
    body{
        background-color:gray;
    }
    h1{
      color: black;
      text-align: center;
      font-family: 'Montserrat', sans-serif;
    }
    /* CSS styles for the table */
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #f2f2f2;
    }

    th, td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
      background-color: darkgrey;
    }
    footer{
      text-align: center;
      color: white;
    }
 

  </style>
      <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body,html{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    line-height: 0.1em;
}
a{
    text-decoration: none;
    color: red;
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
    margin-bottom: 20px;
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
</head>
<body>
<header>
        <nav id="navbar">
           <div class="container">
            <h1 class="logo"><a href="index.html">ALL Users</a></h1>
            <ul>
                <li><a class="current  "href="login.php">ALL Users</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="#">About</a></li>
            </ul>
           </div>
        </nav>
    </header>
<header>   <div class="form">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
      
       
    </div></header>
<?php
if($result->num_rows > 0){
?>
 
  
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Created-at</th>
        <th>Edit/Delete</th>

      </tr>
      <?php
			$i=0;
      while($row=$result->fetch_assoc()){
			?>
    </thead>
    
      <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["username"];?></td>
        <td><?php echo $row["email"];?></td>
        <td><?php echo $row["password"];?></td>
        <td><?php echo $row["create_datetime"];?></td>
        <td><p><button><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></button>
        <button><a href="edite.php?id=<?php echo $row["id"]; ?>">Edite</a></button></p></td>
      </tr>
      <?php
			$i++;
			}
			?>

  </table>
  <?php
}
else
{
    echo "No result found";
}
?>
  <footer>
<?php
include('a.html')
?>
</footer>
</body>


</html>