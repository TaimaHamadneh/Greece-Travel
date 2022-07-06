<?php


if(isset($_POST['signName'])&&isset($_POST['signPassword'])
    &&isset($_POST['signEmail'])&&isset($_POST['signPhone'])){



    $userSignName=$_POST['signName'];
    $userSignPassword=$_POST['signPassword'];
    $userSignEmail=$_POST['signEmail'];
    $userSignPhone=$_POST['signPhone'];
    $img_name=$_FILES['my-image']['name'];
    $img_size=$_FILES['my-image']['size'];
    $tmp_name=$_FILES['my-image']['tmp_name'];
    $error=$_FILES['my-image']['error'];
    if( $error===0){
        if($img_size>1250000){
            $em="sorry your file is too large!";
            header("location:SignUpPage.html?error=$em");
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

                $sqll="INSERT INTO `signup` (`Name`, `password`, `Email`, `Phone`, `Photo`) 
              VALUES ('" . $userSignName . "', '" . $userSignPassword . "', '" . $userSignEmail . "','" . $userSignPhone . "','" .$new_img_name. "'); ";
                $db->query( $sqll);
                $db->commit();
                $db->close();
                header('location:SignUpPage.html');
            }
            else{
                $em="You can't upload files of tis type";
                header("location:SignUpPage.html?error=$em");
            }
        }

    }
    else{
        $em="unknown error occurred!";
        header("location:SignUpPage.html?error=$em");
    }
}
else{
    header('location:SignUpPage.html');
}

?>

?>



