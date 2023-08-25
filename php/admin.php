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
    <link rel="stylesheet" href="../css/admin.css">
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
            
            <li><a class="active" href="admin.php">Job Posting</a></li>
            <li><a href="adminEvent.php">Events</a></li>
            <li><a href="adminEdit.php">Edit</a></li>

        </ul>
    </div>

    

    <div class="outer-box">
    <div class="basic-inner-box box">

            <div class="card-header">
                <h2 class="display-6 text-center">POST JOB</h2>
            </div>

        <form action="postJob.php" method="post" >

            <label for="jobName">Job Name:</label><br>
            <input type="text" name="jobName" id="jobName" class="form-control fr" required><br>
            <label for="companyName">Company Name:</label><br>
            <input type="text" name="companyName" id="companyName" class="form-control fr" required><br>
            <label for="location">Location:</label><br>
            <input type="text" name="location" id="location" class="form-control fr" required><br>


            <label for="jobType">Job Type:</label><br>
            <select id="jobType" name="jobType" class="form-select fr" required>
            <?php //updates jobTyle selection from the database
                 $jobTypeQuery = "SELECT * FROM `category` where `type` =  'jobType' ORDER BY `id` desc";
                 $jobTypeResult = mysqli_query($conn, $jobTypeQuery);    
     
                 
     
                 while($jobTypeRow = mysqli_fetch_assoc($jobTypeResult)){
            ?>

                <option value="<?php echo $jobTypeRow['name'] ?>"><?php echo $jobTypeRow['name'] ?></option>

            <?php
                 }
            ?>
            </select><br>


            <label for="jobCategory">Job Category:</label><br>
            <select id="jobCategory" name="jobCategory" class="form-select fr" required>

            <?php //updates category selection from the database
                 $categoryQuery = "SELECT * FROM `category` where `type` =  'category' ORDER BY `id` desc";
                 $categoryResult = mysqli_query($conn, $categoryQuery);    
     
                 
     
                 while($categoryRow = mysqli_fetch_assoc($categoryResult)){
            ?>

                <option value="<?php echo $categoryRow['name'] ?>"><?php echo $categoryRow['name'] ?></option>

            <?php
                 }
            ?>
            </select><br>




            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="20" rows="3" class="form-control fr" placeholder="Enter job description" required></textarea>


            <label for="email">Contact Email:</label><br>
            <input type="email" name="email" id="email" class="form-control fr"><br>

            <label for="salary">Salary:</label><br>
            <input type="text" name="salary" id="salary" class="form-control fr"><br>

            <label for="link">Link:</label><br>
            <input type="text" name="link" id="link" class="form-control fr"><br>

            <label for="deadline">Deadline:</label><br>
            <input type="date" name="deadline" id="deadline" pattern="\d{4}-\d{2}-\d{2}" class="form-control fr"><br>


            <button type="submit" name="submit" class="btn btn-primary">Post Job</button>
            


        </form>


    </div>
    </div>


    <div class="basic-inner-box jobs">

    <?php
        $JobQuery = "SELECT * FROM `job`";
        $jobResult = mysqli_query($conn, $JobQuery);    
    
    ?>
            <div class="row">
                <div class="col">
                    <div class="card-mt-5">
                        <div class="card-header">
                            <h2 class="display-6 text-center">JOB POSTED</h2>
                        </div>
                         <div class="card-body">
                            <table  class="table-bordered ">
                                <tr>
                                <td class="text-light bg-success text-uppercase tdValue">Job Name</td>
                                <td class="text-light bg-success text-uppercase tdValue">Company Name</td>
                                <td class="text-light bg-success text-uppercase tdValue">Location</td>
                                <td class="text-light bg-success text-uppercase tdValue">Date Posted</td>
                                <td class="text-light bg-success text-uppercase tdValue">Job Type</td>
                                <td class="text-light bg-success text-uppercase tdValue">Job Category</td>
                                <td class="text-light bg-success text-uppercase tdValue">Email</td>
                                <td class="text-light bg-success text-uppercase tdValue">Salary</td>
                                <td class="text-light bg-success text-uppercase tdValue">Description</td>
                                <td class="text-light bg-success text-uppercase tdValue">Link</td>
                                <td class="text-light bg-success text-uppercase tdValue">Delete</td>
                                    
                                    
                                <tr>
                                    <?php
                                        while($jobRow = mysqli_fetch_assoc($jobResult)){
                                    ?>
                                           
                        
                                                <td class="tdValue"><?php echo $jobRow['jobName']?></td>
                                                <td class="tdValue"><?php echo $jobRow['companyName']?></td>
                                                <td class="tdValue"><?php echo $jobRow['location']?></td>
                                                <td class="tdValue"><?php echo $jobRow['datePosted']?></td>
                                                <td class="tdValue"><?php echo $jobRow['jobType']?></td>
                                                <td class="tdValue"><?php echo $jobRow['jobCategory']?></td>
                                                <td class="tdValue"><?php echo $jobRow['email']?></td>
                                                <td class="tdValue"><?php echo $jobRow['salary']?></td>
                                                <td class="tdValue"><?php echo $jobRow['description']?></td>
                                                <td class="tdValue"><?php echo $jobRow['link']?></td>
                                                
                                                <td class="tdValue">
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