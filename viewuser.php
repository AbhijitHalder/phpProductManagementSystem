<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <title> Products </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">

</head>
<body>

<div class="content">

    <h3> Users </h3>

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
                <a href="viewadmin.php" class="button1"> View Admins </a>


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

    $sql = "SELECT * FROM users where role='user'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { ?>
            <form method="post" action="viewuser.php">
                <h2> <?php echo $row["name"] ?> </h2>
                <p> Email: <?php echo $row["email"] ?> </p>
                <p> Username: <?php echo $row["username"] ?> </p>
                <p> Password: <?php echo $row["password"] ?> </p>
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


?>

</body>
</html>