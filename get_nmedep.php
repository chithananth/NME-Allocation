<?php
session_start();
include ('con.php');
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}
table tr:nth-child(even) {
      background-color: #fff6a7;
    }
table tr:hover {
      background-color: #ddd;
    }
	input[type=submit] {
		background-color:#FB8E05; 
    border: none;
    color: white;
    padding: 5px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin: 4px 2px;
    cursor: pointer;
  }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
	<body>
<?php
$q = trim($_GET['q']);
if($q=='III_NCC_NME'){
	$sql="SELECT * FROM nmeclass WHERE classname = '".$q."'";
	$result = mysqli_query($con,$sql);
	echo "<form method='POST'>";
	echo "<table  class='table'>
	<tr>
	<th></th>
	<th>Sno</th>
	<th>Register No</th>
	<th>Student Name</th>
	<th>NME Class name</th>
	<th>NME Department ID</th>
	</tr>";
	$i=1;
	while($row = mysqli_fetch_array($result)) {
	  $i;
	  $regno=$row['regno'];
	  $stuna=$row['name'];
	  $clana=$row['classname'];
	  $did=$row['did'];
	  echo "<tr><td><input type='checkbox' name='checkk[]' value='".$regno."'  id='enableButton' onchange='toggleButton()'/></td>
	  <td>$i</td><td>$regno</td><td>$stuna</td><td>$clana</td><td>$did</td></tr>";
	  $i++;
	}
	echo "</table>";
	
}
else{
$sql="SELECT * FROM ug_finalyear WHERE classname = '".$q."'";
$result = mysqli_query($con,$sql);
echo "<form method='POST'>";
echo "<table  class='table'>
<tr>
<th></th>
<th>Sno</th>
<th>Register No</th>
<th>Student Name</th>
<th>Class name</th>
<th>Department ID</th>
<th>NME Class Name</th>
</tr>";
$i=1;
while($row = mysqli_fetch_array($result)){
  $i;
  $regno=$row['regno'];
  $stuna=$row['name'];
  $clana=$row['classname'];
  $did=$row['did'];
  $sql1="SELECT * FROM nmeclass WHERE regno = '".$regno."'";
  $result1 = mysqli_query($con,$sql1);
  while($row1 = mysqli_fetch_array($result1)) {
	$classname=$row1['classname'];
  echo "<tr><td><input type='checkbox' name='checkk[]' value='".$regno."'  id='enableButton' onchange='toggleButton()'/></td>
  <td>$i</td><td>$regno</td><td>$stuna</td><td>$clana</td><td>$did</td><td>$classname</td></tr>";
  $i++;
}
  }
echo "</table>";
}
switch($q){
	case'III_NCC_NME':  
		?>
		<select class="form-select" name="changenmedep">
					  <option value="">Select Department</option>
					  <option value="ECO">Economics</option>
					  <option value="ENG">English</option>
					  <option value="HIS">History</option>
					  <option value="TAM">Tamil</option>
					  <option value="BBA">BBA</option>
					  <option value="COMA">Commerce Class A</option>
					  <option value="COMB">Commerce Class B</option>
					  <option value="BOT">Botany</option>
					  <option value="CHE">Chemistry</option>
					  <option value="MAT">Maths</option>
					  <option value="PHY">Physics</option>
					  <option value="ZOO">Zoology</option>
				 </select>
				 <br>
				 <br>
			 <?php break;
case'III_BA_ECONOMICS':  
?>
<select class="form-select" name="changenmedep">
  			  <option value="">Select Department</option>
			  <option value="ENG">English</option>
			  <option value="HIS">History</option>
			  <option value="TAM">Tamil</option>
			  <option value="BBA">BBA</option>
			  <option value="COMA">Commerce Class A</option>
              <option value="COMB">Commerce Class B</option>
			  <option value="BOT">Botany</option>
			  <option value="CHE">Chemistry</option>
			  <option value="MAT">Maths</option>
			  <option value="PHY">Physics</option>
			  <option value="ZOO">Zoology</option>
		 </select>
		 <br>
		 <br>
     <?php break;
     case'III_BA_ENGLISH':  
?>
<select class="form-select" name="changenmedep">
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
     case'III_BA_HISTORY':  
?>
<select class="form-select" name="changenmedep">
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
     case'III_BA_TAMIL':  
?>
<select class="form-select" name="changenmedep">
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
     case'III_BBA':  
?>
<select class="form-select" name="changenmedep">
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
     case'III_BCOM_A':  
?>
<select class="form-select" name="changenmedep">
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
     case'III_BCOM_B':  
?>
<select class="form-select" name="changenmedep">
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
     case'III_BCOM_CA':  
?>
<select class="form-select" name="changenmedep">
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
     case'III_BSC_BOTANY':  
?>
<select class="form-select" name="changenmedep">
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
     case'III_BSC_CHEMISTRY':  
?>
<select class="form-select" name="changenmedep">
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
     case'III_BSC_MATHS':  
?>
<select class="form-select" name="changenmedep">
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
     <?php break
     ;case'III_BSC_PHYSICS':  
?>
<select class="form-select" name="changenmedep">
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
     case'III_BSC_ZOOLOGY':  
?>
<select class="form-select" name="changenmedep">
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
        case'III_BBA_SF':  
          ?>
      <select class="form-select" name="changenmedep">
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
        case'III_BCA_A':  
          ?>
      <select class="form-select" name="changenmedep">
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
        case'III_BCA_B':  
          ?>
      <select class="form-select" name="changenmedep">
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
        case'III_BSC_IT':  
          ?>
      <select class="form-select" name="changenmedep">
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
        case'III_BCOM_CA_SF_A':  
          ?>
      <select class="form-select" name="changenmedep">
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
        case'III_BCOM_CA_SF_B':  
          ?>
      <select class="form-select" name="changenmedep">
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
        case'III_BSC_MICROBIOLOGY':  
          ?>
      <select class="form-select" name="changenmedep">
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
        case'III_BSC_PHYSICALEDUCATION':  
          ?>
      <select class="form-select" name="changenmedep">
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
        case'III_BCOM_SF':  
          ?>
      <select class="form-select" name="changenmedep">
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
        case'III_BA_ENGLISH_SF':  
          ?>
      <select class="form-select" name="changenmedep">
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
     <?php }?>
     	<input type="SUBMIT" name="changedep" value="change department" id="submitButton">
<?php echo"</form>";?>
</body>
</html>
