<?php
session_start();
$msg="";
if($_SESSION['rank'] != "principal"){
     echo "<script>alert('only principal add teacher')>";
    echo "<script>location.href='dashbord.PHP'</script>";
}
require "db.php";
        // $sql = "INSERT INTO teacher (name, fname, email, pass, gender, schoolrank)
        // VALUES ('$name', '$fname','$email','$password','$gender','teacher')";
        // $res = mysqli_query($con,$sql) or die("Error");
        // $msg= "New record created successfully";
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
            <a href="adddata.php"><div class="itam active">
                <div>Add stutent/teacher</div>
            </div></a>
            <a href="teacherschedule.php"><div class="itam">
                <div>teacher schedule</div>
            </div></a>
            <a href="teacherfess.php"><div class="itam">
                <div>teacher salary</div>
            </div></a>
            <a href="attendance.php"><div class="itam">
                <div>add attendance</div>
            </div></a>
        </div>
        <div class="techarSelection">
            <div>
                <label for="firstP">first pride</label>
            <select name="firstP" id="teacher">
                <option value="" default hidden selected>select</option>
            <?php
            $teacherNameQ ="select * from teacher where schoolrank='teacher'";
            $name = mysqli_query($con,$teacherNameQ) or die("Error");
            while($row = $name->fetch_assoc()){
                echo "<option value='".$row['id']."' >".$row['name']."</option>";
            }
            ?> </select></div>
            <div>
                <label for="firstP">secend pride</label>
            <select name="firstP" id="teacher">
                <option value="" default hidden selected>select</option>
            <?php
            $teacherNameQ ="select * from teacher where schoolrank='teacher'";
            $name = mysqli_query($con,$teacherNameQ) or die("Error");
            while($row = $name->fetch_assoc()){
                echo "<option value='".$row['id']."' >".$row['name']."</option>";
            }
            ?> </select></div>
            <div>
                <label for="firstP">three pride</label>
            <select name="firstP" id="teacher">
                <option value="" default hidden selected>select</option>
            <?php
            $teacherNameQ ="select * from teacher where schoolrank='teacher'";
            $name = mysqli_query($con,$teacherNameQ) or die("Error");
            while($row = $name->fetch_assoc()){
                echo "<option value='".$row['id']."' >".$row['name']."</option>";
            }
            ?> </select></div>
            <div>
                <label for="firstP">four pride</label>
            <select name="firstP" id="teacher">
                <option value="" default hidden selected>select</option>
            <?php
            $teacherNameQ ="select * from teacher where schoolrank='teacher'";
            $name = mysqli_query($con,$teacherNameQ) or die("Error");
            while($row = $name->fetch_assoc()){
                echo "<option value='".$row['id']."' >".$row['name']."</option>";
            }
            ?> </select></div>
            <div>
                <label for="firstP">five pride</label>
            <select name="firstP" id="teacher">
                <option value="" default hidden selected>select</option>
            <?php
            $teacherNameQ ="select * from teacher where schoolrank='teacher'";
            $name = mysqli_query($con,$teacherNameQ) or die("Error");
            while($row = $name->fetch_assoc()){
                echo "<option value='".$row['id']."' >".$row['name']."</option>";
            }
            ?> </select></div>
            <div>
                <label for="firstP">six pride</label>
            <select name="firstP" id="teacher">
                <option value="" default hidden selected>select</option>
            <?php
            $teacherNameQ ="select * from teacher where schoolrank='teacher'";
            $name = mysqli_query($con,$teacherNameQ) or die("Error");
            while($row = $name->fetch_assoc()){
                echo "<option value='".$row['id']."' >".$row['name']."</option>";
            }
            ?> </select></div>
        </div>
    </main>
</body>

</html>