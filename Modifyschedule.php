<?php
session_start();
$msg="";
require "db.php";
if (!empty($_GET)) {
       $class = $_GET["id"];
} else{
    echo "<script>location.href='teacherschedule.php'</script>"; 
}
if($_SESSION['rank'] != "principal"){
    echo "<script>alert('permission not allowde')</script>";
    echo "<script>location.href='dashbord.PHP'</script>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
           $first = $_POST["firstP"];
           $secend = $_POST["secendP"];
           $thred = $_POST["thredP"];
           $four = $_POST["fourP"]; 
           $five = $_POST["fiveP"]; 
           $six = $_POST["sixP"]; 
           $firstS = $_POST["firstS"];
           $secendS = $_POST["secendS"];
           $thredS = $_POST["thredS"];
           $fourS = $_POST["fourS"]; 
           $fiveS = $_POST["fiveS"]; 
           $sixS = $_POST["sixS"]; 
           $classQ = "UPDATE school.class
           SET fiP='$first',seP='$secend',tp='$thred',fp='$four',fivp='$five',sip='$six',
           fiS='$firstS',seS='$secendS',tS='$thredS',fS='$fourS',fivS='$fiveS',siS='$sixS'
           WHERE class='$class'";
           $res = mysqli_query($con, $classQ) or die("Error");
           $msg= "New record created successfully";
}
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
            <form action="" method="post">
                <div class="selectionContainer">
                    <div>
                        <?php
            $pride = array("firstP","secendP","thredP","fourP","fiveP","sixP");
            for ($x = 0; $x <= 5; $x++) {
                    echo '<div class="selectionDiv">
                            <label for="'.$pride[$x].'">'.$pride[$x].'</label>
                            <select name="'.$pride[$x].'" id="teacher" required>
                            <option value="" default hidden selected>select</option>';
                            $teacherNameQ ="select * from teacher where schoolrank='teacher'";
                            $name = mysqli_query($con,$teacherNameQ) or die("Error");
                            while($row = $name->fetch_assoc()){
                                echo "<option value='".$row['name']."' >".$row['name']."</option>";
                            }
                    echo "</select></div>";
            }
            ?>
                    </div>
                    <div>
                        <?php
            $pride = array("firstS","secendS","thredS","fourS","fiveS","sixS");
            for ($x = 0; $x <= 5; $x++) {
                    echo '<div class="selectionDiv">
                            <label for="'.$pride[$x].'">'.$pride[$x].'</label>
                            <select name="'.$pride[$x].'" id="teacher" required>
                            <option value="" default hidden selected>select</option>';
                            $teacherNameQ ="SELECT subjectn FROM school.subjects";
                            $name = mysqli_query($con,$teacherNameQ) or die("Error");
                            while($row = $name->fetch_assoc()){
                                echo "<option value='".$row['subjectn']."' >".$row['subjectn']."</option>";
                            }
                    echo "</select></div>";
            }
            ?>
                    </div>
                </div>
                <div class="button"><input type="submit" value="submit"></div>
                <div class="msg"><?php echo $msg?></div>

            </form>
        </div>
    </main>
</body>

</html>