<?php
session_start();
if(isset($_SESSION['log']))
{
?>

<?php
	session_start();
    if(!isset($_SESSION['log'])){
        echo "hello!";
    }else {
	    echo "Hello! " . $_SESSION['nickname'] . " you are logged in";
    }

?>

<?php
    $name = $_SESSION['log'];
    $nick = $_SESSION['nickname'];
    $con=mysqli_connect("localhost","root","tmdwo3264","users");
    $sql= "SELECT * FROM  login_info WHERE `username`='$name' ";
    $result = $con->query($sql);
    
    while($rows = $result->fetch_assoc()){

        $basic = $_SESSION['basic'];
        $speed = $_SESSION['speed'];
        $error = $_SESSION['error'];
        $event = $_SESSION['event'];
    }
?>


<!DOCTYPE html>
<html>
<head>
<title>welcome!</title>
<style>
            .dd {
                width: 5%;
                padding: 12px 20px;
                border: 8px solid #4CAF50;
                border-radius: 4px;
            }
            
            a {
                text-align: center;
                color:green;
                font-size: 37px;
                padding: 5px;
                margin: 5px;
            }
    </style>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<h1>Welcome!!  </h1>

    <table id ="table" align ="center" border ="1px" style="width:600px; line-height:40px;">
            <th colspan="7"><h2>Your profile</h2></th>

        <tr>
            <td>nickname</td>
            <td><?php echo $nick; ?></td>
        </tr>
        <tr>
            <td>Basic information permission</td>
            <td><?php echo $basic; ?></td>       
        </tr>
        <tr>
            <td>Speed report permission</td>
            <td><?php echo $speed; ?></td>
        </tr>
        <tr>
            <td>Error report permission</td>
            <td><?php echo $error; ?></td>
        </tr>    
        <tr>
            <td>Event report permission</td>
            <td><?php echo $event; ?></td>
        </tr>

    </table>


<a id ="basic" href="./connection.php">Basic Client Characteristics</a><br><hr><br>
<a id ="speed" href="./SpeedC.php">Speed </a><br><hr><br>
<a id ="error" href="./ClientErrors.php">Errors</a><br><hr><br>
<a id ="event" href="./ClientEvents.php">Events</a><br><hr>


<br>
<br>
<br>
<br>
<br>
<br>
<a href="index.php">Get some more data by going home</a>
<br>

<br>
<a href="login.php" >logout</a>

<script>
    if ("<?php echo $basic; ?>" == "NO") {
        var x = document.getElementById("basic");
        x.style.display = "none";
    }
    if ("<?php echo $speed; ?>" == "NO") {
        var x = document.getElementById("speed");
        x.style.display = "none";
    }
    if ("<?php echo $error; ?>" == "NO") {
        var x = document.getElementById("error");
        x.style.display = "none";
    }
    if ("<?php echo $event; ?>" == "NO") {
        var x = document.getElementById("event");
        x.style.display = "none";
    }
</script>


</body>
</html>

<?php
}else
{
	echo "please fill proper details";
	header("refresh:2;url=index.php");
}

?>