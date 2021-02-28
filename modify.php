<?php
session_start();
$msg="";
require "db.php";
if($_SESSION['rank'] != "principal" && $_SESSION['rank']!="teacher"){
    echo "<script>location.href='dashbord.PHP'</script>";
}

require "db.php";
if (!empty($_GET)) {
       $search = $_GET["id"];
} else{
    echo "<script>location.href='stutentdata.php'</script>"; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($con ,$_POST["name"]);
    $fname = mysqli_real_escape_string($con ,$_POST["fname"]);
    $email = mysqli_real_escape_string($con ,$_POST["email"]);
    $password = mysqli_real_escape_string($con ,$_POST["password"]);
    $gender = mysqli_real_escape_string($con ,$_POST["gender"]);
    $class = mysqli_real_escape_string($con ,$_POST["class"]);

    $emailavl = "select email from student where email='$email'";
    $res = mysqli_query($con,$emailavl) or die("Error");
    if(mysqli_num_rows($res)>0){
        $msg ="email is used TRY other email";
    }else{
        $emailavl = "UPDATE school.student
        SET name='$name',fname='$fname', email='$email',pass='$password',gender='$gender',class='$class'
        WHERE roll='49'";
        $res = mysqli_query($con,$emailavl) or die("Error");
        echo "<script>alert('record update successfully')</script>";
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
                            <a href="studentdata.php">
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
                    </ul>
                </div>
            </nav>
        </header>
    </div>
    </header>
    <main class="addCantainer">
        <div class="Cantainer">
            
            <form action="modify.php" method="post">
            <?php 
            $qdata = "SELECT * FROM school.student where roll='$search'";
            $resList = mysqli_query($con,$qdata) or die("Error");
            if(mysqli_num_rows($resList)>0){
                    while($row = $resList->fetch_assoc()) {
                        echo '<div>
                <label for="name">full name</label><br/>
                <input type="text" name="name" id="name" placeholder="full name" value="'.$row['name'].'" required>
            </div>
            <div>
                <label for="fname">father name</label><br/>
                <input type="text" name="fname" id="fname" placeholder="father name" value="'.$row['fname'].'" required>
            </div>
            <div>
                <label for="email">eamil</label><br/>
                <input type="email" name="email" id="email" placeholder="email" value="'.$row['email'].'" required>
            </div>
            <div>
                <label for="password">password</label><br/>
                <input type="password" name="password" id="password" placeholder="password" value="'.$row['pass'].'" required>
            </div>
            <div>
                <label for="gender">gender</label><br/>
                <input type="text" name="gender" id="gender" placeholder="gender" value="'.$row['gender'].'" required>
            </div>
            <div>
                <label for="class">class</label><br/>
                <input type="number" name="class" id="class" placeholder="class" maxlength="12" value="'.$row['class'].'" required >
            </div>
            <div class="adddata"> <input type="submit" value="modify"></div>
           <div class="msg">'.$msg.'</div>';
                    }
                    
        } else {
                        echo "0 results";
                }
            ?>
            </form>
        </div>
    </main>
    <footer>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum, ipsum.</p>
    </footer>
    <script>

document.querySelector("#tracher").addEventListener('change',(e)=>{
            if(e.target.checked === true){
                document.querySelector("#class").disabled = true;
                document.querySelector("#class").style.opacity= 0.2;
            }
        })
 document.querySelector("#student").addEventListener('change',(e)=>{
            if(e.target.checked === true){
                document.querySelector("#class").disabled = false;
                document.querySelector("#class").style.opacity= 1;
            }
        })
    </script>
</body>
</html>