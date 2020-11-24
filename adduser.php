<!DOCTYPE html>
<html>
<head>
	
	<title> Add User </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

  <div class="content">

	<h3> Add User </h3>

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

      <ul class="nav navbar-nav navbar-right">
        <span class="glyphicon glyphicon-log-out"></span> <a href="logout.php" class="button1"> Logout</a>
      </ul>

      </form>
    </div>
  </div>
</nav>


  <form method="post" action="adduser.php">

  Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" placeholder="Enter your name" /> <br> <br>
	Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" placeholder="Enter your email" /> <br> <br>
  <input type="text" name="role" value="user" hidden/> <br> <br>
	Username: &nbsp;&nbsp; <input type="text" name="username" placeholder="Enter your username" /> <br> <br>
	Password: &nbsp;&nbsp;&nbsp;<input type="text" name="password" placeholder="Enter your password" /> <br> <br>
	
  <input type="submit" value="Add" name="signup" class="button"> 

  </form>

</div>


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

  if(isset($_POST['signup']))
  {
  	$username=$_POST['username'];
	  $password=$_POST['password'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $role=$_POST['role'];

    	$query = "INSERT into users (name, email, role, username, password) VALUES ('$name', '$email', '$role', '$username', '$password')";
    	$result = mysqli_query($conn, $query);

  			header('Location: ./admin.php');
  			echo "User added successfully!";
  }

?>

</body>
</html>