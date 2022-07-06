<?php
session_start();
$host = "localhost";
$user = "root";
$password="";
$db="tourist";

$data = mysqli_connect($host , $user , $password , $db);
if($data == false){
    die("connection error");

}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Email = $_POST["Email"];
    $password = $_POST["userPassword"];
    $_SESSION['email']=$Email;
    $sql = "select * from signup where Email = '".$_POST["Email"]."'AND password = '".$_POST["userPassword"]."' ";
    $result = mysqli_query($data , $sql);
    $row = mysqli_fetch_array($result);

    if($row["Email"] == "$Email" && $row["password"] == "$password"){
        $userName = $row['Name'];

        $_SESSION['Email'] = $row['Email'];
        header("location:userProfile.php?userEmail=".$_SESSION['email']."");
    }

    else{
        echo "username or password incorrect";
    }
}
$sql1 = "select * from Admin where Email = '".$Email."'AND password = '".$password."' ";
$result1 = mysqli_query($data , $sql1);
$row1 = mysqli_fetch_array($result1);
if($row1["Email"] == "$Email" && $row1["password"] == "$password"){
    header('location:profile.html');
}

else{
    echo "username or password incorrect";
}

?>