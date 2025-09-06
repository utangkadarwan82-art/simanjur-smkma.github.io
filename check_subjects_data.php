<?php
require_once 'config/koneksi.php';

echo "Subjects in database:\n";
$result = $koneksi->query('SELECT * FROM subjects ORDER BY subject_order');
while($row = $result->fetch_assoc()) {
    print_r($row);
    echo "\n";
}

echo "\nSample scores:\n";
$result = $koneksi->query('SELECT * FROM scores LIMIT 10');
while($row = $result->fetch_assoc()) {
    print_r($row);
    echo "\n";
}
?>
