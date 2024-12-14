<?php
include ('con1.php'); // Include your database connection script

// Hash the new password
$new_password = password_hash('Vhnsnc@123', PASSWORD_DEFAULT);
$username = 'admin';
// Update the password in the database
if ($stmt = $con->prepare('UPDATE login SET pass = ? WHERE user = ?')) {
    $stmt->bind_param('ss', $new_password, $username); // 'user' is the username you want to update
    $stmt->execute();
    echo 'Password updated successfully.';
} else {
    echo 'Failed to update password.';
}
?>