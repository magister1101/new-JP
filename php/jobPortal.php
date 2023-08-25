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
    <link rel="stylesheet" href="../css/jobPortal.css">


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

        $Jresult = mysqli_query($conn, "SELECT * FROM `category` WHERE `type` = 'category' order by 'id' desc"); 
    ?>
    
    <div class="basic-inner-box job-box">

        <!--Search-->

        <div class="filters">
                <div class="filter-word" style="float:left;">
                    <h2 class="filter-word">Category:</h2>
                </div>
                <br><br>
                <?php
                    while($Jrows = mysqli_fetch_assoc($Jresult)){
                ?>
                    <a href="jobPortal.php?filter=<?php echo $Jrows['name'] ?>" name="filter" value="<?php echo $Jrows['name'] ?>" class="btn btn-info"><?php echo $Jrows['name'] ?></a>
                        
                <?php
                    }
                ?>
                    <a href="jobPortal.php?filter=" name="filter" value="" class="btn btn-secondary">Clear</a>
        </div>
        </div>
        
        <!--Jobs-->
        <div class="job-job">

        <?php
        
            $filter = $_GET['filter'];

            $JobQuery = "SELECT * FROM `job` ORDER BY `id` desc";
            $jobResult = mysqli_query($conn, $JobQuery);     
            
            function custom_echo($x, $length){

                if(strlen($x)<=$length)
                {
                    echo $x;
                }
                else
                {
                    $y=substr($x,0,$length) . '...';
                    echo $y;
                }
                
            }
            
            while($jobRow = mysqli_fetch_assoc($jobResult)){

                
                if($filter == $jobRow['jobCategory']){

        ?>
                
                <a class="jobClick" name="jobClick" href="jobDetails.php?jobClick=<?php echo $jobRow['id']?>" style="text-decoration: none;">
                        <div class="job-panel">

                            <h6 style="float:right">Location: <?php echo $jobRow['location'] ?> | Job Type: <?php echo $jobRow['jobType'] ?> | <?php echo $jobRow['datePosted'] ?></h6>
                            <h1 style="width:50%" class="jobName"> <?php echo $jobRow['jobName']?> | <?php echo $jobRow['companyName']?></h1>
                            <h2 class="location-style"> </h2>
                            <hr>
                            <h4><u>Job Description:</u> 
                            <br>
                            <?php custom_echo($jobRow['description'], 200); ?>
                            </h4>
                        </div>
                    </a>
        <?php
                }
                else if($filter == ""){
            
        ?>
                    <a class="jobClick" name="jobClick" href="jobDetails.php?jobClick=<?php echo $jobRow['id']?>" style="text-decoration: none;">
                        <div class="job-panel">

                            <h6 style="float:right">Location: <?php echo $jobRow['location'] ?> | Job Type: <?php echo $jobRow['jobType'] ?> | <?php echo $jobRow['datePosted'] ?></h6>
                            <h1 style="width:50%" class="jobName"><div class="job-name"> <?php echo $jobRow['jobName']?></div> | <?php echo $jobRow['companyName']?></h1>
                            <h2 class="location-style"> </h2>
                            <hr>
                            <h4><u>Job Description:</u> 
                            <br>
                            <?php custom_echo($jobRow['description'], 200); ?>
                            </h4>
                        </div>
                    </a>

                    <?php
                }
            }   
                    ?>



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