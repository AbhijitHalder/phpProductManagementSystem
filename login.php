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

  if(isset($_POST['login']))
  {
  	$username=$_POST["username"];
	  $password=$_POST["password"];

    	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    	$result = mysqli_query($conn, $query);

  		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) 
        { 
      				$role = $row["role"];

      				if ($role == "admin")
      				{
                session_start();
                $_SESSION['user_id']= $row['id'];
      					header('Location: ./admin.php');
      				}

      				else if ($role == "user")
      				{
                session_start();
                $_SESSION['user_id']= $row['id'];
      					header('Location: ./user.php');
      				}
    		}
  		}
  }

  		else 
  		{
  			header('Location: ./login.php');
  			echo "Wrong username or password. Please try again!";
  		}

?>