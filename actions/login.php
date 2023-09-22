<?php
// Include database connection
require_once 'db.php';


session_start();



// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered username and password from the form
    $enteredUsername = $_POST["email"];
    $enteredPassword = $_POST["password"];

    // Use prepared statement to retrieve the user's password from the database
    $stmt = $conn->prepare("SELECT usr_name, passw FROM user WHERE username = ?");
    $stmt->bind_param("s", $enteredUsername);
    $stmt->execute();
    $stmt->bind_result($dbUsername, $dbPassword);
    $stmt->fetch();
    $stmt->close();

    // Check if a matching username was found
    if ($dbUsername && password_verify($enteredPassword, $dbPassword)) {
        // Credentials are correct, so store user information in the session
        $_SESSION["username"] = $enteredUsername;

        // Redirect to the dashboard page
        header("Location: ../dashboard/index.html");
        exit();
    } else {
        // Credentials are incorrect, display an error message
        $errorMessage = "Incorrect username or password.";
    }
}

// Close the database connection
$conn->close();

?>
