<?php

if(isset($_POST['add'])&& isset($_POST['from'])&&isset($_POST['to'])&&isset($_POST['startDate'])&&
    isset($_POST['endDate'])&&isset($_POST['time'])&&isset($_POST['salary'])&&isset($_FILES['my-image'])){

    echo "<pre>";
    print_r($_FILES['my-image']);
    echo "</pre>";

    $Fromm=$_POST['from'];
    $Too=$_POST['to'];
    $StartDate=$_POST['startDate'];
    $EndDate=$_POST['endDate'];
    $Timee=$_POST['time'];
    $Salary=$_POST['salary'];

    $img_name=$_FILES['my-image']['name'];
    $img_size=$_FILES['my-image']['size'];
    $tmp_name=$_FILES['my-image']['tmp_name'];
    $error=$_FILES['my-image']['error'];
    if( $error===0){
        if($img_size>1250000){
            $em="sorry your file is too large!";
            header("location:addTour.html?error=$em");
        }
        else{
            $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
            $img_ex_lc=strtolower($img_ex);
            $allowed_exs=array("jpg","jpeg","png");
            if(in_array($img_ex_lc,$allowed_exs)){
                $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                $img_upload_Path='Images/'.$new_img_name;
                move_uploaded_file( $tmp_name,$img_upload_Path);

                $db=new mysqli('localhost','root','','tourist');

                if(!$db){
                    echo "Connection Failed!";
                    exit();

                }

                $sqll="INSERT INTO `tour` (`fromm`, `too`, `Start Date`, `End Date`, `Trip Time`, `Salary`, `Photo`) 
             VALUES ('".$Fromm."', '".$Too."', '".$StartDate."', '".$EndDate."', '".$Timee."', '".$Salary."', '".$new_img_name."');";
                $db->query( $sqll);
                $db->commit();
                $db->close();
                header('location:adminp1.php');
            }
            else{
                $em="You can't upload files of tis type";
                header("location:addTour.html?error=$em");
            }
        }

    }
    else{
        $em="unknown error occurred!";
        header("location:addTour.html?error=$em");
    }
}
else{
    header('location:addTour.html');
}

?>


