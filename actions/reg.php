<?php
// Include database connection
require_once 'db.php';


// Get form data
$name = $_POST['first_name'];
$name2 = $_POST['last_name'];
$mail = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirmPassword = $_POST['con_passw'];
$id = "";



// Check if email already exists in MySQL table
$emailExistsQuery = "SELECT * FROM user WHERE mail = '$mail'";
$emailExistsResult = mysqli_query($conn, $emailExistsQuery);
if (mysqli_num_rows($emailExistsResult) > 0) {
    header("refresh:3;url=../index.php");
  echo "Email alarady exist. You will be redirected to the previous page in 3 seconds. If not, click <a href='index.php'>here</a>.";
  die(); // Stop further script execution
}


// Perform password confirmation check
if ($password !== $confirmPassword) {
    // Redirect to the same page after 3 seconds
  header("refresh:3;url=../index.php");
  echo "Incorrect Does not match. You will be redirected to the previous page in 3 seconds. If not, click <a href='index.php'>here</a>.";
  die(); // Stop further script execution
}


$sql = "SELECT COUNT(*) as total_rows FROM user";
$result = mysqli_query($conn, $sql);


if ($result) {
    // Fetch total rows count
    $row = mysqli_fetch_assoc($result);
    $totalRows = $row['total_rows'];

    $totalRows ++;

} else {
    echo "Error Code 0001" . mysqli_error($conn);
    die();
}

$id = 'ID'.$totalRows;





// Prepare and execute SQL query to insert data into table
$stmt = $conn->prepare("INSERT INTO user (id, usr_name, usr_name2, mail, phone, passw) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $id, $name, $name2, $mail, $phone, $password);
$stmt->execute();

// Check for successful insertion
if ($stmt->affected_rows > 0) {

    header("refresh:3;url=../index.php");
    echo "registration sucessfull. You will be redirected to the Login page in 3 seconds. If not, click <a href='../index.php'>here</a>.";
  

} else {
    echo "Error Code 0002";
}



// Close statement and connection
$stmt->close();
$conn->close();
?>
