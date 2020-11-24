<!DOCTYPE html>
<html>
<head>
	
	<title> Sign Up </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

  <div class="content">

    <form action="register.php" method="post">
        <h2 class="text-center">Create Account</h2> <br>    
        <div class="form-group">
          Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" placeholder="Enter your name" required/> <br> <br>
          Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" placeholder="Enter your email" required/> <br> <br>
          Phone #: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="phone" placeholder="Enter your phone number" required/>
          <input type="text" name="role" value="user" hidden/> <br> <br>
          Username: &nbsp;&nbsp; <input type="text" name="username" placeholder="Enter your username" required/> <br> <br>
          Password: &nbsp;&nbsp;&nbsp; <input type="text" name="password" placeholder="Enter your password" required/> <br> <br>
        </div>
        <div class="form-group grp">
            <input type="submit" value="Sign Up" name="signup" class="btn btn-primary btn-block">
        </div>      
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
    $phone=$_POST['phone'];
    $role=$_POST['role'];

    	$query = "INSERT into users (name, email, phone, role, username, password) VALUES ('$name', '$email', '$phone', '$role', '$username', '$password')";
    	$result = mysqli_query($conn, $query);

  			header('Location: ./index.php');
  			echo "Your sign up was successful!";
  }

?>

</body>
</html>