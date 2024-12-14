<?php
include ('con1.php');
session_start();
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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

    <!-- Title -->
    <title>VHNSNC</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <script>
	function showUserr(strr) {
  		if (strr == "") {
    		document.getElementById("txtHint").innerHTML = "";
    		return;
  		} else {
    		var xmlhttp = new XMLHttpRequest();
    		xmlhttp.onreadystatechange = function() {
      	if (this.readyState == 4 && this.status == 200) {
        	document.getElementById("txtHint").innerHTML = this.responseText;
      	}
    	};
    		xmlhttp.open("GET","get_nmedep.php?q="+strr,true);
    		xmlhttp.send();
  		}
	  }
</script>
</head>

<body>
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
                        <h6 align="center">Re-Allocate NME</h6>
                     
                    </div>
                   
                    <div class="blog-details-text">
                    <div class="text-center">
                    <form method="POST">
        <br>
        <br>
		 <select class="form-select" name="nmedepartment" onchange="showUserr(this.value)">
		 <option value="">Select Allocated Department</option>
			  <option value="III_BA_ECONOMICS">Economics</option>
			  <<option value="III_BA_ENGLISH">English</option>
			  <option value="III_BA_HISTORY">History</option>
			  <option value="III_BA_TAMIL">Tamil</option>
			  <option value="III_BBA">BBA</option>
			  <option value="III_BCOM_A">Commerce Class A</option>
        	  <option value="III_BCOM_B">Commerce Class B</option>
			  <option value="III_BSC_BOTANY">Botany</option>
			  <option value="III_BSC_CHEMISTRY">Chemistry</option>
			  <option value="III_NCC_NME">NCC</option>
			  <option value="III_BSC_MATHS">Maths</option>
			  <option value="III_BSC_PHYSICS">Physics</option>
			  <option value="III_BSC_ZOOLOGY">Zoology</option>
			  <option value="III_BBA_SF">BBA SF</option>
			  <option value="III_BCA_A">Computer Application</option>
			  <option value="III_BSC_IT">Information Technology</option>
        	  <option value="III_BCA_B">BCA B</option>
			  <option value="III_BCOM_CA_SF_A">Commerce CA A</option>
        	  <option value="III_BCOM_CA_SF_B">Commerce CA B</option>
			  <option value="III_BSC_MICROBIOLOGY">Microbiology</option>
			  <option value="III_BSC_PHYSICALEDUCATION">Physical Education</option>
  			  <option value="III_BCOM_SF">Commerce SF</option>
			  <option value="III_BA_ENGLISH_SF">English SF</option>
		 </select>
		 <br>
		<br>
		<div id="txtHint"><b>Allocated Nme Students listed here...</b></div>
		<br>
		<br>
	</form>
    </div>            
                        
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
<?php
if (isset($_POST['changedep'])){
    $nmedep=$_POST['changenmedep'];
	$nmedepart=$_POST['nmedepartment'];
	$alertShown=false;
    if(empty($_POST['checkk'])) {
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
	if(isset($_POST['checkk'])) {
     foreach($_POST['checkk'] as $value){
		$stmt= $con->prepare("UPDATE ug_finalyear SET allocation='Y' WHERE regno=?");
		$stmt->bind_param('s',$value);
		$stmt->execute();
		switch($nmedep){
			case 'ECO':	
				$sql = "DELETE FROM nmeclass WHERE regno=?";
				$stmt = $con->prepare($sql);
				$stmt->bind_Param('s',$value);
				$stmt->execute();			
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
				$sql = "DELETE FROM nmeclass WHERE regno=?";
				$stmt = $con->prepare($sql);
				$stmt->bind_Param('s',$value);
				$stmt->execute();		
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
				$sql = "DELETE FROM nmeclass WHERE regno=?";
				$stmt = $con->prepare($sql);
				$stmt->bind_Param('s',$value);
				$stmt->execute();			
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();	
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
				case 'BBA':	
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();	
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
				case 'COMSF':	
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
				case 'BOT':	
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
						$sql = "DELETE FROM nmeclass WHERE regno=?";
						$stmt = $con->prepare($sql);
						$stmt->bind_Param('s',$value);
						$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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
					$sql = "DELETE FROM nmeclass WHERE regno=?";
					$stmt = $con->prepare($sql);
					$stmt->bind_Param('s',$value);
					$stmt->execute();
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