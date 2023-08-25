<?php 

    session_start();
    include 'config.php';

    $jobId = $_POST['jobId'];

    echo $jobId;

    $JobQueryDelete = "DELETE FROM `job` WHERE `id` = '$jobId'";
    $jobResultDelete = mysqli_query($conn, $JobQueryDelete); 

    echo "<script>alert('JOB POST DELETED')</script>";
    echo "<script>location.href='admin.php'</script>";

    
?>