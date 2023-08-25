<?php
    session_start();

    include 'config.php';

    $userId = $_SESSION['id'];
    

    $jobName = $_POST['jobName'];
    $addTo = $_POST['addTo'];
    

    
    $queryHeader = "INSERT INTO `category`(`name`, `type`) VALUES ('$jobName','$addTo')";
    $insertHeader = mysqli_query($conn, $queryHeader);
    

   
    

    




    header('location:adminEdit.php');





?>