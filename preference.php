<?php
session_start();
include ('con.php');
if (!isset($_SESSION['logedin'])) {
	header('Location: user_login.php');
	exit;
}
$reg=$_SESSION['regno'];
$did=$_SESSION['did'];
if ($stmt = $con->prepare('SELECT `name` FROM ug_finalyear WHERE regno = ?')) {
    $stmt->bind_param('s', $reg);
    $stmt->execute();
    $stmt->store_result();
}
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($name);
        $stmt->fetch();
        $_SESSION['name'] = $name;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Title -->
    <title>VHNSNC</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
<style>
    .containe{
        max-width:70%;
    }
    td{
      text-align:center;  
    }
    .form-select{
      margin-left:28%;  
    }
</style>   
<script>
   // Assuming you're using jQuery
$(document).ready(function(){
    $('#select1').change(function(){
        var selected_option = $(this).val();

        // Clone the options from select1
        var options = $("#select1 option").clone();

        // Remove the selected option from the cloned options
        options = options.filter(function() {
            return $(this).val() != selected_option;
        });

        // Clear the second select box and append the filtered options
        $("#select2").empty().append(options);
    });
});

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
                        <h6 align="center">NME Preference Form</h6>
                        
                     
                    </div>
                   
                  <div class="blog-details-text">
                   <div class="containe">
                    <form method="POST" autocomplete="off">   
                     <table>
                         <tr>   
                          <td><label for="name">Name</label>&nbsp;</td>
                          <td><input type="text" id="na" name="na" value="<?php echo $_SESSION['name'];?>" readonly></td>
                           <br><br>
                        </tr>
                        <tr>
                          <td><label for="name">Register Number</label>&nbsp;</td>
                          <td><input type="text" id="regno" name="regno" value="<?php echo $_SESSION['regno'];?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><label for="name">First Preference</label>&nbsp;</td>
                          <td><?php
                            switch($did){
                            case'ECO':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ENG">English</option>
                                        <option value="HIS">History</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="BBA">BBA</option>
                                        <option value="COMA">Commerce Class A</option>
                                        <option value="COMB">Commerce Class B</option>
                                        <option value="BOT">Botany</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="MAT">Maths</option>
                                        <option value="PHY">Physics</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break;
                                case'ENG':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="HIS">History</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="BBA">BBA</option>
                                    <option value="COMA">Commerce Class A</option>
                                    <option value="COMB">Commerce Class B</option>
                                    
                                    <option value="BOT">Botany</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="MAT">Maths</option>
                                        <option value="PHY">Physics</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break;
                                case'HIS':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="ENG">English</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="BBA">BBA</option>
                                        <option value="COMA">Commerce Class A</option>
                                    <option value="COMB">Commerce Class B</option>
                                    
                                    <option value="BOT">Botany</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="MAT">Maths</option>
                                        <option value="PHY">Physics</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break;
                                case'TAM':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="HIS">History</option>
                                        <option value="ENG">English</option>
                                        <option value="BBA">BBA</option>
                                        <option value="COMA">Commerce Class A</option>
                                    <option value="COMB">Commerce Class B</option>
                                    
                                    <option value="BOT">Botany</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="MAT">Maths</option>
                                        <option value="PHY">Physics</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break;
                                case'BBA':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="HIS">History</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="ENG">English</option>
                                        <option value="BOT">Botany</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="MAT">Maths</option>
                                        <option value="PHY">Physics</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break;
                                case'COM':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="HIS">History</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="ENG">English</option>
                                        <option value="BOT">Botany</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="MAT">Maths</option>
                                        <option value="PHY">Physics</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break;
                                case'BOT':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="HIS">History</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="BBA">BBA</option>
                                        <option value="COMA">Commerce Class A</option>
                                    <option value="COMB">Commerce Class B</option>
                                    
                                        <option value="ENG">English</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="MAT">Maths</option>
                                        <option value="PHY">Physics</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break;
                                case'CHE':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="HIS">History</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="BBA">BBA</option>
                                    <option value="COMA">Commerce Class A</option>
                                    <option value="COMB">Commerce Class B</option>
                                    
                                    <option value="BOT">Botany</option>
                                        <option value="ENG">English</option>
                                        <option value="NCC">NCC</option>
                                        <option value="MAT">Maths</option>
                                        <option value="PHY">Physics</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break;
                                case'MAT':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="HIS">History</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="BBA">BBA</option>
                                    <option value="COMA">Commerce Class A</option>
                                    <option value="COMB">Commerce Class B</option>
                                    
                                        <option value="BOT">Botany</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="ENG">English</option>
                                        <option value="PHY">Physics</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                    <?php break;
                                case'CSE':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="HIS">History</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="BBA">BBA</option>
                                        <option value="COMA">Commerce Class A</option>
                                        <option value="COMB">Commerce Class B</option>
                                        <option value="BOT">Botany</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="ENG">English</option>
                                        <option value="PHY">Physics</option>
                                        <option value="MAT">Maths</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break
                                ;case'PHY':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="HIS">History</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="BBA">BBA</option>
                                    <option value="COMA">Commerce Class A</option>
                                    <option value="COMB">Commerce Class B</option>
                                    
                                        <option value="BOT">Botany</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="MAT">Maths</option>
                                        <option value="ENG">English</option>
                                        <option value="ZOO">Zoology</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break;
                                case'ZOO':  
                            ?>
                            <select class="form-select" name="nmede"  id="select1" >
                                        <option value="">Select Department</option>
                                        <option value="ECO">Economics</option>
                                        <option value="HIS">History</option>
                                        <option value="TAM">Tamil</option>
                                        <option value="BBA">BBA</option>
                                    <option value="COMA">Commerce Class A</option>
                                    <option value="COMB">Commerce Class B</option>
                                        <option value="BOT">Botany</option>
                                        <option value="CHE">Chemistry</option>
                                        <option value="NCC">NCC</option>
                                        <option value="MAT">Maths</option>
                                        <option value="PHY">Physics</option>
                                        <option value="ENG">English</option>
                                    </select>
                                    <br>
                                    <br>
                                <?php break;
                                    case'MBA':  
                                    ?>
                                <select class="form-select" name="nmede"  id="select1" >
                                    <option value="">Select Department</option>
                                        <option value="CAS">Computer Application</option>
                                        <option value="IT">Information Technology</option>
                                    <option value="ITB">BCA B</option>
                                        <option value="COMCAA">Commerce CA A</option>
                                    <option value="COMCAB">Commerce CA B</option>
                                        <option value="MBI">Microbiology</option>
                                        <option value="PED">Physical Education</option>
                                        <option value="ENGSF">English SF</option>
                                    </select>
                                    <br>
                                    <br> 
                                <?php break;
                                    case'CAS':  
                                    ?>
                                <select class="form-select" name="nmede"  id="select1" >
                                    <option value="">Select Department</option>
                                        <option value="MBA">BBA SF</option>
                                        <option value="COMSF">Commerce SF</option>
                                        <option value="COMCAA">Commerce CA A</option>
                                    <option value="COMCAB">Commerce CA B</option>
                                        <option value="MBI">Microbiology</option>
                                        <option value="PED">Physical Education</option>
                                        <option value="ENGSF">English SF</option>
                                    </select>
                                <br>
                                    <br> 
                                <?php break;
                                    case'IT':  
                                    ?>
                                <select class="form-select" name="nmede"  id="select1" >
                                    <option value="">Select Department</option>
                                        <option value="MBA">BBA SF</option>
                                        <option value="COMSF">Commerce SF</option>
                                        <option value="COMCAA">Commerce CA A</option>
                                    <option value="COMCAB">Commerce CA B</option>
                                        <option value="MBI">Microbiology</option>
                                        <option value="PED">Physical Education</option>
                                        <option value="ENGSF">English SF</option>
                                        <option value="NCC">NCC</option>
                                    </select>
                                <br>
                                    <br> 
                                <?php break;
                                    case'COMCA':  
                                    ?>
                                <select class="form-select" name="nmede"  id="select1" >
                                    <option value="">Select Department</option>
                                        <option value="MBA">BBA SF</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="ITB">BCA B</option>
                                        <option value="CAS">Computer Application</option>
                                        <option value="MBI">Microbiology</option>
                                        <option value="PED">Physical Education</option>
                                        <option value="ENGSF">English SF</option>
                                    </select>
                                <br>
                                <br>
                                <?php break;
                                    case'MBI':  
                                    ?>
                                <select class="form-select" name="nmede"  id="select1" >
                                    <option value="">Select Department</option>
                                        <option value="MBA">BBA SF</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="ITB">BCA B</option>
                                        <option value="CAS">Computer Application</option>
                                        <option value="COMSF">Commerce SF</option>
                                        <option value="COMCAA">Commerce CA A</option>
                                    <option value="COMCAB">Commerce CA B</option>
                                        <option value="PED">Physical Education</option>
                                        <option value="ENGSF">English SF</option>
                                    </select>
                                <br>
                                <br>
                                <?php break;
                                    case'PHY':  
                                    ?>
                                <select class="form-select" name="nmede"  id="select1" >
                                    <option value="">Select Department</option>
                                        <option value="MBA">BBA SF</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="ITB">BCA B</option>
                                        <option value="CAS">Computer Application</option>
                                        <option value="COMSF">Commerce SF</option>
                                        <option value="COMCAA">Commerce CA A</option>
                                    <option value="COMCAB">Commerce CA B</option>
                                    <option value="MBI">Microbiology</option>
                                        <option value="ENGSF">English SF</option>
                                    </select>
                                <br>
                                <br>
                                <?php break;
                                    case'COMSF':  
                                    ?>
                                <select class="form-select" name="nmede"  id="select1" >
                                    <option value="">Select Department</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="ITB">BCA B</option>
                                        <option value="CAS">Computer Application</option>
                                    <option value="MBI">Microbiology</option>
                                        <option value="PED">Physical Education</option>
                                        <option value="ENGSF">English SF</option>
                                    </select>
                                <br>
                                <br>
                                <?php break;
                                    case'ENGSF':  
                                    ?>
                                <select class="form-select" name="nmede"  id="select1" >
                                    <option value="">Select Department</option>
                                        <option value="MBA">BBA SF</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="ITB">BCA B</option>
                                        <option value="CAS">Computer Application</option>
                                        <option value="COMSF">Commerce SF</option>
                                        <option value="COMCAA">Commerce CA A</option>
                                    <option value="COMCAB">Commerce CA B</option>
                                        <option value="PED">Physical Education</option>
                                        <option value="MBI">Microbiology</option>
                                    </select>
                                <br>
                                <br>
                                <?php break;}?>
                            </td> 
                        </tr>
                        <tr>
                        <td><label for="second">Second Preference</label>&nbsp;</td>
                          <td><select class="form-select" name="select2" id="select2">
                                <option value="">Select Sub Department</option>
                               </select>
                          </td>  
                        </tr>
                        <tr>
                        <td><label for="third">Third Preference</label>&nbsp;</td>
                          <td> <select class="form-select" name="select3" id="select3">
                                    <option value="">Select Option</option>
                                </select>
                          </td>  
                        </tr>   
                     </table>
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
     <script>
        $(document).ready(function () {
            $('#select1').change(function () {
                var selectedValue = $(this).val();
                $.ajax({
                    url: 'preference1.php',
                    type: 'POST',
                    data: {selectedValue: selectedValue},
                    success: function (response) {
                        $('#select2').html(response);
                        $('#select3').html('<option value="">Select Option</option>');
                    }
                });
            });

            $('#select2').change(function () {
                var selectedValue = $(this).val();
                $.ajax({
                    url: 'preference1.php',
                    type: 'POST',
                    data: {selectedValue: selectedValue},
                    success: function (response) {
                        $('#select3').html(response);
                    }
                });
            });
        });
    </script>
	</body>

</html>

