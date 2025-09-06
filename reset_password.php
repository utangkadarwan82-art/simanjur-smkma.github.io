<?php
session_start();
require_once '../config/koneksi.php';

// New password
$new_password = password_hash('newpassword', PASSWORD_DEFAULT);
$username = 'Asep Dinar JatnikaL';

// Update password in the database
$sql = "UPDATE users SET password = ? WHERE username = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("ss", $new_password, $username);

if ($stmt->execute()) {
    echo "Password has been reset successfully.";
} else {
    echo "Error resetting password: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
?>
