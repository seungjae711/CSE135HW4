
$(document).ready(function(){
    $.ajax({
        url: "http://localhost/Data/dataBr.php",
        method: "GET",
        success: function(data){
            data = JSON.parse(data);
            console.log(data);
            var browser = [];
            var number = [];
            console.log(data.length);
            for(var i=0; i < data.length; i++){
                browser.push(data[i].browser);
                number.push(data[i].Count);
            }
            var chartdata = {
                labels: browser,
                datasets: [
                    {
                        label : 'browser',
                        backgroundColor: ['rgba(29, 202, 255, 0.75)', 'rgba(211, 72, 54, 0.75)', 'rgba(200, 200, 200, 0.75)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        borderColor: ['rgba(29, 202, 255, 1)', 'rgba(211, 72, 54, 1)', 'rgba(200, 200, 200, 0.75)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        hoverBackgroundColor: ['rgba(29,202, 255, 1)','rgba(211, 72, 54, 1)', 'rgba(200,200, 200, 1)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        hoverBorderColor: ['rgba(29, 202, 255, 1)','rgba(211, 72, 54, 1)', 'rgba(200, 200, 200, 1)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        data: number
                    }
                ]
            };

            var ctx = $("#canvas3");
            var barGraph = new Chart(ctx, {
                type: 'pie',
                data: chartdata
            }); 
        },
        error: function(data){
            console.log(data);
        } 
    });

});