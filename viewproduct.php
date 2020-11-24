<?php
  session_start();
?>
<?php$_SESSION['user'] = $user;
?>
$_SESSION['user'] = $user;
<!DOCTYPE html>
<html>
<head>
	
	<title> Products </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

<div class="content">

	<h3> Products </h3>

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
        <?php if ($_SESSION['role']  === 'admin'):?>
        <a href="admin.php" class="button1"> Home </a>
        <?php else:?>
        <a href="user.php" class="button1"> Home </a>
        <?php endif ?>
        <?php if ($_SESSION['role']  === 'admin'):?>
        <a href="viewuser.php" class="button1"> View Users </a>
        <a href="viewadmin.php" class="button1"> View Admins </a>
        <?php endif ?>


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

$sql = "SELECT * FROM products";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
      <form method="post" action="viewproduct.php">
        <h2> Product ID: <?php echo $row["id"] ?> </h2>
        <p> Name: <?php echo $row["name"] ?> </p>
        <p> Price: <?php echo $row["price"] ?> </p>
        <?php echo "<img src='upload/".$row['img']."' style='width:10%;'>"; ?>
        <input type="text" name="pro_id" value="<?php echo $row['id'] ?>" hidden>
        <input type="submit" name="cart" value="Add to Cart" class="button">
      </form>
<?php    }
}

$conn->close();

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
    $uid = $_SESSION['user_id'];
    $pid = $_POST['pro_id'];

    $query = "INSERT into cart (pro_id, user_id) VALUES ('$pid', '$uid')";
    $result = mysqli_query($conn, $query);

    header('Location: ./viewcart.php');
    echo "Product added to cart successfully!";
  }

?>

</body>
</html>