<?php
// Database Configuration
// Automatically detects if running on Localhost or Production

// Enable error reporting for debugging (Remove or comment out in production if desired, though detecting environment helps)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Check if running on localhost (or CLI which usually implies local dev)
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
    
    if ($host == 'localhost' || $host == '127.0.0.1') {
        // Local XAMPP Defaults
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "kalawakan"; 
    } else {
        // Production / Hostinger Credentials
        $servername = "localhost";
        $username = "u510931518_justjohn_mors"; 
        $password = "MORS@john2000"; 
        $dbname = "u510931518_kalawakan_E";
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4"); // Good practice

} catch (mysqli_sql_exception $e) {
    // Handle connection error gracefully
    die("Database Connection Failed: " . $e->getMessage()); 
}
?>
