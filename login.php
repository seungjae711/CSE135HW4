<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    
<form method="POST" action="loginHelper.php">
    <input type="hidden" name="width" id="width" value="3">
    <input type="hidden" name="height" id="height" value="3">
    <input type="hidden" name="browser" id="browser" value="3">
    <input type="hidden" name="platform" id="platform" value="3">
	Enter Username : <input type="text" name="username"><br><br>
	Enter Password : <input type="password" name="password"><br><br>
	<input type="submit" value="Login">
 
</form>

</body>
</html>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    var findwidth = screen.width;
    var findheight = screen.height;
    var findbrowser = navigator.userAgent;
    var findplatform = navigator.platform;
    var resultB;
    
    var ba = ["Chrome", "Firefox", "Safari", "Opera", "MSIE", "Mozilla", "BlackBerry", "Internet Explorer"];
    
    for(var i=0; i < ba.length; i++) {
        if(findbrowser.indexOf(ba[i]) > -1 ){
            resultB = ba[i];
            break;
        }
    }

    document.getElementById("width").value = findwidth;
    document.getElementById("height").value = findheight;
    document.getElementById("browser").value = resultB;
    document.getElementById("platform").value = findplatform;
    
    $.ajax({
        url: 'api/basicC/index.php',
        data: {width: findwidth, height: findheight, browser: resultB, platform: findplatform},
        type: 'POST',
        success: function(response) {
        //alert(response);
        }
    });
    
</script>

<?php
session_destroy();
?>
