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

    <?php
        $eventHeaderResult = mysqli_query($conn, "SELECT * FROM `event` WHERE `type`='header' ");
        $eventHeaderRow = mysqli_fetch_assoc($eventHeaderResult);

    
    ?>

    <!--Universal CSS-->
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/basic.css">

    <!--Specific CSS-->
    <link rel="stylesheet" href="../css/slide.css">
    <link rel="stylesheet" href="../css/event.css">


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

    
    <!--Start-->

    <br>
    <div class="basic-inner-box text-center box">

            <h1><?php echo $eventHeaderRow["name"] ?></h1>
        

        <div class="slideshow-container">

            <?php

                $count = "SELECT COUNT(id) as total FROM eventslide";
                $countResult = mysqli_query($conn, $count);
                $num_rows = mysqli_num_rows($countResult);
                

                $img_name = $_SESSION['imgname'];
                $img = "SELECT * FROM eventslide ORDER BY `id` desc";
                $res = mysqli_query($conn, $img);
                $counter = 1;

                if (mysqli_num_rows($res) > 0 ){
                    while ($img_upload = mysqli_fetch_assoc($res)) {    
                        
                        $counter++;
                        

                        
                    ?>
                
                    
                <div class="mySlides fade">
                <img class="slidesImage" src= "../uploads/<?=$img_upload['img']?>"> <!--must be able toa add/delete image-->
                <div class="text">©: cctto</div>
                </div>

                

            <?php
                
                    } 
                }
                $counter--;
            
                        
        
            ?>

         

        </div>
            <br>

            <div style="text-align:center">

            <?php
                
                
                for ($x = 1; $x <= $counter; $x++) {
                        
                    ?>
                        <span class="dot"></span> 
                        
                    <?php
                  }
            ?>
            
            
            

            </div>

            
            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                
                const row_number = "<?php echo $num_rows; ?>";
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                
                slideIndex++;
                
                if (slideIndex > slides.length) {slideIndex = 1}    
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                }
                
                
                    slides[slideIndex-1].style.display = "block";  
                    dots[slideIndex-1].className += " active";
                    setTimeout(showSlides, 1500); // Change image 1000 = 1sec
                
                }
            </script>

            

                <?php
                    $eventDescResult = mysqli_query($conn, "SELECT * FROM `event` WHERE `type`='eventDescription' ");
                    $eventDescrRow = mysqli_fetch_assoc($eventDescResult);
                ?>
            <p class="eventDesc"><?php echo $eventDescrRow["name"] ?></p>

        </div>
    </div>


    <!--End-->


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