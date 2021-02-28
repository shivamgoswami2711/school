<?php 
session_start();
$msg="";
require "db.php";
if($_SESSION['rank'] != "principal" && $_SESSION['rank']!="teacher"){
    echo "<script>location.href='dashbord.PHP'</script>";
}

$mydate=getdate(date("U"));
$date ="$mydate[year]-0$mydate[mon]-$mydate[mday]";
$class ='';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['ok'])){
          if(!empty($_POST['checkArr'])){
            foreach($_POST['checkArr'] as $checked){
                $atten ="INSERT INTO attendance (roll,date)VALUES ('$checked','$date')";
                $att = mysqli_query($con,$atten);
                $msg= '<div class="errorch">successful!</div>';
            }
          } else {
            $msg= '<div class="errorch">Checkbox is not selected!</div>';
          }
      }
if(isset($_POST['ok'])){
    $class = $_POST['class'];
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
    <main class="presentContainer">
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
        <div class="salaryT">
            <h2>Attendance Tabel</h2>
            <form action="attendance.php" method="post" class="classF">
                <?php
                    $teacherNameQ ="SELECT * FROM school.class";
                        $name = mysqli_query($con,$teacherNameQ) or die("Error");
                        if(mysqli_num_rows($name)){
                            echo '<div class="selectionDiv">
                            <label for="class">class</label>
                            <select name="class" id="teacher" required>
                            <option value="" default hidden selected>select</option>';
                            while($row = $name->fetch_assoc()){
                                echo  "<option value='".$row['class']."' >".$row['class']."</option>";
                            }}
                            echo "</select></div>";
                            ?>
                <div class="submit"><input type="submit" value="OK" name="ok"></div>
            </form>

            <form action="attendance.php" method="post">

                <div class="present">
                    <?php
                $rollQ ="select roll,name,fname from student where class='$class'";
                $rollList = mysqli_query($con,$rollQ) or die("Error");
                $count = 0;
                if(mysqli_num_rows($rollList)>0){
                    while($row = $rollList->fetch_assoc()) {
                        $count = $count+1;
                        echo "<div class='attTab'>
                        <div class='idAndCkack'>
                            <span class='attid'>".$count."</span>
                            <input type='checkbox' name='checkArr[]' value='". $row["roll"]."'/>
                        </div>
                        <label for='list'>". $row["name"]."</label>
                        <label for='list'>". $row["fname"]."</label>
                        <a href=\"http://localhost/school/modify.php?id=".$row['roll']."\"\"><li class='button'>Mofity</li></a>
                        </div>"."<br>";
                    }
                    } else {
                        echo "0 results";
                }
                ?>
                </div>
                <div class="submit"><input type="submit" value="submit"></div>
                <div><?php echo $msg?></div>
            </form>
        </div>
    </main>
    <footer>
        <p>Shivam Goswami © <span class="date"></span></p>
    </footer>
    <script>
    var d = new Date();
    document.querySelector(".date").textContent = d.getFullYear();
    </script>
</body>

</html>