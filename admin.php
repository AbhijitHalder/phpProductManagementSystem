<!DOCTYPE html>
<html>
<head>
	
	<title> Admin Home </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

  <div class="content">

	<h3> Welcome! </h3>

  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <form method="post" action="user.php">
   
        <a href="admin.php" class="button1"> Home </a>
          <input type="submit" value="View Products" name="viewproduct" class="button1">
          <input type="submit" value="View Users" name="viewuser" class="button1">
          <input type="submit" value="View Admins" name="viewadmin" class="button1">




          <ul class="nav navbar-nav navbar-right">
          <li><span class="glyphicon glyphicon-user"></span> <input type="submit" value="Your Account" name="viewaccount" class="button1"></li>
          <span class="glyphicon glyphicon-log-out"></span> <a href="logout.php" class="button1"> Logout</a>
      </ul>

      </form>
    </div>
  </div>
</nav>

  <form method="post" action="admin.php">
	<table>
		<tr> <td> <h2> Products </h2> </td> <td> <h2> Administrators </h2> </td> <td> <h2> Users </h2> </td> </tr>
  	<tr> <td> <input type="submit" value="Add a Product" name="addproduct"> </td>
  		 <td> <input type="submit" value="Add an Admin" name="addadmin"> </td>
  		 <td> <input type="submit" value="Add a User" name="adduser"> </td>
  	</tr>
  	<tr> <td> <input type="submit" value="Update Product" name="updateproduct"> </td>
  		 <td> <input type="submit" value="Update Admin" name="updateadmin"> </td>
  		 <td> <input type="submit" value="Update User" name="updateuser"> </td>
  	</tr>
  	<tr> <td> <input type="submit" value="Delete Product" name="delproduct"> </td>
  		 <td> <input type="submit" value="Delete Admin" name="deladmin"> </td>
  		 <td> <input type="submit" value="Delete User" name="deluser"> </td>
  	</tr>
  	</table>
  </form>

<?php

  $hostname     = "localhost";
  $database_name  = "product_management";
  $username = "root";
  $password = "";

  $conn = mysqli_connect($hostname, $username, $password, $database_name);

  if(!$conn)
  {
    die("Database Connection Failed: " . mysqli_error($conn) );
  }

  if (isset($_POST['addproduct']))
  {
    header('Location: ./addproduct.php');
  }

  else if (isset($_POST['addadmin']))
  {
    header('Location: ./addadmin.php');
  }

  else if (isset($_POST['adduser']))
  {
    header('Location: ./adduser.php');
  }

  else if (isset($_POST['updateproduct']))
  {
    header('Location: ./updateproduct.php');
  }

  else if (isset($_POST['updateadmin']))
  {
    header('Location: ./updateadmin.php');
  }

  else if (isset($_POST['updateuser']))
  {
    header('Location: ./updateuser.php');
  }

  else if (isset($_POST['delproduct']))
  {
    header('Location: ./delproduct.php');
  }

  else if (isset($_POST['deladmin']))
  {
    header('Location: ./deladmin.php');
  }

  else if (isset($_POST['deluser']))
  {
    header('Location: ./deluser.php');
  }

?>

</body>
</html>