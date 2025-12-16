<?php
// Test script to verify db.php logic on localhost
include 'db.php';

if ($conn) {
    echo "Connection Successful!\n";
    echo "Host: " . $servername . "\n";
    echo "User: " . $username . "\n";
    // Don't print password
} else {
    echo "Connection FAILED.\n";
}
?>
