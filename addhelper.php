<?php
session_start();
    $kind = $_POST["submit"];
    $id = $_POST["name"];
    $password = $_POST["password"];
    $nickname = $_POST["nickname"];
    $basic = $_POST["basic"];
    $speed = $_POST["speed"];
    $error = $_POST["error"];
    $event = $_POST["event"];

    if($kind == "Add"){
        $conn = new mysqli("localhost","root","tmdwo3264","users");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "INSERT INTO login_info (username, password, Nickname, basic, speed, error, event) VALUE('$id', '$password', '$nickname', '$basic', '$speed', '$error', '$event')";
                
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("refresh:1.5; url=http://localhost/addU.php");
        echo "add a user success!!";
    
    }else if($kind == "Delete") {
        
        $id = $_POST["name"];
        $password = $_POST["password"];
        $conn = new mysqli("localhost","root","tmdwo3264","users");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $sql = "DElETE FROM login_info WHERE username = '$id' ";
                
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        header("refresh:1.5; url=http://localhost/deleteU.php");
        echo "delete a user success!!";

    }

?>