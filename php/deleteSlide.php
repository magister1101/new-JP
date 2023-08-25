<?php 

    session_start();
    include 'config.php';

    $jobId = $_POST['slideId'];

    echo $jobId;

    $JobQueryDelete = "DELETE FROM `eventSlide` WHERE `id` = '$jobId'";
    $jobResultDelete = mysqli_query($conn, $JobQueryDelete); 

    echo "<script>alert('EVENT IMAGE DELETED')</script>";
    echo "<script>location.href='adminEvent.php'</script>";

    
?>