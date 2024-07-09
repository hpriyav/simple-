<html>
    

<?php

session_start();

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
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        echo "<script>alert('Login successfull');</script>";
        
        header("Location: button_page.html");
        exit();
    } else {
        $error = "Invalid username or password";
        echo $error;
    }
}

$conn->close();
?>
</html>