<?php
session_start();
$msg="";
if($_SESSION['rank'] != "principal" && $_SESSION['rank']!="teacher"){
    echo "<script>location.href='dashbord.PHP'</script>";
}

require "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = mysqli_real_escape_string($con ,$_POST["name"]);
    $fname = mysqli_real_escape_string($con ,$_POST["fname"]);
    $email = mysqli_real_escape_string($con ,$_POST["email"]);
    $password = mysqli_real_escape_string($con ,$_POST["password"]);
    $gender = mysqli_real_escape_string($con ,$_POST["gender"]);
    $schoolrank = mysqli_real_escape_string($con ,$_POST["chack"]);

    if ($schoolrank === "student"){
            $emailavl = "select email from student where email='$email'";
            $res = mysqli_query($con,$emailavl) or die("Error");
            if(mysqli_num_rows($res)>0){
                $msg ="email is used TRY other email";
            }else{
                $class = mysqli_real_escape_string($con ,$_POST["class"]);
                $sql = "INSERT INTO student (name, fname, email, pass, gender, class)
                VALUES ('$name', '$fname','$email','$password','$gender','$class')";
                $res = mysqli_query($con,$sql) or die("Error");
                $msg= "New record created successfully";
            }
    }
    else{
            $emailavl = "select email from teacher where email='$email'";
            $res = mysqli_query($con,$emailavl) or die("Error");
            if(mysqli_num_rows($res)>0){
                $msg ="email is used TRY other email";
            }else{
                if($_SESSION["rank"]==="principal"){
                    $sql = "INSERT INTO teacher (name, fname, email, pass, gender, schoolrank)
                    VALUES ('$name', '$fname','$email','$password','$gender','teacher')";
                    $res = mysqli_query($con,$sql) or die("Error");
                    $msg= "New record created successfully";
                }
                else{
                    $msg = "only principal add teacher";
                }
            }
    }
}?>




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
    <main class="addCantainer">
        <div class="Cantainer">
            <form action="adddata.php" method="post">
                <label for="tracher">tracher</label>
                <input type="radio" name="chack" id="tracher" value="tracher" required>
                <label for="student">student</label>
                <input type="radio" name="chack" id="student" value="student" required>

            <div>
                <label for="name">full name</label><br/>
                <input type="text" name="name" id="name" placeholder="full name" required>
            </div>
            <div>
                <label for="fname">father name</label><br/>
                <input type="text" name="fname" id="fname" placeholder="father name" required>
            </div>
            <div>
                <label for="email">eamil</label><br/>
                <input type="email" name="email" id="email" placeholder="email" required>
            </div>
            <div>
                <label for="password">password</label><br/>
                <input type="password" name="password" id="password" placeholder="password" required>
            </div>
            <div>
                <label for="gender">gender</label><br/>
                <input type="text" name="gender" id="gender" placeholder="gender" required>
            </div>
            <div>
                <label for="class">class</label><br/>
                <input type="number" name="class" id="class" placeholder="class" required >
            </div>
            <div class="adddata"> <input type="submit" value="add data"></div>
           <div class="msg"><?php echo $msg?></div>
            </form>
        </div>
    </main>
    <footer>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum, ipsum.</p>
    </footer>
    <script>
    </script>
</body>
</html>