<?php
session_start();
$msg="";
require "db.php";
if($_SESSION['rank'] != "principal"){
    echo "<script>alert('permission not allowde')</script>";
    echo "<script>location.href='dashbord.PHP'</script>";
}


$mydate=getdate(date("U"));
$date ="$mydate[year]-0$mydate[mon]-$mydate[mday]";


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $salary = mysqli_real_escape_string($con ,$_POST["salary"]);
          if(!empty($_POST['checkArr'])){
            foreach($_POST['checkArr'] as $checked){
                $atten ="update school.teacher
                set salary='$salary',ldate='$date'
                where id='$checked';";
                $att = mysqli_query($con,$atten);
            }
          } else {
            $msg= '<div class="errorch">Checkbox is not selected!</div>';
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
            <table>
                <thead>
                    <tr>
                        <th>name</th>
                        <th>salary</th>
                        <th>Total</th>
                        <th>total month</th>
                        <th>last pay</th>
                        <th colspan="2">modify</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                 function monthcount($date1,$date)
                    {
                        $ts1 = strtotime($date1);
                        $ts2 = strtotime($date);

                        $year1 = date('Y', $ts1);
                        $year2 = date('Y', $ts2);

                        $month1 = date('m', $ts1);
                        $month2 = date('m', $ts2);

                        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);

                        return $diff;
                    }

                    $teacherNameQ ="SELECT id,name,salary,ldate FROM school.teacher where schoolrank='teacher'";
                        $name = mysqli_query($con,$teacherNameQ) or die("Error");
                        if(mysqli_num_rows($name)){
                            while($row = $name->fetch_assoc()){
                                echo "<tr><td>".$row['name']."</td>
                                <form action=\"teacherfess.php\" method=\"post\">
                                <td><input type='text' name='salary' id='name' value='".$row['salary']."' required></td>
                                <td>".$row['salary']*monthcount($row['ldate'],$date)."₹</td>
                                <td>".monthcount($row['ldate'],$date)."</td>
                                <td>".$row['ldate']."</td>
                                <td><input type='checkbox' name='checkArr[]' value='". $row["id"]."'/></td>";
                                if(monthcount($row['ldate'],$date)>0){
                                    echo "<td><input type='submit' value='submit'/></td></form>";
                                }else{
                                    echo "<td><div class=\"disabled\"><input type='submit' value='submit' disabled/></div></td></form>";
                                }
                            }
                        }
                    ?>

                    </tr>
                </tbody>
            </table>
        </div>
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