<?php
session_start();
$msg="";
if($_SESSION['rank'] != "principal" && $_SESSION['rank']!="teacher" && $_SESSION['rank']!="student"){
    echo "<script>location.href='dashbord.PHP'</script>";
}
require "db.php";
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
    <div>
        <header class="header">
            <nav>
                <div class="header_logo">
                    <img src="" alt="">
                </div>
                <div class="header_name">
                    <h1>
                        <?php echo $_SESSION['name']?>
                    </h1>
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
    </div>
    <main>
        <div class="lefthearder">
            <a href="adddata.php">
                <div class="itam active">
                    <div>Add stutent/teacher</div>
                </div>
            </a>
            <a href="teacherschedule.php">
                <div class="itam">
                    <div>teacher schedule</div>
                </div>
            </a>
            <a href="teacherfess.php">
                <div class="itam">
                    <div>teacher salary</div>
                </div>
            </a>
            <a href="attendance.php">
                <div class="itam">
                    <div>add attendance</div>
                </div>
            </a>
        </div>
        <div class="techarSelection">
            <table>
                <thead>
                    <tr>
                        <th>class</th>
                        <th>1 pride</th>
                        <th>2 pride</th>
                        <th>3 pride</th>
                        <th>4 pride</th>
                        <th>5 pride</th>
                        <th>6 pride</th>
                        <th>modify</th>
                    </tr>
                    <div class="sebject"></div>
                </thead>
                <tbody>
                    <tr>
                        <?php
                    $teacherNameQ ="SELECT * FROM school.class";
                        $name = mysqli_query($con,$teacherNameQ) or die("Error");
                        if(mysqli_num_rows($name)){
                            while($row = $name->fetch_assoc()){
                                echo "<tr>
                                <td>".$row['class']."</td>
                                <td><div>".$row['fip']."</div><div>".$row['fis']."</div></td>
                                <td><div>".$row['sep']."</div><div>".$row['ses']."</div></td>
                                <td><div>".$row['tp']."</div><div>".$row['ts']."</div></td>
                                <td><div>".$row['fp']."</div><div>".$row['fs']."</div></td>
                                <td><div>".$row['fivp']."</div><div>".$row['fivs']."</div></td>
                                <td><div>".$row['sip']."</div><div>".$row['sis']."</div></td>
                                <td><a href=\"http://localhost/school/Modifyschedule.php?id=".$row['class']."\"\">Modify</a></td>";
                            }
                        } 
                    ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>