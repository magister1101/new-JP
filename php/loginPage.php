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
    <link rel="stylesheet" href="../css/login.css">
    

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

    

    <div class="body ">
        <div class="basic-inner-box box">
            <div class="reg-box">
                <form action="login.php" method="post">

                    <div id="login" style="display: block; margin-bottom: 5%;">

                        <h1 style="margin-bottom: 5%;" >Admin Login</h1>

                        <form action="login.php" method="post">

                            <div style="text-align: justify; margin-bottom: 2%;">
                                
                                
                                    <label for="" style="margin-left: 1%;">Email:</label>
                                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter your Email" style="margin-bottom: 2%; margin: 1%; width: 98%;" required>

                                    <label for="" style="margin-left: 1%;">Password:</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" style="margin-bottom: 2%; margin: 1%; width: 98%;" required>

                                                      
                            </div>

                            <div class="innerfirstreg" style="text-align: justify; display: flex; flex-direction: row;">
                                
                                <div style="width: 50%; margin: 1%;">
                                    <button type="submit" class="btn btn-warning" id="" >Login</button>
                            </div>
                            
                        </div>
                        
                        </form>
                    </div>
                </form>
            </div>
        </div>
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
   
    
</body>
</html>