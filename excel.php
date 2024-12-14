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
    		xmlhttp.open("GET","pdf_nmedep.php?q="+strr,true);
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
                        <h6 align="center">Excel & PDF Download</h6>
                     
                    </div>
                   
                   
                   
                    <div class="blog-details-text" style="text-align:center;">
                       
                    <form method='GET' action='export.php'>
        <br>
        <br>
		<center>
		 <select class="form-select" name="nmedepartment" onchange="showUserr(this.value)">
		 <option value="">Select NME Department</option>
			  <option value="III_ECO_NME">Economics</option>
			  <<option value="III_ENG_NME">English</option>
			  <option value="III_HIS_NME">History</option>
			  <option value="III_TAM_NME">Tamil</option>
			  <option value="III_BBA_NME">BBA</option>
			  <option value="III_COM_NME_A">Commerce Class A</option>
        	  <option value="III_COM_NME_B">Commerce Class B</option>
			  <option value="III_BOT_NME">Botany</option>
			  <option value="III_CHE_NME">Chemistry</option>
			  <option value="III_NCC_NME">NCC</option>
			  <option value="III_MAT_NME">Maths</option>
			  <option value="III_PHY_NME">Physics</option>
			  <option value="III_ZOO_NME">Zoology</option>
			  <option value="III_BBASF_NME">BBA SF</option>
			  <option value="III_CAS_NME_A">Computer Application</option>
			  <option value="III_IT_NME">Information Technology</option>
        	  <option value="III_CAS_NME_B">BCA B</option>
			  <option value="III_COMCA_NME_A">Commerce CA A</option>
        	  <option value="III_COMCA_NME_B">Commerce CA B</option>
			  <option value="III_MBI_NME">Microbiology</option>
			  <option value="III_PED_NME">Physical Education</option>
  			  <option value="III_COMSF_NME">Commerce SF</option>
			  <option value="III_ENGSF_NME">English SF</option>
		 </select>
		 <br>
		<br>
		<div id="txtHint"><b>Allocated Nme Students listed here...</b></div>
		<br>
		<br>
		</center>
	</form>
                        
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