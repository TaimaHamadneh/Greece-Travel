<?php
if(isset($_GET['id'])) {

    session_start();
    $emaill = $_SESSION['email'];

    $conn = new mysqli('localhost', 'root', '', 'tourist');
    if($conn->connect_error){
        die("connection Failed!".$conn->connect_error);
    }
    $id = $_GET['id'];

    $book = mysqli_query($conn, "SELECT * from `tour` WHERE `Trip Time`='$id'");
    $s = mysqli_query($conn, "select * from signup where `Email`='$emaill'");
    $row1 = mysqli_fetch_array($s);

    if( !empty($s)){
    $row = mysqli_fetch_array($book);

    $booking =  "INSERT INTO `booking`(`Email-signup` , `fromm` , `too` ,`Trip Time`)
                     VALUES ( '" . $row1["Email"]. "' , '" . $row["fromm"] . "' , '" . $row["too"] . "' , '" . $row["Trip Time"] . "')";
    $conn->query( $booking);
    $conn->commit();
    $conn->close();
}

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
        <table style="margin: 10px">
            <thead>
            <tr>
                <th><pre> From </pre></th>
                <th><pre> To </pre></th>
                <th><pre>     Trip Start Date     </pre></th>
                <th><pre>     Trip End Date     </pre></th>
                <th>Trip Time</th>
                <th>Salary</th>
                <th><pre>    Photo    </pre></th>
                <th><pre>                                Action                    </pre></th>
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
                            <div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                            <?php echo" <a href='Booking.php?id=".$row['Trip Time']."'> <span>Booking</span></a>"?>
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
