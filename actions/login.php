<?php
// Include database connection
require_once 'db.php';

$enteredUsername = $_POST["email"];
$enteredPassword = $_POST["password"];

// Query the database to retrieve the user's data
$query = "SELECT * FROM user WHERE mail = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $enteredUsername);
$stmt->execute();
$result = $stmt->get_result();

// Check if a user with the provided username exists
if ($result->num_rows === 1) {
    // User found, fetch the data
    $userData = $result->fetch_assoc();

    // Verify the entered password against the stored hashed password
    if ($enteredPassword == $userData["passw"]) {
        // Passwords match - authentication successful
        header("Location: ../dashboard/index.html");
        echo "Authentication successful. Redirect to dashboard or perform other actions.";
        
    } else {
        // Passwords don't match - show error message
        header("refresh:3;url=../index.php");
        echo "Incorrect password. Please try again.";
        
    }
} else {
    // User not found - show error message
    header("refresh:3;url=../index.php");
    echo "User not found. Please check the username.";
}

// Close the database connection
$stmt->close();
$conn->close();

?>
