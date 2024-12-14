<?php
include ('con1.php');
session_start();
if (isset($_SESSION['loggedin'])) {
	header('Location: Dashboard.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style1.css">
  <title>NME LOGIN</title>
  <link rel="icon" href="img/core-img/favicon.ico">
</head>
<body>
  <div class="logo-container">
    <img src="img/logo/logo_s.png" alt="Logo" id="logo" class="logo">
  </div>
  <div class="login-container">
    <br>
    <br>
    <div class="card">
      <form method="POST" autocomplete="off">
        <label for="username">Username</label>
        <input type="text" id="user" name="user" required>
        <label for="password">Password</label>
        <input type="password" id="pass" name="pass" required>
        <input type="submit" name="login" value="login">
      </form>
    </div>
  </div>
  <script src="script1.js"></script>
  <script src="sweetalert.min.js"></script>
</body>
</html>
<?php
if(isset($_POST["login"])){
if ($stmt = $con->prepare('SELECT sno, pass FROM login WHERE user = ?')) {
	$stmt->bind_param('s', $_POST['user']);
	$stmt->execute();
	$stmt->store_result();
}
if ($stmt->num_rows > 0) {
	$stmt->bind_result($sno, $pass);
	$stmt->fetch();
    if (password_verify($_POST['pass'], $pass)) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['user'];
		$_SESSION['sno'] = $sno;
    echo '<script>window.onload = function() { swal("Success", "Login Successful!", "success").then(function() { window.location = "Dashboard.php"; }); }</script>';
	} else {
		echo '<script>window.onload = function() { swal("Error", "Incorrect username and/or password!", "error"); }</script>';
	}
} else {
  echo '<script>window.onload = function() { swal("Error", "Incorrect username and/or password!", "error"); }</script>';
}}
?>