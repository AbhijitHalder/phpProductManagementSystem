<!DOCTYPE html>
<html>
<head>
  
  <title> Log In </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>

  <div class="content">

  <form action="login.php" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="username" required="required">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
            <input type="submit" value="Log in" name="login" class="btn btn-primary btn-block">
        </div>      
    </form>
  </div>

</body>
</html>