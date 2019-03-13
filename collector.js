
//speed
window.onload = function () {
    var loadTime = window.performance.timing.domContentLoadedEventEnd-window.performance.timing.navigationStart; 
    console.log('Page load time is '+ loadTime);
    $.ajax({
        url: 'api/Speed/index.php',
        data: {speed: loadTime},
        type: 'POST',
        success: function(response) {
                //alert(response);
        }
    });
}

//Errors
        window.onerror = function(message, url, line)   
        {
            $.ajax({
                url: 'api/errors/index.php',
                data: {errormsg: message},
                type: 'POST',
                success: function(response) {
                //alert(response);
                }
            });
        }

//Events
        window.addEventListener('scroll', () => {
            console.log('Scrolled!');
            $.ajax({
                url: 'api/Events/index.php',
                data: {click: "none", scroll: "scrolled"},
                type: 'POST',
                success: function(response) {
                //alert(response);
                }
            });
        });

        window.addEventListener('click', () => {
            var T = new Date();
            console.log('clicked!');

            $.ajax({
                url: 'api/Events/index.php',
                data: {click: "clicked", scroll: "none"},
                type: 'POST',
                success: function(response) {
                //alert(response);
                }
            });            
        });
        
//Basics 
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

        $.ajax({
            url: 'api/basicC/index.php',
            data: {width: findwidth, height: findheight, browser: resultB, platform: findplatform},
            type: 'POST',
            success: function(response) {
            //alert(response);
            }
        });
