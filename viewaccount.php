<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>

	<title> Account Details </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">


</head>
<body>

<div class="content">

	<h3> Account Details </h3>

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
          <a href="admin.php" class="button1"> Home </a>
          <input type="submit" value="View Products" name="viewproduct" class="button1">


      <ul class="nav navbar-nav navbar-right">
        <li><span class="glyphicon glyphicon-user"></span> <input type="submit" value="Your Account" name="viewaccount" class="button1"></li>
        <li><span class="glyphicon glyphicon-shopping-cart"></span> <input type="submit" value="Cart" name="viewcart" class="button1"> </li>
      </ul>

      </form>
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

$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { ?>
        <h2> <?php echo $row["name"] ?> </h2>
        <p> Email: <?php echo $row["email"] ?> </p>
        <p> Username: <?php echo $row["username"] ?> </p>
        <p> Password: <?php echo $row["password"] ?> </p>
<?php    }
}

?>

<a href="updateaccount.php" class="button">
  Update Account
</a>

</div>

</body>
</html>