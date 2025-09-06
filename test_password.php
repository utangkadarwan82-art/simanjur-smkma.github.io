<?php
$password = 'admin123';
$hash = '$2y$10$HwiFd/eEG.P1pJLIM/WrW.JwdKUciV.TmdWW2Yk7Puln0v/OI6paSu'; // Hash from the database

if (password_verify($password, $hash)) {
    echo "Password is valid!";
} else {
    echo "Invalid password.";
}
?>
