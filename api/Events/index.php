<?php
    $click = $_POST["click"];
    $scroll = $_POST['scroll'];
    echo $click;
    echo $scroll;

    $time = date("M, d, Y h:i:s A");
    echo $error;
    // Create connection
    $conn = new mysqli("localhost","root","tmdwo3264","basic");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "INSERT INTO events (click, scroll ,time) VALUE('$click','$scroll', '$time')";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $con=mysqli_connect("localhost","root","tmdwo3264","basic");
    $sql= "SELECT * FROM  events";
    $result = $con->query($sql);

    while($rows = $result->fetch_assoc()) {
        echo $rows['click'] . "  ";
        echo $rows['scroll'] . "\n";
    }
?> 

<script>
