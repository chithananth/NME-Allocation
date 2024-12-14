<?php
session_start();
include ('con1.php');
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dashboard</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
            .navtop {
	background-color: #464eab;
	height: 60px;
	width: 100%;
	border: 0;
}
.navtop div {
	display: flex;
	margin: 0 auto;
	width: 1000px;
	height: 100%;
    margin-left:30%;
}
.navtop div h1, .navtop div a {
	display: inline-flex;
	align-items: center;
}
.navtop div h1 {
	flex: 1;
	font-size: 24px;
	padding: 0 20px;
	margin-left: -5%;
	color: #eaebed;
	font-weight: normal;
}
.navtop div a {
	padding: 0 20px;
	text-decoration: none;
	color: #f2dfe1;
	font-weight: bold;
}
.navtop div a i {
	padding: 2px 8px 0 0;
}
.navtop div a:hover {
	color: #eaebed;
}
body.loggedin {
	background-color: #f3f4f7;
}
.content {
	width: 50%;
	margin: 0 auto;
    text-align:center;
}
.content h2 {
	margin: 0;
	padding: 25px 0;
	font-size: 22px;
	border-bottom: 1px solid #e0e0e3;
	color: #4a536e;
}
.content > p, .content > div {
	box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
	margin: 25px 0;
	padding: 25px;
	background-color: #fff;
}
.content > p table td, .content > div table td {
	padding: 5px;
}
.content > p table td:first-child, .content > div table td:first-child {
	font-weight: bold;
	color: #4a536e;
	padding-right: 15px;
}
.content > div p {
	padding: 5px;
	margin: 0 0 10px 0;
}
#classDropdownContainer {
        display: none;
        margin-left:-85%;
    }
        </style>	

</head>
<body class="loggedin">
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <?php require ('header.php'); ?>
	
	    <div class="roberto-news-area pt-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                 
                   <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
                        <h6 align="center">NME Allocation</h6>
                     
                    </div>
                   
                    <div class="blog-details-text">
	
		<nav class="navtop">
			<div>
				<a href="excel.php"><i class="fa fa-download" aria-hidden="true"></i>Excel & PDF Download</a>
				<a href="nme_allocated.php"><i class="fa fa-retweet" aria-hidden="true"></i>RE-Allocate</a>
    				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
    <center>
		 <select class="form-select" name="department" id="departmentDropdown" onchange="updateClassDropdown()">
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
		<br>
        <div id="classDropdownContainer">
		<select class="form-select"  name="classes" id="classDropdown" onchange="showUser(this.value)">
    		<option value="">Select Class</option>
		</select>
</div>
	<br>
	<br>
		<div id="txtHint"><b>Person info will be listed here...</b></div>
		<br>
		<br>
    <center>
          </div>    
                </div>
            </div>
        </div>
    </div>
	
	<?php require ('footer.php'); ?>
	
	 <!-- **** All JS Files ***** -->
     <?php require ('jsfiles.php'); ?>		
	</body>

</html>
<script>
    function updateClassDropdown() {
        var selectedDepartment = document.getElementById("departmentDropdown").value;

        // Fetch and load class dropdown dynamically from get_class.php
        if (selectedDepartment !== "") {
            fetch('get_class.php?departmentId=' + selectedDepartment)
                .then(response => response.text())
                .then(data => {
                    document.getElementById("classDropdownContainer").innerHTML = data;
                    document.getElementById("classDropdownContainer").style.display = 'block'; // Show the container
                })
                .catch(error => console.error('Error:', error));
        } else {
            // Hide the container if no department is selected
            document.getElementById("classDropdownContainer").style.display = 'none';
        }
    }

    // Load department options on page load
    window.onload = function () {
        updateClassDropdown();
    };

    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","get_dep.php?q="+str,true);
            xmlhttp.send();
        }
    }
