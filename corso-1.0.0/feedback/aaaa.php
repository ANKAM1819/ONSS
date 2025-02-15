<?php
// Database connection settings
include '../includes/connection.php';

// Process the form data after submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $suggestions = $conn->real_escape_string($_POST['suggestions']);

    // SQL query to insert the data into the `feedback` table
    $sql = "INSERT INTO feedback (name, email, suggestions) VALUES ('$name', '$email', '$suggestions')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        // Alert message and redirect back to the same page
        echo "<script>
            alert('Feedback submitted successfully!');
            window.location.href = 'aaaa.php'; // Change to your feedback form page URL
        </script>";
    } else {
        // Error message and redirect back to the same page
        echo "<script>
            alert('Error: " . $conn->error . "');
            window.location.href = 'aaaa.php'; // Change to your feedback form page URL
        </script>";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="s.css">
</head>
<body>
    <div class="feedback-wrapper">
        <form action="" method="POST">
            <div class="feedback-title">Rate your experience</div>
            <div class="feedback-content">We highly value your feedback! Kindly take a moment to rate your experience and provide us with your valuable feedback.</div>

            <!-- Name field -->
            <div class="feedback-name-box">
                <label for="feedback-name">Name:</label>
                <input type="text" id="feedback-name" name="name" placeholder="Your Name" required />
            </div>

            <!-- Email field -->
            <div class="feedback-email-box">
                <label for="feedback-email">Email:</label>
                <input type="email" id="feedback-email" name="email" placeholder="Your Email" required />
            </div>

            <!-- Rating stars -->
            <div class="feedback-rate-box">
                <input type="radio" name="rating" id="feedback-star0" value="1" />
                <label class="feedback-star" for="feedback-star0"></label>
                <input type="radio" name="rating" id="feedback-star1" value="2" />
                <label class="feedback-star" for="feedback-star1"></label>
                <input type="radio" name="rating" id="feedback-star2" value="3"  />
                <label class="feedback-star" for="feedback-star2"></label>
                <input type="radio" name="rating" id="feedback-star3" value="4" />
                <label class="feedback-star" for="feedback-star3"></label>
                <input type="radio" name="rating" id="feedback-star4" value="5" checked="checked"/>
                <label class="feedback-star" for="feedback-star4"></label>
            </div>

            <!-- Suggestions field -->
            <label for="feedback-comment">Suggestions</label>
            <textarea cols="30" rows="6" name="suggestions" placeholder="Tell us about your experience!" required></textarea>

            <!-- Submit button -->
            <button type="submit" class="feedback-submit-btn">Send</button>
        </form>
    </div>
</body>
</html>
