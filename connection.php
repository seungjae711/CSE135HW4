<?php
	session_start();
     if(!isset($_SESSION['log'])){
        echo "hello!";
     }else {
	echo "Hello! " . $_SESSION['log'] . " you are logged in";
     }
?>
<?php
$con= mysqli_connect("localhost","root","tmdwo3264","basic");
$sql= "SELECT * FROM basicC ";
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
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                         // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                 // Enable SMTP authentication
    $mail->Username = 'testsungjae@gmail.com';              // SMTP username
    $mail->Password = 'Tmdwo3264!';                         // SMTP password
    $mail->SMTPSecure = 'ssl';                              // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                      // TCP port to connect to

    //Recipients
    $mail->setFrom('testsungjae@gmail.com', 'Sungjae');
    $mail->addAddress($email,$name);                       // Add a recipient

    $base = base64_decode( $_POST['data']);

    $mail->addStringAttachment($base, 'pdfName.pdf');

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = 'Here is beautiful data in a chart';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $_POST = array();
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
    <title>Basic Client Characteristics</title>

    <link rel="stylesheet" href="style.css" />
    <style type="text/css">
        #chart-container {
            width: 640px;
            height: auto;
        }
    </style>
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

        <h2>Resolution</h2>
        <canvas id=canvas1></canvas>
        
        <h2>Browser</h2>
        <canvas id=canvas3></canvas>

        <h2>Platform</h2>
        <canvas id=canvas4></canvas>
        <h3>Email these data</h3>
        <form method="post">
            <label>Subject:</label>
            <input type="text" name="subject" id="subject"><br>
            <label>Name:</label>
            <input type ="text" name="name" id ="name"><br>
            <label>Email:</label>
            <input type="text" name="email" id ="email"><br>
            <input style=" width: 150px ;" type="submit" name="data" value="PDF Send" onclick = "downloadPDFR()">
        </form>
        <br>

    <script type="text/javascript">

        function downloadPDFR() {

            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var subject = document.getElementById("subject").value;
            var newCanvas1 = document.querySelector('#canvas1');
            var newCanvas2 = document.querySelector('#canvas3');
            var newCanvas3 = document.querySelector('#canvas4');

            //create image from dummy canvas
            var newCanvasImg1 = newCanvas1.toDataURL("image/jpeg", 1.0);
            var newCanvasImg2 = newCanvas2.toDataURL("image/jpeg", 1.0);
            var newCanvasImg3 = newCanvas3.toDataURL("image/jpeg", 1.0);
    
            //creates PDF from img
            var doc = new jsPDF("p", "mm", "a4");
            doc.setFontSize(15);
            doc.text(10, 7, "Resolution");
            doc.text(10, 97, "Browsers");
            doc.text(10, 187, "Paltform");
            doc.addImage(newCanvasImg1, 'JPEG', 10, 10, 160, 80, NaN, 'FAST');
            doc.addImage(newCanvasImg2, 'JPEG', 10, 100, 160, 80, NaN, 'FAST');
            doc.addImage(newCanvasImg3, 'JPEG', 10, 190, 160, 80, NaN, 'FAST');
            doc.save('resolutionData.pdf');
            var pdf = btoa(doc.output()); 
            $.post("connection.php", 
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
    <script type="text/javascript" src="App/appB.js"></script>
    <script type="text/javascript" src="App/appBr.js"></script>
    <script type="text/javascript" src="App/appP.js"></script>
    <script type="text/javascript" src = "jspdf.min.js"></script>
    <script type="text/javascript" src = "html2canvas.js"></script>


    
</body>



    <br>
    <a href="./welcome.php">See other data!</a><br><br>
    <a href="index.php">Get some more data by going home</a>

    
</html>