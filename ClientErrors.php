<?php
	session_start();
     if(!isset($_SESSION['log'])){
        echo "hello!";
     }else {
	echo "Hello! " . $_SESSION['log'] . " you are logged in";
     }
?>

<?php
$con=mysqli_connect("localhost","root","tmdwo3264","basic");
$sql= "SELECT * FROM errors ";
$result = $con->query($sql);
?>


<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './Exception.php';
require './PHPMailer.php';
require './SMTP.php';


if(isset($_POST["data"]))
{
    $name = $_POST['N'];
    $email = $_POST['E'];
    $subject = $_POST['S'];
    //echo $pdf;
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                              // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'testsungjae@gmail.com';                 // SMTP username
    $mail->Password = 'Tmdwo3264!';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('testsungjae@gmail.com', 'Sungjae');
    $mail->addAddress($email, $name);     // Add a recipient

    $base = base64_decode( $_POST['data']);

    $mail->addStringAttachment($base, 'pdfName.pdf');

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = 'Here is a beautiful chart data';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client Errors</title>


    <link rel="stylesheet" href="style.css" />
    <style>     
            a {
                text-align: center;
                color:green;
                font-size: 37px;
                padding: 5px;
                margin: 5px;
            }
    </style>
</head>

<body>


    <h2>Error</h2>
    <div id="chart-container">
        <canvas id=canvas5></canvas>
    </div>
    <h3>Email this chart to where you want to see it</h3>
    <form method="post">
        <label>Subject:</label>
        <input type="text" name="subject" id="subject"><br>
        <label>Name:</label>
        <input type ="text" name="name" id ="name"><br>
        <label>Email:</label>
        <input type="text" name="email" id ="email"><br>

        <input style=" width: 150px ;" type="submit" name="data" value="PDF Send" onclick ="downloadPDF()"/>
    </form>

    <script type="text/javascript">

        //document.getElementById('download-pdf').addEventListener("click", downloadPDF);
        
        function downloadPDF() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var subject = document.getElementById("subject").value;

            var newCanvas = document.querySelector('#canvas5');

            //create image from dummy canvas
            var newCanvasImg = newCanvas.toDataURL("image/jpeg", 1.0);
    
            //creates PDF from img
            var doc = new jsPDF('landscape');
            doc.setFontSize(15);
            doc.text(10, 7, "Errors");
            doc.addImage(newCanvasImg, 'JPEG', 10, 10, 280, 150 );
            doc.save('errorData.pdf');
            var pdf = btoa(doc.output()); 
            $.post("ClientErrors.php", 
            {
                data: pdf,
                N : name,
                E : email,
                S : subject 
            }, function (response,status) { console.log(response); });
        }
    
    </script>

    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="Chart.min.js"></script>
    <script type="text/javascript" src="App/appE.js"></script>
    <script type="text/javascript" src = "jspdf.min.js"></script>
    <script type="text/javascript" src = "html2canvas.js"></script>



    <br>
 
    <a href="./welcome.php">See other data!</a><br><br>
    <a href="index.php">Get some more data by going home</a>
    
</body>
</html>