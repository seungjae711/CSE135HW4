<?php
    $speed = $_POST["speed"];

    echo $speed;

    $time = date("M, d, Y h:i:s A");
    echo $time;
    // Create connection
    $conn = new mysqli("localhost","root","tmdwo3264","basic");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "INSERT INTO loadingtime (speed, loadingtime) VALUE('$speed', '$time')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $con=mysqli_connect("localhost","root","tmdwo3264","basic");
    $sql= "SELECT * FROM  loadingtime";
    $result = $con->query($sql);

    while($rows = $result->fetch_assoc()) {
        echo $rows['speed'] . "  ";
        echo $rows['loadingtime'] . "\n";
    }
?> 