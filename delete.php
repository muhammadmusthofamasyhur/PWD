<?php
// Include the database connection file
require 'config.php';

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    // Ensure the ID is an integer
    $id = intval($_GET['id']);

    // Prepare the DELETE query using prepared statements
    $stmt = $con->prepare("DELETE FROM users WHERE id = $id");
    $stmt->bind_param("i", $id); // "i" indicates the variable is an integer

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to index.php if successful
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "ID parameter is missing.";
}

// Close the database connection
$con->close();
?>
