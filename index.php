<?php
session_start();
$_SESSION['name']="";
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>school management</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
    <div class="logoimg">
    <img src="./asset/logo.png" alt="">
    </div>
    <div>
        <header class="header">
            <nav>
                <div class="header_logo">
                    <img src="" alt="">
                </div>
                <div class="header_name">
                    <h1><?php echo $_SESSION['name']?></h1>
                </div>
                <div class="headerNav none">
                    <ul>
                        <li class="nev_item home_nav none">
                            <a href="/school">
                                <div class="anim_button">
                                    <span>
                                        <em>H</em>
                                        <em>O</em>
                                        <em>M</em>
                                        <em>E</em>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nev_item">
                            <a href="https://shivamgoswami2711.github.io/profile/" target="_blank">
                                <div class="anim_button">
                                    <span>
                                        <em>A</em>
                                        <em>B</em>
                                        <em>O</em>
                                        <em>U</em>
                                        <em>T</em>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nev_item">
                            <a href="login.php">
                                <div class="anim_button">
                                    <span>
                                        <em>l</em>
                                        <em>o</em>
                                        <em>g</em>
                                        <em>i</em>
                                        <em>n</em>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="nev_item">
                            <a href="logout.php">
                                <div class="anim_button">
                                    <span>
                                        <em>l</em>
                                        <em>o</em>
                                        <em>g</em>
                                        <em>o</em>
                                        <em>u</em>
                                        <em>t</em>
                                    </span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    </header>
    <section >
        <div>
            <div class="fCantainer">
                <h1>
                   future School
                </h1>
                <p>
                    Education is our passport to the future. For tomorrow belongs to the people who prepare it today
                </p>
                <a href="#start"><div>Get Start</div></a>
            </div>
        </div>
        <div>
                <img src="./asset/images.jpg" alt="">
            </div>
    </section>
    <main class="indexMain" id="start">
        <div class="main_cantainer">
            <a href="dashbord.PHP"><div class="cantainer">principal<br/><p>add data</p></div></a>
            <a href="attendance.php"><div class="cantainer">teacher<br/><p>attendance</p></div></a>
            <a href="stutentdata.php" ><div class="cantainer">student<br/><p>Attendance</p></div></a>
            <a href="chat.php" ><div class="cantainer">Chat<br/><p>chat room</p></div></a>
            <a href="learnEnglesh.php" ><div class="cantainer">learn englesh<br/><p>learn englesh</p></div></a>
            <!-- class="disabled" -->
        </div>
    </main>
    <footer>
        <p>Shivam Goswami © <span class="date"></span></p>
    </footer>
    <script>
        var d = new Date();
        document.querySelector(".date").textContent=d.getFullYear();
    </script>
</body>
</html>
