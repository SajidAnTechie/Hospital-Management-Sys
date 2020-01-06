<?php include("../includes/config.php"); ?>
<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
if(isset($_POST["login"])){
  sleep(5);
  $username = htmlspecialchars($_POST["username"]);
  $password = htmlspecialchars($_POST["password"]);

  $username = mysqli_real_escape_string($conn,$username);
  $password = mysqli_real_escape_string($conn,$password);

$query = "SELECT * FROM users WHERE user_name = '{$username}'";
$select_user_query = mysqli_query($conn,$query);

if(!$select_user_query){
  die('Error! '.mysqli_error($conn));
}
while($row = mysqli_fetch_assoc($select_user_query)){
  $user_id = htmlspecialchars($row["user_id"]);
  $user_name = htmlspecialchars($row["user_name"]);
  $user_password = htmlspecialchars($row["user_password"]);
}
  if($password == $user_password){
    // Password is correct, so start a new session
    session_start();
    $_SESSION["loggedin"] = true;
  $_SESSION["username"] = $user_name;
  $_SESSION["password"] = $user_password;
  
  header("Location: index.php");
}else{
  header("Location: login.php");
}
}


?>










<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body style="background-color:#30336b;">

    <div class="container">
      <div class="card card-login" style="margin:173px  auto;">
        <div class="card-header" style="font-size: 18px;font-weight: bold;color: #30336b;">Login</div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                <label for="inputUsername">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" name="login" type="submit" >Login</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>