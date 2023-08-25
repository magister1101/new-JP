<?php
    session_start();

    include 'config.php';

    $userId = $_SESSION['id'];
    

    $header = addslashes($_POST['header']);
    $eventDescription = addslashes($_POST['eventDescription']);

    

    if($header != ""){
        $queryHeader = "UPDATE `event` SET `name`='$header' WHERE `type`='header'";
        $insertHeader = mysqli_query($conn, $queryHeader);
    }

    if($eventDescription != ""){
        $queryED = "UPDATE `event` SET `name`='$eventDescription' WHERE `type`='eventDescription'";
        $insertED = mysqli_query($conn, $queryED);
    }

    

    




    header('location:adminEvent.php');





?>