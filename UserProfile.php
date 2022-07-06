<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile page</title>
    <link rel="stylesheet" href="p.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<form method="post">
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">User's List</div>
            <i class='bx bx-menu' id="btn" ></i>
        </div>
        <ul class="nav-list">

            <li>
                <a href="userHome.html" class="active">
                    <i class='fas fa-home' ></i>
                    <span class="links_name">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <!--   <li>
                   <i class='bx bx-search' ></i>
                   <input type="text" placeholder="Search...">
                   <span class="tooltip">Search</span>
               </li>  -->
            <li>
                <a href="UserProfile.php">
                    <i class='bx bx-user' ></i>
                    <span class="links_name">Profile</span>
                </a>
                <span class="tooltip">Profile</span>
            </li>
            <li>
                <a href="userMessage.php">
                    <i class='bx bx-chat' ></i>
                    <span class="links_name">Send Messages</span>
                </a>
                <span class="tooltip">Send Messages</span>
            </li>
            <li>
                <a href="Booking.php">
                    <i class='fa fa-ticket' ></i>
                    <span class="links_name">Book</span>
                </a>
                <span class="tooltip">Book</span>
            </li>
            <li>
                <a href="Reserved.php">
                    <i class='fa fa-book' ></i>
                    <span class="links_name">Reserved travellers</span>
                </a>
                <span class="tooltip">Reserved travellers</span>
            </li>
            <li>
                <a target="_top"  href="map.html" >
                    <i class='fas fa-map-marker-alt' ></i>
                    <span class="links_name">Map</span>
                </a>
                <span class="tooltip">Map</span>
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

</form>
<?php

session_start();
$emaill=$_SESSION['email'];
$con = new mysqli('localhost','root','','tourist');

$s = mysqli_query($con,"select * from signup where `Email`='$emaill'");


if($r = mysqli_fetch_array($s))
{
    ?>
    <form action="userProfile.php" method="post">


        <div class="wrapper">
            <div class="left">

                <img src= "Images/<?=$r['Photo']?> " style="width: 80px" style="height: 300px">
                <h4><?php echo $r['Name']; ?></h4>


            </div>
            <div class="right">
                <div class="info">
                    <h3>Information</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $r['Email']; ?>  </p>
                        </div>
                        <div class="data">
                            <h4>Phone</h4>
                            <p><?php echo $r['Phone']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="projects">
                    <h3>Bio</h3>
                    <div class="projects_data">
                        <div class="data">
                            <h4>Recent</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="data">
                            <h4>Most Viewed</h4>
                            <p>dolor sit amet.</p>
                        </div>
                    </div>
                </div>


            </div>
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
    </form>
    <?php
}

?>
</body>
</html>