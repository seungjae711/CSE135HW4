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
<html>
<head>
<title>welcome!</title>
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
<h1>Welcome!!  </h1>

<a href="./connection.php">Basic Client Characteristics</a><br><hr><br>
<a href="./SpeedC.php">Speed </a><br><hr><br>
<a href="./ClientErrors.php">Errors</a><br><hr><br>
<a href="./ClientEvents.php">Events</a><br><hr>




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

    <a href="addU.php">Add users</a><br><br>
    <a href="editU.php">Edit users</a><br><br>
    <a href="deleteU.php">Delete users</a><br>

    
    

    <script>

        var rIndex, table = document.getElementById("table");
       
        //Add an issue
        function addRow() {
            var name = document.getElementById("name").value;
            var password = document.getElementById("password").value;
          
            //add an issue in the table
            var newRow = table.insertRow(table.length);
 
            var col1 = newRow.insertCell(0);
            var col2 = newRow.insertCell(1);
           
            col1.innerHTML = name;
            col2.innerHTML = password;

        
            selectRow();         
        }
        function selectRow() {
            for(var i =1; i < table.rows.length; i++) {
                table.rows[i].onclick = function() {
                    rIndex = this.rowIndex;      
                    document.getElementById("name").value = this.cells[0].innerHTML;
                    document.getElementById("password").value = this.cells[1].innerHTML;
                   
                };
            }
        }    
    
        selectRow();

        //Edit an issue
        function editRow() {

            var id = document.getElementById("name").value;
            var password = document.getElementById("password").value;
 
            //edit an issue in the table
            table.rows[rIndex].cells[0].innerHTML = id;
            table.rows[rIndex].cells[1].innerHTML = password;
            
        }
        
        //Delete an issue
        function deleteRow() {

            var id = document.getElementById("name").value;
            var password = document.getElementById("password").value;
                       
            //Delete an issue in the table
            table.deleteRow(rIndex);
        }
              
        //Confirm message
        function deleteConfirm() {
            var x = confirm("Are you sure to delete this issue???");
            if(x) {
                return deleteRow();
            }else {
                return false;
            }
        }
    </script>


        <script>

        var rIndex, table = document.getElementById("table2");
       
        //Add an issue
        function addRow() {
            var name = document.getElementById("name").value;
            var password = document.getElementById("password").value;
          
            //add an issue in the table
            var newRow = table.insertRow(table.length);
 
            var col1 = newRow.insertCell(0);
            var col2 = newRow.insertCell(1);
           
            col1.innerHTML = name;
            col2.innerHTML = password;

        
            selectRow();         
        }
        function selectRow() {
            for(var i =1; i < table.rows.length; i++) {
                table.rows[i].onclick = function() {
                    rIndex = this.rowIndex;      
                    document.getElementById("name").value = this.cells[0].innerHTML;
                    document.getElementById("password").value = this.cells[1].innerHTML;
                   
                };
            }
        }    
    
        selectRow();

        //Edit an issue
        function editRow() {

            var id = document.getElementById("name").value;
            var password = document.getElementById("password").value;
 
            //edit an issue in the table
            table.rows[rIndex].cells[0].innerHTML = id;
            table.rows[rIndex].cells[1].innerHTML = password;
            
        }
        
        //Delete an issue
        function deleteRow() {

            var id = document.getElementById("name").value;
            var password = document.getElementById("password").value;
                       
            //Delete an issue in the table
            table.deleteRow(rIndex);
        }
              
        //Confirm message
        function deleteConfirm() {
            var x = confirm("Are you sure to delete this issue???");
            if(x) {
                return deleteRow();
            }else {
                return false;
            }
        }
    </script>
    <br>




<br>
<br>
<a href="index.php">Get some more data by going home</a>
<br>

<br>
<a href="login.php" >logout</a>

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