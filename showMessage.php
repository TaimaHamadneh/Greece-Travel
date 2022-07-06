<?php
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
    <link rel="stylesheet" href="show.css">
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

<<div class="center">
    <h1 class="letter">Show Message</h1>
</div>
<br><br><br>
<div class="conn">


    <?php

    $con = new mysqli('localhost','root','','tourist');
    if(isset($_GET['updateId'])){$updateId = $_GET['updateId'];
        $s = mysqli_query($con,"select * from message where `sub`='$updateId'");}

    else{$updateId = $_POST['timeTrip'];
        $s = mysqli_query($con,"select * from message where `sub`='$updateId'");

    }
    if($r = mysqli_fetch_array($s))
    {
        ?>


        <form id="form1" action="showMessage.php" method="post">
            <h3> Admin Message</h3>
            <br>
            <input type="text" name="Subject"placeholder="Subject:<?php echo $r['sub']; ?>" readonly="readonly"><br> <br><br>
            <textarea class="field"  name="messageTxt"placeholder="Message:<?php echo $r['Txt']; ?>" readonly="readonly"></textarea>
            <div class="btn-box">
                <br>
                <pre>    <a href="userMessage.php" > <button type="button"  id="next1">close</button>  </a></pre>
            </div>
        </form>

        <?php
    }

    ?>

    <div class="step-row">
        <div id="progress"></div>
        <div class="step-col"><small><pre>                                Admin Message </pre></small></div>
    </div>

</div>


</body>
</html>
