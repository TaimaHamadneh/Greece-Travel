<?php
$db=new mysqli('localhost','root','','tourist');

if(!$db){
    echo "Connection Failed!";
    exit();
}
else{
    $select="SELECT * FROM tour";
    $query=mysqli_query($db,$select);

}