<!DOCTYPE html>
<html>
<head>
	
	<title> Sign Up </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

  <div class="content">

	<h3> Update your Account </h3>

   <form method="post" action="logout.php">

    <input type="submit" value="Logout" class="button2"> 

   </form>

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
   
        <input type="submit" value="View Products" name="viewproduct" class="button1"> 

      <ul class="nav navbar-nav navbar-right">
        <li><span class="glyphicon glyphicon-user"></span> <input type="submit" value="Your Account" name="viewaccount" class="button1"></li>
        <li><span class="glyphicon glyphicon-shopping-cart"></span> <input type="submit" value="Cart" name="viewcart" class="button1"> </li>
      </ul>

      </form>
    </div>
  </div>
</nav>

  <form method="post" action="updateaccount.php">

  Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" placeholder="Enter your name" /> <br> <br>
	Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" placeholder="Enter your email" /> <br> <br>
	Username: &nbsp;&nbsp;<input type="text" name="username" placeholder="Enter your username" /> <br> <br>
	Password: &nbsp;&nbsp;&nbsp;<input type="text" name="password" placeholder="Enter your password" /> <br> <br>
	
  	<input type="submit" value="Update Details" name="update" class="button"> 

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

  if(isset($_POST['update']))
  {
  	$username=$_POST['username'];
	  $password=$_POST['password'];
    $name=$_POST['name'];
    $email=$_POST['email'];

    $id = $_SESSION['user_id'];

    	$query = "UPDATE users SET name='$name', email='$email', phone='$phone', username='$username', password='$password' WHERE id=$id";
    	$result = mysqli_query($conn, $query);

  			header('Location: ./viewaccount.php');
  			echo "Account updation successful!";
  }

  else if (isset($_POST['back'])) {
    header('Location: ./viewaccount.php');
  }

?>

</body>
</html>