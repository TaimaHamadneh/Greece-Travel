
<?php

if(isset($_GET['id'])){
    $conn=new mysqli('localhost','root','','tourist');
    if($conn->connect_error){
        die("connection Failed!".$conn->connect_error);
    }
    $id=$_GET['id'];
    $delete=mysqli_query($conn,"DELETE FROM `tour` WHERE `Trip Time`='$id'");
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="AdmineStyle1.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
            <a href="adminMessage.php">
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
        </li>
    </ul>
</div>



<section class="Title">
    <h1>
        <span>S</span>
        <span>H</span>
        <span>O</span>
        <span>W</span>
        <span>T</span>
        <span>O</span>
        <span>U</span>
        <span>R</span>
    </h1>
</section>

<section class="home-section">
    <div class="header-fixed">
        <table>
            <thead>
            <tr>
                <th><pre> From </pre></th>
                <th><pre> To </pre></th>
                <th><pre>     Trip Start Date     </pre></th>
                <th><pre>     Trip End Date     </pre></th>
                <th>Trip Time</th>
                <th>Salary</th>
                <th><pre>    Photo    </pre></th>
                <th><pre>                                Action                                               </pre></th>
                <br>

            </tr>
            </thead>
            <tbody>
            <?php
            $db=new mysqli('localhost','root','','tourist');
            if($db->connect_error){
                die("connection Failed!".$db->connect_error);
            }

            $sql="select *from tour";
            $result=$db->query($sql);




            if(!$result){
                die("Invalid Query!".$db->connect_error);
            }


            while($row=$result->fetch_assoc()){
                echo"  <tr>
            <td>".$row["fromm"]." </td>
            <td>".$row["too"]." </td>
            <td>".$row["Start Date"]."</td>
            <td>".$row["End Date"]."</td>
            <td>".$row["Trip Time"]." </td>
            <td>".$row["Salary"]." </td>
            <td>"?>
                <div >
                    <img src="Images/<?=$row['Photo']?>">
                </div>

                <?php  echo"</td>"   ?>

                <td><div class="wrapper">
                        <div class="button">
                            <div class="icon"><i class="fa fa-refresh" aria-hidden="true"></i></div>
                            <a href='update.php?updateId=<?php echo $row['Trip Time']; ?>'> <span>Update</span></a>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa fa-times" aria-hidden="true"></i></div>
                            <?php echo" <a href='adminp1.php?id=".$row['Trip Time']."'> <span>Remove</span></a>"?>
                        </div>
                    </div></td>
                <?php
                echo" </tr>";
            }

            ?>



            </tbody>


        </table>
    </div>
    <br> <br>

    <div class="wrapper1" >
        <div class="button">
            <div class="icon"><i class="fa fa-plus" aria-hidden="true"></i></div><a href="addTour.html"<span>Add Tour</span></a>
        </div>


</section>
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



</body>
</html>
