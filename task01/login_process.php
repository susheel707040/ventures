<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$database = "ventures";

$conn = new mysqli($host, $username, $password, $database);

$username = $_POST['email']; 
$password = $_POST['password'];

if (empty($username) || empty($password)) {
    echo "All fields must be filled out!";
} else {
    
    $sql = "SELECT * FROM users WHERE username='$username'"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
        if (password_verify($password, $row['password'])) { 
            echo "Login successful! Welcome, " . $row['username']; 

            $_SESSION['user_id'] = $row['id'];   
            $_SESSION['username'] = $row['username'];

            
            header("Location: welcome.php"); 
            exit();  
        } else {  
            echo "<h3>Incorrect password!</h3>"; 
        }
    } else {  
        echo "<h3>Please check your username and password and then login</h3>";
    }
}

$conn->close();
?>
 