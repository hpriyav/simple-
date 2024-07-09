<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
    <link rel="stylesheet" href="slotdisplay.css">
</head>
<body>
<div class="bodycls">
    <h2>Appointment Confirmation</h2>
    <?php
    // Retrieve parameters from the URL
    $name = $_GET['name'];
    $specialist = $_GET['specialist'];
    $book_slot = $_GET['book_slot'];
    $token1=$_GET['token1'];
    $slot1=$_GET['slot1'];

    // Display confirmation message
    echo "<p>Appointment ";
    echo ($book_slot == "yes") ? "successful" : "unsuccessful";
    echo "</p>";
    
    // Display doctor's details if appointment successful
    if ($book_slot == "yes") {
        // Display doctor's details
        echo "<p>Doctor: $specialist</p>";
        
        // Display slot
        echo "<p>Slot:  $slot1 </p>";
        
        // Display updated token
        echo "<p>Token number: $token1 </p>";
    }
    
    ?>
</div>
</body>
</html>
