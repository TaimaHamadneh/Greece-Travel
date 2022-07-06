<?php

if(isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['newPass'])){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $newPass=$_POST['newPass'];

    try{
        $db=new mysqli('localhost','root','','tourist');
        $qryStr="select * from signup ";
        $res=$db->query($qryStr);
        for($i=0; $i<$res->num_rows;$i++){
            $row=$res->fetch_object();
            if($row->Email==$email&&$pass==$newPass){
                $up=" UPDATE `signup` SET `password` ='$newPass' WHERE `Email` = '$email' ; ";
                $res=mysqli_query($db,$up);
                header("location:SignUpPage.html");

            }
            else{
                header("location:forgetPassword.php?TheEmailIsRongeOrTheTowPasswordDifferent");

            }


        }
        $db->close();
    }
    catch (Exception $e){
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="signUpStyle.css" />
    <title>Sign in & Sign up Form</title>
</head>

<body>

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="forgetPassword.php" method="post" class="sign-in-form">
                <h2 class="title">Forget Pssword</h2>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" name="email"  >
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Enter New Password" required="required" name="pass" />
                </div>

                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Ensure New Password " required="required"name="newPass" />
                </div>

                <input type="submit" value="Change Password" class="btn solid" />

            </form>

        </div>
    </div>


    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New here ?</h3>
                <p>
                    If you forget password you can change the password by enter old password then enter new one and sure it
                </p>

            </div>
            <img src="Images\login.svg" class="image" alt="" />
        </div>

    </div>
</div>


</body>
</html>
