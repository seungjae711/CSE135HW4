<?php
    $con = mysqli_connect("localhost", "root", "tmdwo3264", "basic"); 
    $sql = "SELECT click, COUNT(*) as Count FROM events GROUP BY click";
    $result = $con->query($sql);

    $data = array();
    while($rows = $result->fetch_assoc()){
        $data[]= $rows; 
    }
    print json_encode($data);
?>