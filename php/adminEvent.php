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
    <link rel="stylesheet" href="../css/side-navbar.css">
    

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
    
    <div class="side-navbar">
        <ul>
            
            <li><a href="admin.php">Job Posting</a></li>
            <li><a class="active" href="adminEvent.php">Events</a></li>
            <li><a href="adminEdit.php">Edit</a></li>

        </ul>
    </div>


   <!--Start-->
   <div class="outer-box">
    <div class="basic-inner-box new-box">

            

            <?php
        $JobQuery = "SELECT * FROM `eventslide`";
        $jobResult = mysqli_query($conn, $JobQuery);    

        
    ?>
    <div class="card-header">
        <h2 class="display-6 text-center">EVENT PAGE</h2>
    </div>

    <?php if (isset($_GET['error'])): ?>
            <p><?php echo $_GET['error']; ?></p>
        <?php endif ?>
        <form action = "upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="up_image" class="form-control"><br>
            <input type="submit" name="submit" value="Upload" class="btn btn-primary">
        </form>
        <br>

            <div class="row">
                <div class="col">
                    <div class="card-mt-5">
                        
                         <div class="card-body ">
                            <table  class="table">
                                <tr>
                                <td class="text-light bg-success text-uppercase tdValue text-center" style="width:1000px">Image</td>
                                
                                    
                                    
                                <tr>
                                    <?php
                                        while($img_upload = mysqli_fetch_assoc($jobResult)){
                                    ?>
                                           
                        
                                                <td class="tdValue text-center"><img style="height:100px" src= "../uploads/<?=$img_upload['img']?>"><br>
                                            
                                                
                                               <br>
                                                    <form action="deleteSlide.php" method="POST">
                                                        <input type="text" name="slideId" value="<?php echo $img_upload['id'];?>" style="display:none;">
                                                        <input type="submit" value="Delete" name="delete" class="delete btn btn-danger">
                                                    </form>
                                                </td>
                                        
                                </tr>
                                    <?php
                                                
                                        }
                                    ?>
                                
                            </table>
                         </div>
                    </div>
                </div>
            </div>

            

        

    </div>
    </div>
    </div>

  

   
   

        <div class="basic-inner-box box">

        <form action="editEvent.php" method="post" >
            
        

            <label for="header">Event Header:</label><br>
            <input type="text" name="header" id="header" class="form-control fr"><br>

            

            <label for="eventDescription">Description:</label>
            <textarea name="eventDescription" id="eventDescription" cols="20" rows="3" class="form-control fr" placeholder="Enter event page description"></textarea><br>
            

            
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            


        </form>


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
   
    
</body>
</html>