<?php
include('con1.php');
header('Content-Type: application/json'); // Set the content type to JSON

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['departmentId'])) {
    $departmentId = $_GET['departmentId'];

    // Query to fetch classes based on the selected department ID
    $sql = "SELECT DISTINCT `classname` FROM ug_finalyear WHERE `did` = '$departmentId'";
    $result = $con->query($sql);

    $classesDropdown = '<select class="form-select" name="classes" id="classDropdown" onchange="showUser(this.value)">';
    $classesDropdown .= '<option value="">Select Class</option>';

    // Fetch classes and add them to the dropdown
    while ($row = $result->fetch_assoc()) {
        $classesDropdown .= '<option value="' . $row['classname'] . '">' . $row['classname'] . '</option>';
    }

    $classesDropdown .= '</select>';

    // Return the class dropdown HTML
    echo $classesDropdown;
} else {
    // Return an error message as JSON
    echo json_encode(['error' => 'Invalid request']);
}

$con->close();
?>
