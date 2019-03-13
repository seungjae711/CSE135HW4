
$(document).ready(function(){
    $.ajax({
        url: "http://localhost/Data/dataP.php",
        method: "GET",
        success: function(data){
            data = JSON.parse(data);
            console.log(data);
            var platform = [];
            var number = [];
            console.log(data.length);
            for(var i=0; i < data.length; i++){
                platform.push(data[i].platform);
                number.push(data[i].Count);
            }
            var chartdata = {
                labels: platform,
                datasets: [
                    {
                        label : 'platform',
                        backgroundColor: ['rgba(29, 202, 255, 0.75)', 'rgba(211, 72, 54, 0.75)', 'rgba(200, 200, 200, 0.75)'],
                        borderColor: ['rgba(29, 202, 255, 1)', 'rgba(211, 72, 54, 1)', 'rgba(200, 200, 200, 0.75)'],
                        hoverBackgroundColor: ['rgba(29,202, 255, 1)','rgba(211, 72, 54, 1)', 'rgba(200,200, 200, 1)'],
                        hoverBorderColor: ['rgba(29, 202, 255, 1)','rgba(211, 72, 54, 1)', 'rgba(200, 200, 200, 1)'],
                        data: number
                    }
                ]
            };

            var ctx = $("#canvas4");
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