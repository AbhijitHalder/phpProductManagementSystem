<!DOCTYPE html>
<html>
<head>
	
	<title> Update Product </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

  <div class="content">

     <h3> Update Product </h3> <br>

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
	<h2> <b> Enter the id of the product you want to change: </b> </h2>

  <form method="post" action="updateproduct.php" enctype="multipart/form-data">

    Product ID: &nbsp;&nbsp; <input type="text" name="id" placeholder="Enter product id" required/> <br> <br>

    <h2> <b> Enter the updated details: </b> </h2> <br>

  	Name: &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="name" placeholder="Enter product name" /> <br> <br>
    Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="price" placeholder="Enter product price" /> <br> <br>
    <div>
	     Image:&nbsp;&nbsp;&nbsp;&nbsp; <input type="file" name="img"/> <br> <br>
	  </div>
  	<input type="submit" value="Update Product" name="signup" class="button"> 

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
    $id=$_POST['id'];

    $image = $_FILES['img']['name'];
    $target = "upload/".basename($image);

    move_uploaded_file($_FILES['image']['tmp_name'], $target);


    	$query = "UPDATE products SET name = '$name', price= '$price', img = '$image' WHERE id = $id;";
    	$result = mysqli_query($conn, $query);

  			header('Location: ./admin.php');
  			echo "Product updated successfully!";
  }

?>

</body>
</html>