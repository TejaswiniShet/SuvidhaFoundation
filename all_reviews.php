<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Reviews</title>
  <style>
    /* Scope styles by adding a class to the body */
    .all-reviews-page {
      font-family: Arial, sans-serif;
      background-image: url('images/bg.png'); /* Add your image path here */
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      padding: 20px;
      position: relative;
    }

    /* Whitish transparent overlay on the background for this page */
    .all-reviews-page::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(255, 255, 255, 0.4); /* Whitish transparent overlay */
      z-index: -1; /* Ensure the overlay is behind all content */
    }

    .all-reviews-page h2 {
      text-align: center;
      color: white;
      font-size: 30px;
      margin-bottom: 20px;
    }

    .all-reviews-page #reviews-container {
      display: flex;
      flex-direction: column; /* Stack cards vertically */
      align-items: center; /* Center align each card */
      max-width: 1200px;
      margin: 0 auto;
    }

    .all-reviews-page .review-card {
      background-color: #fff; /* Solid white background for the cards */
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 80%; /* Reduce card width for left/right margin */
      height: 200px; /* Fixed height */
      margin: 20px 0; /* Space between cards */
      padding: 20px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      box-sizing: border-box; /* Ensures proper box-sizing for consistent layout */
    }

    .all-reviews-page p {
      font-size: 20px;
      line-height: 1.5;
      color: #555;
      margin-bottom: 15px;
    }

    .all-reviews-page p strong {
      color: #000;
    }

    /* Additional styles for responsiveness */
    @media (max-width: 900px) {
      .all-reviews-page .review-card {
        width: 90%; /* Adjust card width for smaller screens */
      }
    }

    @media (max-width: 600px) {
      .all-reviews-page .review-card {
        width: 100%; /* Full width for mobile screens */
      }
    }
  </style>
</head>
<body class="all-reviews-page">

  <h2>All Reviews</h2>
  <div id="reviews-container">
<?php
include 'db_connect.php';

// Fetch all reviews from the database, ordered by the latest ones
$result = $conn->query("SELECT `name`, review FROM reviews ORDER BY created_at DESC");

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="review-card">';
    echo "<p><strong>" . htmlspecialchars($row['name']) . ":</strong> " . htmlspecialchars($row['review']) . "</p>";
    echo '</div>';
  }
} else {
  echo "<p>No reviews available.</p>";
}
?>

  </div>

</body>
</html>
