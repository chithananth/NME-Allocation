<?php
include ('con.php');
session_start();
if (isset($_SESSION['logedin'])) {
	header('Location: preference.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style2.css">
  <title>NME User LOGIN</title>
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
        <label for="username">Register Number</label>
        <input type="text" id="user" name="regno" placeholder="Ex: 21SUCA012" required>
        <label for="password">Department</label>
        <select class="form-select" name="did" id="department">
  			<option value="">Select Department</option>
			  <option value="ECO">Economics</option>
			  <option value="ENG">English</option>
			  <option value="HIS">History</option>
			  <option value="TAM">Tamil</option>
			  <option value="BBA">BBA</option>
			  <option value="MBA">BBA Self</option>
			  <option value="CAS">Computer Application</option>
			  <option value="IT">Information Technology</option>
			  <option value="COM">Commerce</option>
			  <option value="COMCA">Commerce CA</option>
			  <option value="BOT">Botany</option>
			  <option value="CHE">Chemistry</option>
			  <option value="CSE">Computer Science</option>
			  <option value="MAT">Maths</option>
			  <option value="MBI">Microbiology</option>
			  <option value="PHY">Physics</option>
			  <option value="ZOO">Zoology</option>
			  <option value="PED">Physical Education</option>
  			<option value="COMSF">Commerce SF</option>
  			<option value="ENGSF">English SF</option>
		 </select>
         <br>
        <input type="submit" name="login" value="login">
      </form>
    </div>
  </div>
  <script src="script1.js"></script>
  <script src="sweetalert.min.js"></script>
</body>
</html>
<?php
if (isset($_POST["login"])) {
    if ($stmt = $con->prepare('SELECT * FROM ug_finalyear WHERE regno = ? AND did = ?')) {
        $stmt->bind_param('ss', $_POST['regno'], $_POST['did']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            session_regenerate_id();
            $_SESSION['logedin'] = TRUE;
            $_SESSION['regno'] = $_POST['regno'];
            $_SESSION['did'] = $_POST['did'];
            echo '<script>window.onload = function() { swal("Success", "Login Successful!", "success").then(function() { window.location = "preference.php"; }); }</script>';
        } else {
            echo '<script>window.onload = function() { swal("Error", "Incorrect username and/or department!", "error"); }</script>';
        }
    } else {
        echo '<script>window.onload = function() { swal("Error", "Database error", "error"); }</script>';
    }
}
?>
