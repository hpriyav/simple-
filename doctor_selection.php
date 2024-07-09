<?php

 $servername = "localhost";
 $username = "root";
 $password = "vaishu23";
 $dbname = "medical";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);

 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
// Check if a specific button was clicked
if (isset($_POST['Cardiologist']) || isset($_POST['Dermatologist']) || isset($_POST['Dentist'])
|| isset($_POST['Gynaecologist'])|| isset($_POST['Pediatrician'])|| isset($_POST['Neurologist'])|| isset($_POST['General']) || isset($_POST['Endocrinologist'])) {
    
    // Get the value of the button clicked
    $specialization = "";
    if (isset($_POST['Cardiologist'])) {
        $specialization = "Cardiologist";
    } elseif (isset($_POST['Dermatologist'])) {
        $specialization = "Dermatologist";
    } elseif (isset($_POST['Dentist'])) {
        $specialization = "Dentist";
    } elseif (isset($_POST['Gynaecologist'])) {
        $specialization = "Gynaecologist";
    } elseif (isset($_POST['Pediatrician'])) {
        $specialization = "Pediatrician";
    } elseif (isset($_POST['Neurologist'])) {
        $specialization = "Neurologist";
    } elseif (isset($_POST['General'])) {
        $specialization = "General";
    }elseif (isset($_POST['Endocrinologist'])) {
        $specialization = "Endocrinologist";
    } 

    $sql = "SELECT * FROM doctors WHERE specialization = '$specialization'";
    $result = mysqli_query($conn, $sql);
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctor Selection</title>
        <link rel="stylesheet" href="doc_display.css">
    </head>
    <body>';

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Slot</th><th>Specialization</th><th>Available slots</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['doctor_name'] . "</td><td>". $row['slot'] . "</td><td>" . $row['specialization'] . "</td><td>".$row['avail_slot'] . "</td></tr>";
            
        }
        echo "</table>";
        echo "<a href='general_form.html'><button>Book appointment</button></a>";
    } else {
        echo "No doctors found for the selected specialization.";
    }
    echo '</body>
    </html>';
}
?>
