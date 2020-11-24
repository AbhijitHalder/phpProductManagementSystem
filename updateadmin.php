<!DOCTYPE html>
<html>
<head>
	
	<title> Update Admin </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

  <div class="content">

    <h3> Update Administrator </h3>

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
	<h2> <b>  Enter the username of the admin you want to change: </b> </h2>

  <form method="post" action="updateadmin.php">

    Admin Username: <input type="text" name="username" placeholder="Enter username" required/> <br> <br>

    <h2> <b>  Enter the updated details: </b> </h2> <br> 

  Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" placeholder="Enter name" /> <br> <br>
	Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" placeholder="Enter email" /> <br> <br>
	Password: &nbsp;&nbsp;&nbsp;<input type="text" name="password" placeholder="Enter password" /> <br> <br>
	
  <input type="submit" value="Update" name="signup" class="button">

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

    	$query = "UPDATE users SET name='$name', email='$email', password='$password' WHERE username='$username'";
    	$result = mysqli_query($conn, $query);

  			header('Location: ./admin.php');
  			echo "Account updation successfully!";
  }

?>

</body>
</html>