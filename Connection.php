<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "airforce";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//Display
$sql="SELECT *  FROM applicant_info";
$result=$conn->query($sql);

if(!$result){
    die("Invalid query".$conn->error);
}

if (isset($_POST['submit'])) {
    // Retrieve data from form inputs
    $fullName = $_POST['fullName'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $gender = $_POST['gender']; 
    $contact = $_POST['contact'];
    $infoCreated = $_POST['infoCreated']; 

    // Use prepared statements to safely insert data
    $sql = "INSERT INTO applicant_info (fullName, age, address, gender, contact, infoCreated) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in preparing the statement: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("sissii", $fullName, $age, $address, $gender, $contact, $infoCreated);

    if ($stmt->execute()) {
       header("location: /nf/practice01/content.php");
        
    } else {
        die("Error in executing the statement: " . $stmt->error);
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}


?>