<!DOCTYPE html>
<html>
<head>
	
	<title> Add Product </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

  <div class="content">

	<h3> Add Product </h3>

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

  <form method="post" action="addproduct.php" enctype="multipart/form-data">

  	Name: &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="name" placeholder="Enter product name" /> <br> <br>
    Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="price" placeholder="Enter product price" /> <br> <br>
    <div>
	     Image:&nbsp;&nbsp;&nbsp;&nbsp; <input type="file" name="img"/> <br> <br>
	  </div>
  	<input type="submit" value="Add Product" name="signup" class="button"> 

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
    $name=$_POST['name'];
    $price=$_POST['price'];

    $image = $_FILES['img']['name'];
    $target = "upload/".basename($image);

    move_uploaded_file($_FILES['img']['tmp_name'], $target);


    	$query = "INSERT into products (name, price, img) VALUES ('$name', '$price', '$image')";
    	$result = mysqli_query($conn, $query);

  			header('Location: ./admin.php');
  			echo "Product added successfully!";
  }

?>

</body>
</html>