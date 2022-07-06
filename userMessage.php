<?php

if(isset($_GET['id'])){
    $conn=new mysqli('localhost','root','','tourist');
    if($conn->connect_error){
        die("connection Failed!".$conn->connect_error);
    }
    $id=$_GET['id'];
    $delete=mysqli_query($conn,"DELETE FROM `message` WHERE `sub`='$id'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="AdmineStyle1.css">
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


<section class="Title">
    <h1>
        <span>N</span>
        <span>O</span>
        <span>T</span>
        <span>I</span>
        <span>F</span>
        <span>I</span>
        <span>C</span>
        <span>A</span>
        <span>T</span>
        <span>I</span>
        <span>O</span>
        <span>N</span>
    </h1>
</section>
<section class="home-section">
    <div class="header-fixed">
        <table>
            <thead>
            <tr>
                <th>From</th>
                <th>To </th>
                <th>Subject </th>
                <th><pre>Action                                                                </pre></th>
                <br>

            </tr>
            </thead>
            <tbody>
            <?php
            $db=new mysqli('localhost','root','','tourist');
            if($db->connect_error){
                die("connection Failed!".$db->connect_error);
            }

            $sql="SELECT * FROM `message`";
            $result=$db->query($sql);




            if(!$result){
                die("Invalid Query!".$db->connect_error);
            }

            while($row=$result->fetch_assoc()){
                echo"  <tr>
            <td><pre>                                      ".$row["Fromm"]."</pre> </td>
            <td><pre>                ".$row["Too"]." </pre</td>
             <td><pre>                ".$row["sub"]." </pre</td>
          "   ?>

                <td><div class="wrapper">
                        <div class="button">
                            <div class="icon"><i class="fa fa-eye" aria-hidden="true"></i></div>
                            <a href='showMessage.php?updateId=<?php echo $row['sub'];?>'> <span>Message</span></a>
                        </div>

                        <div class="button">
                            <div class="icon"><i class="fa fa-times" aria-hidden="true"></i></div>
                            <?php echo" <a href='userMessage.php?id=".$row['sub']."'> <span>Remove</span></a>"?>
                        </div>
                    </div>
                </td>
                <?php
                echo" </tr>";
            }

            ?>



            </tbody>


        </table>
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
