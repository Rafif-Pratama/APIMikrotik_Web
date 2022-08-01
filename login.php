<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
  <h3 class="text-center">Login Form</h3>
  <form action="login-proses.php" method="post">
  	<hr>
    <div class="form-group">
      <label for="username">Username :</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
    </div>
    <br>
    <div class="form-group">
      <label for="password">Password :</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
      <br>
    </div>
    <br>
       <button name="login" type="submit" class="btn btn-primary" value="Login">Login</button>
  </form>
</div>
</body>
</html>
