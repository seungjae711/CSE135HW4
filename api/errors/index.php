<?php
    $error = $_POST["errormsg"];
    echo $error;
    $time = date("M, d, Y h:i:s A");

    // Create connection
    $conn = new mysqli("localhost","root","tmdwo3264","basic");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "INSERT INTO errors (error,time) VALUE('$error', '$time')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $con=mysqli_connect("localhost","root","tmdwo3264","basic");
    $sql= "SELECT * FROM  errors";
    $result = $con->query($sql);

    while($rows = $result->fetch_assoc()) {
        echo $rows['error'] . "  ";
        echo $rows['time'] . "\n";
    }
?> 