<?php
$uname=$_POST['username'];//username
$password=$_POST['password'];//password 

session_start();

$con=mysqli_connect("localhost","root","tmdwo3264","users");
$result=mysqli_query($con,"SELECT * FROM `login_info` WHERE `username`='$uname' && `password`='$password'");
$count=mysqli_num_rows($result);


while($rows = $result->fetch_assoc()){
    $nickname = $rows['Nickname']; 
    $basic = $rows['basic'];
    $speed = $rows['speed'];
    $error = $rows['error'];
    $event = $rows['event'];
}

$con=mysqli_connect("localhost","root","tmdwo3264","users");
$result2=mysqli_query($con,"SELECT * FROM `adminUsers` WHERE `username`='$uname' && `password`='$password'");
$count2=mysqli_num_rows($result2);

if($count==1)
{
    $_SESSION['log']=$uname;
    $_SESSION['nickname'] = $nickname;
    $_SESSION['basic'] = $basic;
    $_SESSION['speed'] = $speed;
    $_SESSION['error'] = $error;
    $_SESSION['event'] = $event;

    header("refresh:1; url=http://localhost/welcome.php");
    echo "Login success!!";
}else if($count2 == 1) {
    $_SESSION['log']=$uname;
    $_SESSION['browser'] = $uname;
    header("refresh:1; url=http://localhost/welcome2.php");
    echo "Login success!!";
}else
    {
        header("refresh:1; url=login.php");
        echo "Sorry your information is not correct. Try it again!";
    }
?>
