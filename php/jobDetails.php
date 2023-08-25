<?php
    error_reporting(0);
    session_start();
    include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Universal CSS-->
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/basic.css">

    <!--Specific CSS-->
    <link rel="stylesheet" href="../css/jobDetails.css">


    <title>Job Placement</title>
</head>
<body>
    <nav>
        <div class="nav-links">

                

            <ul class = "navigation">
                
                <a href="index.php"><img src="../img/cvsulogo.png" class="nav-img"></a>
                
                <li><a href="jobPortal.php">Job Portal</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="index.php">Home</a></li>

            </ul>
        </div>
    </nav>

    
<!---->
    <?php

        $jobClick = $_GET['jobClick'];


        $JobQuery = "SELECT * FROM `job` WHERE id = '$jobClick'";
        $jobResult = mysqli_query($conn, $JobQuery); 
        $jobRow = mysqli_fetch_assoc($jobResult);
                    


    ?>


    <div class="basic-inner-box box-inner" >  
    <a href="jobPortal.php" type="button" class="btn btn-warning back-btn">Back</a>
        <div class="box">
        
           
        <h1 class="title"><?php echo $jobRow["jobName"]?></h1>
        <div class="row">
            <div class="column left">
                <h4 class="company"><?php echo $jobRow["companyName"]?></h4>
                
            </div>
            <div class="column right">
                <h4><?php echo $jobRow["location"]?> | <?php echo $jobRow["datePosted"]?></h4>
            </div>

            <hr>

            <div class="">
                <h2>Job Description:</h2>
                <h4 class="description"><?php echo $jobRow["description"]?></h4>
                
            </div>

            <hr>

            
            <div class="features">
                <h2>Job Features:</h2>
                <table class="table table-bordered">

                <?php
                    if($jobRow["jobType"] != ""){
                ?>
                    <tr>
                        <td class="text-light bg-success text-uppercase tdTitle">Job Type</td>
                        <td class="text-uppercase tdValue"><?php echo $jobRow["jobType"]?></td>
                    </tr>
                <?php
                    }
                    if($jobRow["jobCategory"] != ""){
                ?>
                    <tr>
                        <td class="text-light bg-success text-uppercase tdTitle">Job Category</td>
                        <td class="text-uppercase tdValue"><?php echo $jobRow["jobCategory"]?></td>
                    </tr>
                <?php
                    }
                    if($jobRow["salary"] != ""){
                ?>
                    <tr>
                        <td class="text-light bg-success text-uppercase tdTitle">Salary</td>
                        <td class="text-uppercase tdValue"><?php echo $jobRow["salary"]?></td>
                    </tr>
                <?php
                    }
                    if($jobRow["link"] != ""){
                ?>
                    <tr>
                        <td class="text-light bg-success text-uppercase tdTitle">Link</td>
                        <td class="text-uppercase tdValue"><?php echo $jobRow["link"]?></td>
                    </tr>
                <?php
                    }
                    if($jobRow["email"] != ""){
                ?>
                    <tr>
                        <td class="text-light bg-success text-uppercase tdTitle">Contact Email</td>
                        <td class="tdValue"><?php echo $jobRow["email"]?></td>
                    </tr>
                <?php
                    }
                    if($jobRow["deadline"] != "0000-00-00"){
                ?>
                    <tr>
                        <td class="text-light bg-success text-uppercase tdTitle">Deadline</td>
                        <td class="tdValue"><?php echo $jobRow["deadline"]?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>

                <br>
                <br>
            </div>
            
        </div>
        </div>
            
    </div>

    
    
    

        

<!---->

    <div class="footer-basic">
        <footer>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.php">Home</a></li>
                <li class="list-inline-item"><a href="events.php">Events</a></li>
                <li class="list-inline-item"><a href="jobPortal.php">Job Portal</a></li>

                <!--add if else to admin, if admin is not login stay as "admin", else if login then replace with "logout"-->

            <?php
                $id = $_SESSION['id'];

                $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE `id` = '$id'"); //gets the info that matches the id from the database
                $rows = mysqli_fetch_assoc($result); //fetches the result and stores them

                if(isset($_SESSION['id'])){ //checks if the user is already logged in by checking if session(id) is set.


            ?>
                <li class="list-inline-item"><a href="admin.php">Admin</a></li>
                <li class="list-inline-item"><a href="logout.php">Logout</a></li>
            <?php
                }
                else{
            ?>
                <li class="list-inline-item"><a href="loginPage.php">Admin</a></li>
            <?php
                } 
            ?>

            </ul>
            <p class="copyright">CvSU © 2023</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>


</body>
</html>