<?php
require_once 'config/koneksi.php';

// Get all table names
$result = $koneksi->query("SHOW TABLES");
echo "Tables in database:\n";
while ($row = $result->fetch_row()) {
    echo "- " . $row[0] . "\n";
}

// Check if subjects table exists
$result = $koneksi->query("SHOW TABLES LIKE 'subjects'");
if ($result && $result->num_rows > 0) {
    echo "\nSubjects table exists. Structure:\n";
    $result = $koneksi->query("DESCRIBE subjects");
    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }
} else {
    echo "\nSubjects table does not exist.\n";
}

// Check if scores table exists and its structure
$result = $koneksi->query("SHOW TABLES LIKE 'scores'");
if ($result && $result->num_rows > 0) {
    echo "\nScores table exists. Structure:\n";
    $result = $koneksi->query("DESCRIBE scores");
    while ($row = $result->fetch_assoc()) {
        print_r($row);
    }
} else {
    echo "\nScores table does not exist.\n";
}

$koneksi->close();
?>