</script>
<?php
if (isset($_POST['MakeChanges'])){
    $nmedep=$_POST['nmedep'];
	$alertShown = false;
	if(empty($_POST['check'])) {
		echo "<script>
		document.addEventListener('DOMContentLoaded', function () {
			Swal.fire({
				icon: 'info',
				title: 'Oops...',
				text: 'Please select at least one student! and Select NME class',
			});
		});
	</script>";
    } 
	else{
	if(isset($_POST['check'])) {
     foreach($_POST['check'] as $value){
		$stmt= $con->prepare("UPDATE ug_finalyear SET allocation='Y' WHERE regno=?");
		$stmt->bind_param('s',$value);
		$stmt->execute();
		switch($nmedep){
		case 'ECO':	
		$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
		SELECT regno,`name`,'III_ECO_NME' AS classname,'ECO' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
		$stmt->bind_Param('s',$value);
		$result=$stmt->execute();
		if ($result && !$alertShown) {
            	 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
            $alertShown = true;
        } elseif (!$alertShown) {
            echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
            $alertShown = true;
        }
		break;
		case 'ENG':	
			$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
			SELECT regno,`name`,'III_ENG_NME' AS classname,'ENG' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
			$stmt->bind_Param('s',$value);
			$result=$stmt->execute();
			if ($result && !$alertShown) {
					 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
				$alertShown = true;
			} elseif (!$alertShown) {
				echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
				$alertShown = true;
			}
			break;
		case 'HIS':	
			$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
			SELECT regno,`name`,'III_HIS_NME' AS classname,'HIS' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
			$stmt->bind_Param('s',$value);
			$result=$stmt->execute();
			if ($result && !$alertShown) {
					 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
				$alertShown = true;
			} elseif (!$alertShown) {
				echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
				$alertShown = true;
			}
			break;
			case 'TAM':	
				$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
				SELECT regno,`name`,'III_TAM_NME' AS classname,'TAM' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
				$stmt->bind_Param('s',$value);
				$result=$stmt->execute();
				if ($result && !$alertShown) {
						 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
					$alertShown = true;
				} elseif (!$alertShown) {
					echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
					$alertShown = true;
				}
				break;
				case 'COMSF':	
					$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
					SELECT regno,`name`,'III_COMSF_NME' AS classname,'COMSF' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
					$stmt->bind_Param('s',$value);
					$result=$stmt->execute();
					if ($result && !$alertShown) {
							 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
						$alertShown = true;
					} elseif (!$alertShown) {
						echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
						$alertShown = true;
					}
					break;
			case 'BBA':	
					$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
					SELECT regno,`name`,'III_BBA_NME' AS classname,'BBA' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
					$stmt->bind_Param('s',$value);
					$result=$stmt->execute();
					if ($result && !$alertShown) {
							 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
						$alertShown = true;
					} elseif (!$alertShown) {
						echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
						$alertShown = true;
					}
					break;
			case 'COMA':	
						$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
						SELECT regno,`name`,'III_COM_NME_A' AS classname,'COM' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
						$stmt->bind_Param('s',$value);
						$result=$stmt->execute();
						if ($result && !$alertShown) {
								 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
							$alertShown = true;
						} elseif (!$alertShown) {
							echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
							$alertShown = true;
						}
						break;
			case 'COMB':	
							$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
							SELECT regno,`name`,'III_COM_NME_B' AS classname,'COM' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
							$stmt->bind_Param('s',$value);
							$result=$stmt->execute();
							if ($result && !$alertShown) {
									 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
								$alertShown = true;
							} elseif (!$alertShown) {
								echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
								$alertShown = true;
							}
							break;	
			case 'BOT':	
							$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
							SELECT regno,`name`,'III_BOT_NME' AS classname,'BOT' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
							$stmt->bind_Param('s',$value);
							$result=$stmt->execute();
							if ($result && !$alertShown) {
									 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
								$alertShown = true;
							} elseif (!$alertShown) {
								echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
								$alertShown = true;
							}
							break;									
			case 'CHE':	
							$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
							SELECT regno,`name`,'III_CHE_NME' AS classname,'CHE' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
							$stmt->bind_Param('s',$value);
							$result=$stmt->execute();
							if ($result && !$alertShown) {
									 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
								$alertShown = true;
							} elseif (!$alertShown) {
								echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
								$alertShown = true;
							}
							break;
			case 'NCC':	
							$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
							SELECT regno,`name`,'III_NCC_NME' AS classname,'NCC' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
							$stmt->bind_Param('s',$value);
							$result=$stmt->execute();
							if ($result && !$alertShown) {
									 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
								$alertShown = true;
							} elseif (!$alertShown) {
								echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
								$alertShown = true;
							}
							break;
			case 'MAT':	
							$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
							SELECT regno,`name`,'III_MAT_NME' AS classname,'MAT' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
							$stmt->bind_Param('s',$value);
							$result=$stmt->execute();
							if ($result && !$alertShown) {
									 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
								$alertShown = true;
							} elseif (!$alertShown) {
								echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
								$alertShown = true;
							}
							break;
				case 'PHY':	
							$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
							SELECT regno,`name`,'III_PHY_NME' AS classname,'PHY' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
							$stmt->bind_Param('s',$value);
							$result=$stmt->execute();
							if ($result && !$alertShown) {
									 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
								$alertShown = true;
							} elseif (!$alertShown) {
								echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
								$alertShown = true;
							}
							break;
			case 'ZOO':	
							$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
							SELECT regno,`name`,'III_ZOO_NME' AS classname,'ZOO' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
							$stmt->bind_Param('s',$value);
							$result=$stmt->execute();
							if ($result && !$alertShown) {
									 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
								$alertShown = true;
							} elseif (!$alertShown) {
								echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
								$alertShown = true;
							}
							break;
			case 'CAS':	
							$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
							SELECT regno,`name`,'III_CAS_NME_A' AS classname,'CSA' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
							$stmt->bind_Param('s',$value);
							$result=$stmt->execute();
							if ($result && !$alertShown) {
									 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
								$alertShown = true;
							} elseif (!$alertShown) {
								echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
								$alertShown = true;
							}
							break;
			case 'IT':	
							$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
							SELECT regno,`name`,'III_IT_NME' AS classname,'IT' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
							$stmt->bind_Param('s',$value);
							$result=$stmt->execute();
							if ($result && !$alertShown) {
									 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
								$alertShown = true;
							} elseif (!$alertShown) {
								echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
								$alertShown = true;
							}
							break;
			case 'ITB':	
						$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
						SELECT regno,`name`,'III_CAS_NME_B' AS classname,'IT' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
						$stmt->bind_Param('s',$value);
						$result=$stmt->execute();
						if ($result && !$alertShown) {
								 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
							$alertShown = true;
						} elseif (!$alertShown) {
							echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
							$alertShown = true;
						}
						break;
			case 'COMCAA':	
						$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
						SELECT regno,`name`,'III_COMCA_NME_A' AS classname,'COMCA' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
						$stmt->bind_Param('s',$value);
						$result=$stmt->execute();
						if ($result && !$alertShown) {
								 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
							$alertShown = true;
						} elseif (!$alertShown) {
							echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
							$alertShown = true;
						}
						break;
			case 'COMCAB':	
						$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
						SELECT regno,`name`,'III_COMCA_NME_B' AS classname,'COMCA' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
						$stmt->bind_Param('s',$value);
						$result=$stmt->execute();
						if ($result && !$alertShown) {
								 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
							$alertShown = true;
						} elseif (!$alertShown) {
							echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
							$alertShown = true;
						}
						break;
			case 'MBI':	
						$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
						SELECT regno,`name`,'III_MBI_NME' AS classname,'MBI' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
						$stmt->bind_Param('s',$value);
						$result=$stmt->execute();
						if ($result && !$alertShown) {
								 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
							$alertShown = true;
						} elseif (!$alertShown) {
							echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
							$alertShown = true;
						}
						break;
			case 'PED':	
						$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
						SELECT regno,`name`,'III_PED_NME' AS classname,'PED' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
						$stmt->bind_Param('s',$value);
						$result=$stmt->execute();
						if ($result && !$alertShown) {
								 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
							$alertShown = true;
						} elseif (!$alertShown) {
							echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
							$alertShown = true;
						}
						break;
			case 'ENGSF':	
						$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
						SELECT regno,`name`,'III_ENGSF_NME' AS classname,'ENGSF' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
						$stmt->bind_Param('s',$value);
						$result=$stmt->execute();
						if ($result && !$alertShown) {
								 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
							$alertShown = true;
						} elseif (!$alertShown) {
							echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
							$alertShown = true;
						}
						break;
			case 'MBA':	
						$stmt=$con->prepare("INSERT IGNORE INTO nmeclass (regno,`name`,classname,`did`, `year`, `level`,semester)
						SELECT regno,`name`,'III_BBASF_NME' AS classname,'MBA' AS `did`, `year`, `level`,semester FROM ug_finalyear where allocation='Y'AND regno=?");	
						$stmt->bind_Param('s',$value);
						$result=$stmt->execute();
						if ($result && !$alertShown) {
								 echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "success",
                title: "Success!",
                text: "Changes made successfully!"
            });
        });
    </script>';
							$alertShown = true;
						} elseif (!$alertShown) {
							echo '<script>
        document.addEventListener("DOMContentLoaded", function () {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Error occurred while making changes!"
            });
        });
    </script>';
							$alertShown = true;
						}
						break;

		}

} 
}
}
}
?>