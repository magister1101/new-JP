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
    <link rel="stylesheet" href="../css/edit.css">
    

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
            <li><a href="adminEvent.php">Events</a></li>
            <li><a class="active" href="adminEdit.php">Edit</a></li>

        </ul>
    </div>


   <!--Start-->

  

   <div class="outer-box">
    <div class="basic-inner-box box">

            <div class="card-header">
                <h2 class="display-6 text-center">EDIT ADMIN</h2>
            </div>

        <form action="editEdit.php" method="post" >

            <label for="jobName">Add Class Name:</label><br>
            <input type="text" name="jobName" id="jobName" class="form-control fr" placeholder="Enter Job Name to add"><br>
            
            <label for="addTo">Add To:</label><br>
            <select id="addTo" name="addTo" class="form-select fr" required>

                <option value="jobType">Job Type</option>
                <option value="category">Job Category</option>

            </select><br>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            


        </form>


    </div>
    </div>

    <div class="outer-box">
    <div class="basic-inner-box new-box">

            

            <?php
        $JobQuery = "SELECT * FROM `category` order by `type` ASC";
        $jobResult = mysqli_query($conn, $JobQuery);    
    
    ?>
            <div class="row">
                <div class="col">
                    <div class="card-mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center">VALUES</h2>
                        </div>
                         <div class="card-body ">
                            <table  class="table table-bordered tabler">
                                <tr>
                                <td class="text-light bg-success text-uppercase tdValue text-center">Job Name</td>
                                <td class="text-light bg-success text-uppercase tdValue text-center">Class</td>
                                <td class="text-light bg-success text-uppercase tdValue text-center tdValue-delete">Delete</td>
                                    
                                    
                                <tr>
                                    <?php
                                        while($jobRow = mysqli_fetch_assoc($jobResult)){
                                    ?>
                                           
                        
                                                <td class="tdValue"><?php echo $jobRow['name']?></td>
                                                <td class="tdValue " ><?php echo $jobRow['type']?></td>

                                                
                                                
                                                <td class="tdValue tdValue-delete">
                                                    <form action="deleteJob.php" method="POST">
                                                        <input type="text" name="jobId" value="<?php echo $jobRow['id'];?>" style="display:none;">
                                                        <input type="submit" value="Delete" name="delete" class="delete">
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