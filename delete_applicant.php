<?php
require 'Connection.php';
if (isset($GET['delete'])) {
    $id = $GET['id'];

$sql = "DELETE from `applicant_info` where id = $id";
$conn->query();
}
header("location: /nf/practice01/content.php");
?>

