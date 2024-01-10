<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_FILES['image'])) {
        $uploadDir = 'uploads/'; 

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        $fileName = $_FILES['image']['name'];
        $tempFilePath = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png'];
        if (!in_array($fileType, $allowedTypes)) {
            die("Error: Only JPEG or PNG files are allowed.");
        }

        $maxFileSize = 1 * 1024 * 1024; 
        if ($fileSize > $maxFileSize) {
            die("Error: Image size less than only 1 MB.");
        }

        $uniqueFileName = uniqid() . '_' . $fileName;

        $destinationPath = $uploadDir . $uniqueFileName; 
        if (move_uploaded_file($tempFilePath, $destinationPath)) { 
            echo '<h2>Uploaded Image</h2>';  
            echo '<img src="' . $destinationPath . '" alt="Uploaded Image">';
        } else {
            die("Error: Failed to move the file.");
        }
    } else {
        die("Error: No file selected."); 
    }
} else {
    header("Location: index.html");
    exit();
}
?>
