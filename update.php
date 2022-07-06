<?php

if(isset($_POST['update'])){

    $conn=new mysqli('localhost','root','','tourist');
    if($conn->connect_error){
        die("connection Failed!".$conn->connect_error);
    }
    $startDate=$_POST['startDate'];
    $endDate=$_POST['endDate'];
    $salary=$_POST['salary'];
    $tripTime=$_POST['timeTrip'];


    $up="UPDATE `tour` SET `Start Date` ='$startDate', `End Date` = '$endDate', `Trip Time` = '$tripTime', `Salary` = ' $salary' 
               WHERE `Trip Time` = '$tripTime' ;";
    $res=mysqli_query($conn,$up);
    header("location:adminp1.php?id= ".$startDate."");

//    $up1="UPDATE `reservations` SET `pname` ='$pname', `m_r_email` = '$m_r_email', `phone` = '$phone',
  //    `clinic` = ' $clinic',`doctors` = ' $doctors',`r_date` = ' $r_date' WHERE rid` = '$rid' ;";


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="AdmineStyle1.css">
    <link rel="stylesheet" type="text/css" href="update.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="jquery.lettering.js"></script>
    <script>
        $(document).ready(function() {
            $(".letter").lettering();}
        );
    </script>
</head>
<body>

<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Admin's List</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">

        <li>
            <a href="profile.html">
                <i class='bx bx-user' ></i>
                <span class="links_name">Profile</span>
            </a>
            <span class="tooltip">Profile</span>
        </li>

        <li>
            <a href="users.php">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span class="links_name"> Users</span>
            </a>
            <span class="tooltip">Users</span>
        </li>

        <li>
            <a href="adminp1.php">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <span class="links_name">Trip</span>
            </a>
            <span class="tooltip">Trip</span>
        </li>

        <li>
            <a href="adminMessage.html">
                <i class='bx bx-chat' ></i>
                <span class="links_name"> Messages</span>
            </a>
            <span class="tooltip"> Messages</span>
        </li>





        <li class="profile">
            <div class="profile-details">
                <!--<img src="profile.jpg" alt="profileImg">-->
                <div class="name_job">
                    <a target="_top"  href="SignUpPage.html" >
                        <i class='bx bx-log-out' ></i>
                        <span class="links_name"></span>
                    </a>
                    <i class='bx bx-log-out' ></i>
                    <span class="links_name"></span>
                </div>
            </div>
            <i class='bx bx-log-out' id="log_out" ></i>
        </li>
    </ul>
</div>



<div class="center">
    <h1 class="letter">Update Tour</h1>
</div>

<?php

$con = new mysqli('localhost','root','','tourist');
if(isset($_GET['updateId'])){$updateId = $_GET['updateId'];
    $s = mysqli_query($con,"select * from tour where `Trip Time`='$updateId'");}

else{$updateId = $_POST['timeTrip'];
    $s = mysqli_query($con,"select * from tour where `Trip Time`='$updateId'");

}
if($r = mysqli_fetch_array($s))
{
?>
<section class="add-form">
    <form action="update.php" method="post" enctype="multipart/form-data" >

<span>
<div class="form">
<input type="date" class="form_input" autocomplete="off"
       id="startDate" name="startDate" value="<?php echo $r['Start Date']; ?>" >
<label for="startDate" class="form_label">Change Start Date</label>
</div>
</span>
        <br><br><br>

        <span>
<div class="form">
    <input type="date" class="form_input" autocomplete="off" id="endDate" name="endDate" value="<?php echo $r['End Date']; ?>">
    <label for="endDate" class="form_label">Change End Date</label>
</div>
</span>
        <br><br><br>


        <span>
<div class="form">
    <input type="number" class="form_input" autocomplete="off" id="salary" name="salary" value="<?php echo $r['Salary']; ?>" >
    <label for="salary" class="form_label">Change Salary</label>
</div>
</span>
        <br><br><br>

        <span>
<div class="form">
    <input type="text" class="form_input" autocomplete="off" id="timeTrip" name="timeTrip" value="<?php echo $r['Trip Time']; ?>">
    <label for="timeTrip" class="form_label">Change Trip Time</label>
</div>
</span>


        <br> <br>
        <!-- <div class="btn"><input type="submit" value="Add Tour" name="add" ></div>-->
        <div class="addTour">
            <button type="submit" value="Update" name="update"  id="update"  >
                <p id="btnText">Update</p>
                <span class="sub" id="ss"></span>
                <span class="smile" id="s"></span>
            </button>
        </div>

    </form>
    <?php
    }

    ?>
</section>

<div class="image">
    <img src="Images/update.svg">
</div>
<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", ()=>{
        sidebar.classList.toggle("open");
        menuBtnChange();//calling the function(optional)
    });

    searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
        }else {
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
        }
    }
</script>

<script>
    let preveiwContainer = document.querySelector('.products-preview');
    let previewBox = preveiwContainer.querySelectorAll('.preview');

    document.querySelectorAll('.profile-con .profilee').forEach(profilee =>{
        profilee.onclick = () =>{
            preveiwContainer.style.display = 'flex';
            let name = profilee.getAttribute('data-name');
            previewBox.forEach(preview =>{
                let target = preview.getAttribute('data-target');
                if(name == target){
                    preview.classList.add('active');
                }
            });
        };
    });

    previewBox.forEach(close =>{
        close.querySelector('.fa-times').onclick = () =>{
            close.classList.remove('active');
            preveiwContainer.style.display = 'none';
        };
    });
</script>

<script>


    var update=document.getElementById("update");
    var ss=document.getElementById("ss");
    var s=document.getElementById("s");
    update.onmousemove=function() {
        ss.style.left='150px';
        ss.style.opacity='0';
        s.style.opacity='1';

    }
</script>





</body>
</html>
