<!DOCTYPE html>
<html>
<head>
	
	<title> Home </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

  <div class="content">

  <div class="jumbotron">
	 <h3> Welcome! </h3>
  </div>

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

  <br><br>
  
  <form method="post" action="logout.php">

    <input type="submit" value="Logout" class="button"> 

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

  if(isset($_POST['viewaccount']))
  {
    header('Location: ./viewaccount.php');
  }

  else if (isset($_POST['viewproduct']))
  {
    header('Location: ./viewproduct.php');
  }
  else if (isset($_POST['viewuser']))
  {
      header('Location: ./viewuser.php');
  }else if (isset($_POST['viewadmin']))
  {
      header('Location: ./viewadmin.php');
  }

  else if (isset($_POST['viewcart']))
  {
    header('Location: ./viewcart.php');
  }

?>

</body>
</html>