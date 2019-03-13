<?php
    $width = $_POST['width'];
    $height = $_POST['height'];
    $browser = $_POST['browser'];
    $platform = $_POST['platform'];

    $time = date("M, d, Y h:i:s A");

    // Create connection
    $conn = new mysqli("localhost","root","tmdwo3264","basic");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "INSERT INTO basicC (resolution, browser, platform) VALUE('$width x $height', '$browser', '$platform')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $con=mysqli_connect("localhost","root","tmdwo3264","basic");
    $sql= "SELECT * FROM  basicC";
    $result = $con->query($sql);

    while($rows = $result->fetch_assoc()) {
        echo $rows['resolution'] . "  ";
        echo $rows['browser'] . "\n";
        echo $rows['platform'] . "\n";
    }
?> 