<?php
// Include database connection
include 'db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $conn->real_escape_string($_POST['name']);
    $review = $conn->real_escape_string($_POST['review']);
    
    // Insert the review into the database
    $sql = "INSERT INTO reviews (name, review) VALUES ('$name', '$review')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New review added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Redirect back to the review page
    header("Location: index.php");
}
?>
