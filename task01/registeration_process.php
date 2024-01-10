<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "ventures";

$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function sanitizeInput($input) { 
    $input = trim($input); 
    $input = stripslashes($input); 
    $input = htmlspecialchars($input); 
    return $input; 
}


$username = sanitizeInput($_POST['username']); 
$email = sanitizeInput($_POST['email']);
$password = sanitizeInput($_POST['password']);

$checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($checkUsernameQuery);  

if ($result->num_rows > 0) {  
    echo "<h3>Username is already taken, Please choose another username</h3>";
} else {

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $insertUserQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";

    if ($conn->query($insertUserQuery) === TRUE) {
        echo "<h3>Registration successful!</h3>";
    } else {
        echo "Error: " . $insertUserQuery . "<br>" . $conn->error;
    }
}

$conn->close();
?>
