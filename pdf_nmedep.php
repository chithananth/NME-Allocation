<?php
session_start();
include ('con1.php');
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<body>
<?php
$q = trim($_GET['q']);
$_SESSION['cla']=$q;
$sql="SELECT * FROM nmeclass WHERE classname = '".$q."'";
$result = mysqli_query($con,$sql);
echo "<form method='POST' action='export.php'>";
echo "<table  class='table'>
<tr>
<th>Sno</th>
<th>Register No</th>
<th>Student Name</th>
<th>NME Class</th>
<th>Department ID</th>
</tr>";
$i=1;
while($row = mysqli_fetch_array($result)){
  $i;
  $regno=$row['regno'];
  $stuna=$row['name'];
  $clana=$row['classname'];
  $did=$row['did'];
    echo "<tr>
  <td>$i</td><td>$regno</td><td>$stuna</td><td>$clana</td><td>$did</td></tr>";
  $i++;
  }
echo "</table>";
?>
<input type="submit" name="export" value="EXCEL Export" class="btn btn-success" />
<input type="submit" name="export1" value="PDF Export" class="btn btn-success" />
<?php echo"</form>";?>
</body>
</html>
