<?php
session_start();
require "db.php";
if(!isset($_SESSION['rank'])){
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
    </header>
    <main>
        <div class="stutentdata">
               <div>
                    <form class="search" action="presentShow.php" method="post">
                        <div><input type="search" name="search" id="search" placeholder="roll number"></div>
                        <div><input type="submit" value="search"></div>
                    </form>               
                </div>
            <table>
                <caption></caption>
                <thead>
                    <th>month</th>
                    <th>mon</th>
                    <th>tue</th>
                    <th>wed</th>
                    <th>thu</th>
                    <th>fri</th>
                    <th>sat</th>
                </thead>
                <tbody>
                    <?php
                            function resultfunc($con,$search){
                                $perqurey = "SELECT * FROM attendance where roll='$search'";
                                $predata = mysqli_query($con,$perqurey) or die("Error");
                                if(mysqli_num_rows($predata)>0){
                                    while($row = $predata->fetch_assoc()) {
                                            $timestamp = strtotime($row['date']);
                                            $day=date('D', $timestamp);
                                            $month = date('F',$timestamp);
                                            echo "<tr class=".$month."><td>".$month."</td>";
                                            $my_array = array("Mon","Tue","Wed","Thu","Fri","Sat"); 
                                            for ($x = 0; $x <= 5; $x++) {
                                                if($my_array[$x] == $day){
                                                    echo "<td>".$day."</td>";
                                                }else{
                                                    echo "<td></td>";
                                                }
                                            }     
                                            echo"</tr>";                              
                                        }
                                        } else {
                                            echo "<tr><td>0 results</td></tr>";
                                    }
                            }
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $search = mysqli_real_escape_string($con ,$_POST["search"]);
                                resultfunc($con,$search);
                            }
                            if (!empty($_GET)) {
                                $search = $_GET["id"];
                                resultfunc($con,$search);
                            }  
                            ?>
                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum, ipsum.</p>
    </footer>
</body>
</html>