<?php
    $con = mysqli_connect("localhost", "root", "tmdwo3264", "basic"); 
    $sql = "SELECT error, COUNT(*) as Count FROM errors GROUP BY error";
    $result = $con->query($sql);

    $data = array();
    while($rows = $result->fetch_assoc()){
        $data[]= $rows; 
    }
    print json_encode($data);
?>