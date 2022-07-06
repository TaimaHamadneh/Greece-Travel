<?php


if (isset($_POST['from']) && isset($_POST['to']) && isset($_POST['messageTxt']) && isset($_POST['Subject'])) {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $txt = $_POST['messageTxt'];
    $sub = $_POST['Subject'];

    try {
        $db = new mysqli('localhost', 'root', '', 'tourist');
        $qryStr = "INSERT INTO `message` (`Fromm`, `Too`,`sub` ,`Txt`) VALUES ('$from', '$to',' $sub' ,'$txt');";
        $res = $db->query($qryStr);
        $db->query($qryStr);
        $db->commit();
        $db->close();

    } catch (Exception $e) {
    }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">

    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AdmineStyle1.css">
    <link rel="stylesheet" href="adminMessage.css">

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="jquery.lettering.js"></script>
    <script>
        $(document).ready(function () {
                $(".letter").lettering();
            }
        );
    </script>
</head>
<body>
<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">Admin's List</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">

        <li>
            <a href="profile.html">
                <i class='bx bx-user'></i>
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
                <i class='bx bx-chat'></i>
                <span class="links_name"> Messages</span>
            </a>
            <span class="tooltip"> Messages</span>
        </li>


        <li class="profile">
            <div class="profile-details">
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

<div class="center">
    <h1 class="letter">Send Message</h1>
</div>
<br><br><br>
<div class="conn">
    <form id="form1">
        <h3> Trip problem</h3>
        <p style="color: #243f4d">
        <pre>If there is a defect in one of the trips,
it is possible to send a message to the
users and inform them of the matter by
pressing the following button</pre>
        </p>
        <div class="btn-box">
            <br>
            <pre>        <button type="button" id="next1">Next</button>  </pre>
        </div>
    </form>

    <form id="form2" action="adminMessage.php" method="post">
        <h3> Admin Message</h3>
        <input type="text" value="Tourist-dream-site@gmail.com" name="from">
        <input type="text" value="Every One" name="to">
        <input type="text" placeholder="Subject" name="Subject">
        <textarea class="field" placeholder="Message" name="messageTxt"></textarea>
        <div class="btn-box">
            <button type="button" id="back1">Back</button>
            <button type="submit" id="next2">Send</button>
        </div>
    </form>


    <div class="step-row">
        <div id="progress"></div>
        <div class="step-col"><small>
                <pre>Trip problem       </pre>
            </small></div>
        <div class="step-col"><small>Admin Message </small></div>
    </div>

</div>


<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange();//calling the function(optional)
    });

    searchBtn.addEventListener("click", () => { // Sidebar open when you click on the search iocn
        sidebar.classList.toggle("open");
        menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");//replacing the iocns class
        }
    }
</script>

<script>

    var form1 = document.getElementById("form1");
    var form2 = document.getElementById("form2");

    var next1 = document.getElementById('next1');
    var next2 = document.getElementById("next2");
    var back1 = document.getElementById("back1");

    var progress = document.getElementById("progress");
    next1.onclick = function () {
        form1.style.left = "-450px";
        form2.style.left = "40px";
        progress.style.width = "390px";
    }

    back1.onclick = function () {
        form1.style.left = "40px";
        form2.style.left = "450px";
        progress.style.width = "190px";
    }

    next2.onclick = function () {
        form2.style.left = "-450px";
        progress.style.width = "379px";
    }


</script>
</body>
</html>
