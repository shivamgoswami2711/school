<?php
session_start();
$msg="";
require "db.php";
if(isset($_SESSION['rank'])){
if($_SESSION['rank']=="student"){
    echo "<script>alert('parmition not allow')</script>";
}
else if($_SESSION['rank'] != "principal" && $_SESSION['rank']!="teacher"){
    echo "<script>alert('already logged in')</script>";
    echo "<script>location.href='dashbord.PHP'</script>";
}
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = mysqli_real_escape_string($con ,$_POST["email"]);
      $password = mysqli_real_escape_string($con ,$_POST["password"]);
      $rank = mysqli_real_escape_string($con ,$_POST["rank"]);

      $loginQ = "select * from teacher where email='$email' and pass='$password' and schoolrank='principal'";
      $res = mysqli_query($con,$loginQ) or die("Error");

        if ($rank === "principal"){
            $loginQ = "select * from teacher where email='$email' and pass='$password' and schoolrank='principal'";
            $nameQ ="select name from teacher where email='$email'";
            $name = mysqli_query($con,$nameQ) or die("Error");
            while($row = $name->fetch_assoc()){
                 $_SESSION['name'] = $row['name'];
            }
            $res = mysqli_query($con,$loginQ) or die("Error");
            if(mysqli_num_rows($res)){
                $_SESSION['rank'] = "principal";
                echo "<script>location.href='dashbord.PHP'</script>";
            }else{
                $msg="place enter veiled email and password";
            }
            
        }elseif($rank === "student"){
            
            $loginQ = "select * from student where email='$email' and pass='$password'";
            $msg="error";
            $res = mysqli_query($con,$loginQ) or die("Error");
            if(mysqli_num_rows($res)){
                $nameQ ="select name from student where email='$email'";
                $name = mysqli_query($con,$nameQ) or die("Error");
                while($row = $name->fetch_assoc()){
                 $_SESSION['name'] = $row['name'];
            }
                $_SESSION['rank'] = "student";
                echo "<script>location.href='dashbord.PHP'</script>";
            }else{
                $msg="place enter veiled email and password";
            }
        }else{
            $loginQ = "select * from teacher where email='$email' and pass='$password' and schoolrank='teacher'";
            $res = mysqli_query($con,$loginQ) or die("Error");
            if(mysqli_num_rows($res)){
                $nameQ ="select name from teacher where email='$email'";
                $name = mysqli_query($con,$nameQ) or die("Error");
                while($row = $name->fetch_assoc()){
                 $_SESSION['name'] = $row['name'];
            }
                $_SESSION['rank'] = "teacher";
                echo "<script>location.href='dashbord.PHP'</script>";
            }else{
                $msg="place enter veiled email and password";
            }
        }
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
    <main class="loginmain">
        <div class="loginCantainer">
            <form action="login.php" method="post">
                <div>
                    <label for="email">email</label><br>
                    <input type="email" name="email" id="email" placeholder="email" required>
                </div>
                <div>
                    <label for="password">password</label><br>
                    <input type="password" name="password" id="password" placeholder="password" required>
                </div>
                <div>
                    <label for="principal">principal</label>
                    <input type="radio" name="rank" id="principal" value="principal" required>
                    <label for="tracher">tracher</label>
                    <input type="radio" name="rank" id="tracher" value="tracher" required>
                    <label for="student">student</label>
                    <input type="radio" name="rank" id="student" value="student">
                </div>
                <input type="submit" value="submit">
                <div class="msg"><?php echo $msg ?></div>
            </form>
        </div>
    </main>
    <footer>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum, ipsum.</p>
    </footer>
</body>
</html>