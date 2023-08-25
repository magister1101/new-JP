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
    <link rel="stylesheet" href="../css/index.css">


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

    <div class="underPic">
        
    </div>

    <div class="basic-inner-box title">
        <h1>CvSU Job Placement</h1>
    </div>

    <div class="basic-inner-box mission-vision">
        <div class="row">
            <div class="column">
                <h1> Mission</h1>
                <p class="grey-text">To empower students and graduates of Cavite State University with comprehensive job placement support, equipping them with the necessary skills, resources, and connections to confidently navigate the professional world. We are committed to fostering partnerships with industries, promoting career development, and ensuring a seamless transition from education to employment, thereby contributing to the growth and success of our graduates and the broader community.</p>
            </div>
            <div class="column">
                <h1>Vision</h1>
                <p class="grey-text">Our vision is to be a pioneering and influential force in connecting the talents of Cavite State University's students and graduates to meaningful and rewarding career opportunities. We aspire to cultivate a dynamic ecosystem where academic excellence aligns seamlessly with the demands of the job market, creating a lasting impact on individuals, businesses, and society at large. Through innovation, collaboration, and continuous improvement, we aim to be the benchmark for effective job placement strategies and solutions in higher education.</p>
            
            </div>
        </div>
    </div>

    <div class="enter">
        <a href="jobPortal.php" class="btn btn-outline-primary enter-btn">Enter Job Portal</a>
    </div>


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