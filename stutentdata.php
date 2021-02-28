<?php
session_start();
$msg="";
require "db.php";
if($_SESSION['rank'] != "principal" && $_SESSION['rank']!="teacher" && $_SESSION['rank']!="student"){
    echo "<script>location.href='dashbord.PHP'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/school/style/style.css">
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
    <main class="stutentdata">
        <h2>Search student data</h2>
        <div class="studentData">
            <div>
                <div>
                    <form class="search" action="stutentdata.php" method="post">
                        <div><input type="search" name="search" id="search" placeholder="full name and roll number"></div>
                        <div><input type="submit" value="search"></div>
                    </form>               
                </div>
                <div class="result">
                    <table>
                        <thead>
                            <tr>

                            <?php
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $search = mysqli_real_escape_string($con ,$_POST["search"]);
                                $qurey = "SELECT * FROM student where name='$search' or roll='$search'";
                                $serchdata = mysqli_query($con,$qurey) or die("Error");
                                if(mysqli_num_rows($serchdata)>0){
                                    while($row = $serchdata->fetch_assoc()) {
                                        echo '                                
                                        <th>roll number</th>
                                        <th>name</th>
                                        <th>father name</th>
                                        <th>email</th>
                                        <th>gender</th>
                                        <th>class</th>
                                        <th>Atten..</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        echo "<tr>
                                        <td>". $row['roll']."</td>
                                        <td>". $row['name']."</td>
                                        <td>". $row['fname']."</td>
                                        <td>". $row['email']."</td>
                                        <td>". $row['gender']."</td>
                                        <td>". $row['class']."</td>
                                        <td><a href=\"http://localhost/school/presentShow.php?id=".$row['roll']."\"\"><input type='submit' value='Atten..'></a></td></tr>";                                        
                                    }
                                    } else {
                                    echo "<tr><td>0 results</td></tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </main>
    <form action="presentShow.php" method="post"></form>
    <footer>
        <p>Shivam Goswami © <span class="date"></span></p>
    </footer>
    <script>
        var d = new Date();
        document.querySelector(".date").textContent=d.getFullYear();
    </script>

</body>

</html>