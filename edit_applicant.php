<?php
require 'Connection.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $fullName = $_POST['fullName'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $infoCreated = $_POST['infoCreated'];

    // Use prepared statement to safely update the record
    $sql = "UPDATE applicant_info SET fullName=?, age=?, address=?, gender=?, contact=?, infoCreated=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo 'Error: Unable to prepare the statement.';
        exit();
    }

    $stmt->bind_param("sssssii", $fullName, $age, $address, $gender, $contact, $infoCreated, $id);

    if ($stmt->execute()) {
        // Update successful, redirect back to content.php
        header("Location: /nf/practice01/content.php");
        exit();
    } else {
        echo 'Error: Unable to execute the statement.';
    }

    $stmt->close();
    $conn->close();
} else {
    echo 'Invalid request.';
}
?>
