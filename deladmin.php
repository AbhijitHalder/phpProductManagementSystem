<!DOCTYPE html>
<html>
<head>
	
	<title> Delete Admin </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

  <div class="content">

    <h3> Delete Administrator </h3>

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

<br>

	<h2> <b>  Enter the username of the admin you want to delete: </b> </h2>

  <form method="post" action="deladmin.php">

    Admin Username: <input type="text" name="username" placeholder="Enter username" required /> <br> <br>
	
  <input type="submit" value="Delete" name="signup" class="button"> 
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

    	$query = "DELETE FROM users WHERE username='$username'";
    	$result = mysqli_query($conn, $query);

  			header('Location: ./admin.php');
  			echo "Account deleted successfully!";
  }

?>

</body>
</html>