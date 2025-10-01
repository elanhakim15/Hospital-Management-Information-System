<?php
include 'newfunc.php';

if(isset($_GET['ID'])){
    $id = $_GET['ID'];
    $query = "DELETE FROM ludb WHERE ID = $id";
    $result = mysqli_query($con, $query);
    if(!$result) {
        die("Query Failed.");
    }
  
    // $_SESSION['message'] = 'Task Removed Successfully';
    // $_SESSION['message_type'] = 'danger';
    echo '<script>';
    echo 'alert("Record deleted successfully!");';
    echo 'window.location.href = "admin-panel1.php";'; // Redirect to admin panel
    echo '</script>';
}