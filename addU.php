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
	    echo "Hello! " . $_SESSION['log'] . " you are logged in";
    }
    $con=mysqli_connect("localhost","root","tmdwo3264","users");
    $sql= "SELECT * FROM login_info ";
    $result = $con->query($sql);

    $con2=mysqli_connect("localhost","root","tmdwo3264","users");
    $sql= "SELECT * FROM  reports";
    $result2 = $con2->query($sql);
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>addU</title>
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
  
    <table id ="table" align ="center" border ="1px" style="width:600px; line-height:40px;">
        <tr>
            <th colspan="7"><h2>Users</h2></th>
        </tr>
        <t>
            <th>username</th>
            <th>password</th>
            <th>Nickname</th>
            <th>basic</th>
            <th>speed</th>
            <th>error</th>
            <th>event</th>

        </t>
    <?php
        while($rows = $result->fetch_assoc())
        {
    ?>  
        <tr>
            <td><?php echo $rows['username']?></td>
            <td><?php echo $rows['password']?></td>
            <td><?php echo $rows['Nickname']?></td>
            <td><?php echo $rows['basic']?></td>
            <td><?php echo $rows['speed']?></td>
            <td><?php echo $rows['error']?></td>
            <td><?php echo $rows['event']?></td>      
        </tr>
    <?php
        }
    ?>
    </table>

    <div class="T1" style="border: 2px solid #4CAF50; width: 100%; align-items: center; font-weight: bolder">
    <form method ="POST" action ="addhelper.php">
        <p style="font-size: 30px; color: #4CAF50"><strong>Add users</strong></p>
    
        <label for="name">User Name</label><br>
        <input type="text" name="name" id="name" placeholder="Enter Your User Name" ><br>

        <label for="LogIn">Password</label><br>
        <input type="text" name="password" id="password" placeholder="Enter password"><br>

        <label for="LogIn">Nickname</label><br>
        <input type="text" name="nickname" id="nickname" placeholder="Enter nickname"><br>
        
        <label for="name">Client Characteristics</label><br>
        <select style=" width: 150px ; height: 60px;" name="basic" id="basic">
            <option value="YES">YES</option>
            <option value="NO">NO</option>
        </select><br>
        <label for="name">BROWSER SPEED</label><br>
        <select style=" width: 150px ; height: 60px;" name="speed" id="speed">
            <option value="YES">YES</option>
            <option value="NO">NO</option>
        </select><br>
        <label for="name">ERRORS</label><br>
        <select style=" width: 150px ; height: 60px;" name="error" id="error">
            <option value="YES">YES</option>
            <option value="NO">NO</option>
        </select><br>
        <label for="name">EVENTS</label><br>
        <select style=" width: 150px ; height: 60px;" name="event" id="event">
            <option value="YES">YES</option>
            <option value="NO">NO</option>
        </select>
        <br>        
        <br>
        
        <input style=" width: 150px ;" type ="submit" name="submit" value="Add" onclick="addRow()">Add</input><br>      
    </form>
    </div>
    <br>
    <br>
    <br>
    <a href="welcome2.php">Go to Back</a>

</body>
</html>






<?php
}
else
{
	echo "please fill proper details";
	header("refresh:2;url=index.php");
}

?>