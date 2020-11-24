<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	
	<title> Cart </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">


</head>
<body>

<div class="content">
  
	<h3> Cart </h3>

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
        <a href="admin.php" class="button1"> Home </a>
        <a href="viewproduct.php" class="button1"> View Products </a>

      <div class="nav navbar-nav navbar-right">
        <span class="glyphicon glyphicon-user"></span> <a href="viewaccount.php" class="button1"> Your Account </a>
        <span class="glyphicon glyphicon-shopping-cart"></span> <a href="viewcart.php" class="button1"> Cart </a>
      </div>

    </div>
  </div>
</nav>

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

  $id = $_SESSION['user_id'];

$sql = "SELECT * FROM cart WHERE user_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 

      $pid = $row["pro_id"];

      $sql1 = "SELECT * FROM products WHERE id=$pid";
      $result1 = $conn->query($sql1);

      if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) { 
    ?>
        <h2> Product ID: <?php echo $row["id"] ?> </h2>
        <p> Name: <?php echo $row["name"] ?> </p>
        <p> Price: <?php echo $row["price"] ?> </p>
        <?php echo "<img src='upload/".$row['img']."' style='width:10%;'>"; ?>
        <form method="post" action="viewcart.php">
        <input type="text" name="pro_id" value="<?php echo $row['id'] ?>" hidden>
        <input type="submit" name="cart" value="Remove from Cart">
        </form>
<?php    }
}

}
}

?>

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

  if(isset($_POST['cart']))
  {
    $pid = $_POST['pro_id'];

    $query = "DELETE FROM cart WHERE pro_id='$pid'";
    $result = mysqli_query($conn, $query);

    header('Location: ./viewcart.php');
    echo "Product removed from cart successfully!";
  }

?>

</body>
</html>