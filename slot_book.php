<?php
// Database connection
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $disability = $_POST['disability'];
    $emergency_phno = $_POST['emergency_phno'];
    $specialist = $_POST['specialist'];
    $issue = $_POST['issue'];
    $book_slot = $_POST['book_slot'];

    // Check if the slot is booked
    if ($book_slot == "yes") {
        // Check if the available slot is greater than 0
        $avail_slot_sql = "SELECT avail_slot FROM doctors WHERE specialization = '$specialist'";
        $avail_slot_result = $conn->query($avail_slot_sql);
        if ($avail_slot_result->num_rows > 0) {
            $row = $avail_slot_result->fetch_assoc();
            $avail_slot = $row['avail_slot'];
            if ($avail_slot <= 0) {
                // If slots are unavailable, display alert
                echo "<script>alert('Slots unavailable');</script>";

            } else {
                // Update the doctor's avail_slot and token
                $sql = "UPDATE doctors SET avail_slot = avail_slot - 1, token = token + 1 WHERE specialization = '$specialist'";
                $conn->query($sql);
                // Retrieve token and slot for confirmation
                $token_sql = "SELECT token, slot FROM doctors WHERE specialization = '$specialist'";
                $result = $conn->query($token_sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $token1 = $row['token'];
                    $slot1 = $row['slot'];
                }
                header("Location: display_slot.php?name=$name&specialist=$specialist&book_slot=$book_slot&token1=$token1&slot1=$slot1");
                exit();
            }
        } else {
            echo "<script>alert('Doctor not found');</script>";
            
        }
    }



else{
    header("Location: display_slot.php?name=$name&specialist=$specialist&book_slot=$book_slot&token1=$token1&slot1=$slot1");
    
}
    // Redirect to the confirmation page
    //header("Location: display_slot.php?name=$name&specialist=$specialist&book_slot=$book_slot&token1=$token1&slot1=$slot1");
    exit();
}

$conn->close();
?>
