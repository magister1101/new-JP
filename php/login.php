<?php
    session_start();

    include 'config.php';

    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE `email` = '$inputEmail'"); //gets the info that matches the email from the database
    $rows = mysqli_fetch_assoc($result); //fetches the result and stores them

    //grabs the data from the table and stores them in a variable
    $id = $rows["id"]; 
    $email = $rows["email"];
    $password = $rows["password"];

    if(isset($_SESSION['id'])){ //checks if the user is already logged in by checking if session(ID) is set.

        echo"<script>location.href='index.php'</script>";

    }
    else{
        
        if($inputEmail == $email && $inputPassword == $password){
            $_SESSION['id'] = $id; //puts the ID into a universal session that checks every page if it is logged in or not
            echo"<script>location.href='admin.php'</script>"; //proceeds to admin page

        }
        else{

            echo "<script>alert('email or password incorrect')</script>";
            echo "<script>location.href='loginPage.php'</script>";

        }
    }




?>