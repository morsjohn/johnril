<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Testing undefined index...\n";
try {
    // Suppress warning for test output clarity, or let it show
    $x = $_POST['non_existent'];
    echo "Accessing undefined index did not throw exception.\n";
} catch (Throwable $e) {
    echo "Index error: " . $e->getMessage() . "\n";
}

echo "Testing DB connection...\n";
try {
    // Set a short timeout if possible or just expect it to fail
    $conn = new mysqli("invalid_host_12345", "root", "", "db");
    if ($conn->connect_error) {
        echo "Connect error (property): " . $conn->connect_error . "\n";
    }
} catch (Throwable $e) {
    echo "DB Exception: " . $e->getMessage() . "\n";
}
?>
