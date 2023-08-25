<?php
    include "config.php";
    session_start();

    if(isset($_POST['submit']) && isset($_FILES['up_image'])){
        echo "<pre>";
        print_r($_FILES['up_image']);
        echo "</pre";
    }

    $img_name = $_FILES['up_image']['name'];
    $img_size = $_FILES['up_image']['size'];
    $tmp_name = $_FILES['up_image']['tmp_name'];
    $error = $_FILES['up_image']['error'];

    if($error==0){
        if($img_size > 999999999){ //by bytes ung size
            $em = "Sorry, your picture is too large.";
            header("Location: adminEvent.php?error=$em");
        }
        else{
            $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);//echo($img_ext);// to get the extension name
            $img_ext_lc = strtolower($img_ext);//after getting the extension name it will convert into string..

            $allowed_ext = array("png", "jpg", "jpeg", "gif");//allowed extension only
            if(in_array($img_ext_lc, $allowed_ext)){//if tama ung file type gagana tong condition if hindi diretso else
                $new_img_name = uniqid("Event-", true).'.'.$img_ext_lc; //creating a new img name
                $img_up_path = '../uploads/'.$new_img_name; //creating a path para sa iiupload na images
                move_uploaded_file($tmp_name, $img_up_path);//passing the variables into a one variable para sa path

                //insert function to database...
                $ins = "INSERT INTO eventslide(img) VALUES ('$new_img_name')";
                    mysqli_query($conn, $ins);

                $que = "SELECT * from eventslide WHERE img = '$new_img_name'";
                $queres = mysqli_query($conn, $que);
                $row = mysqli_fetch_assoc($queres);
                $img_id = $row['id'];
                $_SESSION['imgidname'] = $img_id;
                $_SESSION['imgname'] = $new_img_name;
                header("Location: adminEvent.php");
            
            }
            else{
                $em = "You can`t upload this file type.";
                    header("Location: adminEvent.php?error=$em");
            }
        } 
    }
    else{
        $em = "Unknown Error occured!";
        header("Location: adminEvent.php?error=$em");
    }
?>