<?php
    session_start();

    include 'config.php';

    $userId = $_SESSION['id'];
    $resultEmployer = mysqli_query($conn, "SELECT * FROM `admin` WHERE `id` = '$userId'");
    $rowsEmployer = mysqli_fetch_assoc($resultEmployer);

    $jobName = addslashes($_POST['jobName']);
    $companyName = addslashes($_POST['companyName']);
    $location = addslashes($_POST['location']);
    $jobType = addslashes($_POST['jobType']);
    $jobCategory = addslashes($_POST['jobCategory']);
    $description = addslashes($_POST['description']);
    $email = addslashes($_POST['email']);
    $salary = addslashes($_POST['salary']);
    $link = addslashes($_POST["link"]);
    $deadline = addslashes($_POST["deadline"]);

    $newDeadline = str_replace('/', '-', $deadline);

    $dateOfCreation = date("Y-m-d");


    $query = "INSERT INTO `job`(`jobName`, `companyName`, `location`, `datePosted`, `description`, `jobType`, `jobCategory`, `email`, `salary`, `link`, `deadline`) VALUES 
    ('$jobName','$companyName','$location','$dateOfCreation','$description','$jobType','$jobCategory','$email','$salary','$link','$newDeadline')";
    $insertJob = mysqli_query($conn, $query);

    header('location:admin.php');





?>