<?php
    $con = mysqli_connect("localhost", "root", "tmdwo3264", "basic"); 
    $sql = "SELECT platform, COUNT(*) as Count FROM basicC GROUP BY platform";
    $result = $con->query($sql);

    $data = array();
    while($rows = $result->fetch_assoc()){
        $data[]= $rows; 
    }
    print json_encode($data);
?>



