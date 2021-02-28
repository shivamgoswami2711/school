<?php
session_start();
require "db.php";
// if(!isset($_SESSION['rank'])){
//     echo "<script>location.href='login.php'</script>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
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
                        <a href="dashbord.PHP">
                            <div class="anim_button">
                                <span>
                                    <em>A</em>
                                    <em>d</em>
                                    <em>d</em>
                                    <em> </em>
                                    <em>d</em>
                                    <em>a</em>
                                    <em>t</em>
                                    <em>a</em>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="nev_item">
                        <a href="presentShow.php" target="_blank">
                            <div class="anim_button">
                                <span>
                                    <em>A</em>
                                    <em>T</em>
                                    <em>T</em>
                                    <em>E</em>
                                    <em>N</em>
                                    <em>D</em>
                                    <em>A</em>
                                    <em>N</em>
                                    <em>C</em>
                                    <em>e</em>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li class="nev_item">
                        <a href="stutentdata.php">
                            <div class="anim_button">
                                <span>
                                    <em>s</em>
                                    <em>t</em>
                                    <em>u</em>
                                    <em>d</em>
                                    <em>e</em>
                                    <em>t</em>
                                    <em> </em>
                                    <em>d</em>
                                    <em>a</em>
                                    <em>t</em>
                                    <em>a</em>
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
    <main>
        <iframe src= 
        "https://shivamgoswami2711.github.io/exsentence/"> 
    </iframe> 
    </main>
</body>
</html>