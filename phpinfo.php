<?php
phpinfo();
exit;
// Database connection settings  12211 45
// $servername = "localhost";
// $username = "zaronlive";
// $password = "Zaronlive@54321$";
// $dbname = "zaronlive";

// // Create a connection to the database
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check if the connection was successful
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // Query to fetch product images from the database
// $sql = "SELECT * FROM `product_images` WHERE deleteid=0";
// $result = $conn->query($sql);

// // Check if there are any images to process
// if ($result->num_rows > 0) {
//     // Directory paths
//     $sourceDir = 'uploads/'; // Path to your current image folder
//     $destinationDir = 'uploadsimg/'; // Path to the target folder where you want to copy the images

//     // Loop through each image and copy it to the target folder
//     while ($row = $result->fetch_assoc()) {
//         $imagePath = $row['product_image']; // Assuming this field contains the image filename or relative path

//         // Full source and destination paths
//         $sourceFile = $imagePath;
//           $id = $row['id'];

//          $imagePathset=str_replace('uploads/', '', $imagePath);
//          $destinationFile = $destinationDir . $imagePathset;
       

//         // Check if the source file exists before copying
//         if (file_exists($sourceFile)) {
//             if (copy($sourceFile, $destinationFile)) {
//                 echo "Image copied successfully: " . $id . "<br>";
//             } else {
//                 echo "Failed to copy image: " . $imagePath . "<br>";
//             }
//         } else {
//             echo "Source file does not exist: " . $sourceFile . "<br>";
//         }
//     }
// } else {
//     echo "No images found in the database.";
// }

// Close the database connection
$conn->close();
?>