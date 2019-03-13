<?php
    $con = mysqli_connect("localhost", "root", "tmdwo3264", "basic"); 
    $sql = "SELECT * FROM loadingtime ";
    $result = $con->query($sql);

    $data = array();
    while($rows = $result->fetch_assoc()){
        $data[]= $rows; 
    }
    print json_encode($data);
?>
