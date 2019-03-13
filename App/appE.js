$(document).ready(function(){
    $.ajax({
        url: "http://localhost/Data/dataE.php",
        method: "GET",
        success: function(data){
            data = JSON.parse(data);
            console.log(data);
            var error2 = [];
            var number = [];
            console.log(data.length);
            for(var i=0; i < data.length; i++){
                error2.push(data[i].error);
                number.push(data[i].Count);
            }
            var chartdata = {
                labels: error2,
                datasets: [
                    {
                        label : errors,
                        backgroundColor: ['rgba(29, 202, 255, 0.75)', 'rgba(211, 72, 54, 0.75)', 'rgba(200, 200, 200, 0.75)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        borderColor: ['rgba(29, 202, 255, 1)', 'rgba(211, 72, 54, 1)', 'rgba(200, 200, 200, 0.75)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        hoverBackgroundColor: ['rgba(29,202, 255, 1)','rgba(211, 72, 54, 1)', 'rgba(200,200, 200, 1)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        hoverBorderColor: ['rgba(29, 202, 255, 1)','rgba(211, 72, 54, 1)', 'rgba(200, 200, 200, 1)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        data: number
                    }
                ]
            };

            var ctx = $("#canvas5");
            var myBarChart = new Chart(ctx, {
                type: 'horizontalBar',
                data: chartdata,
                options: 'top'
            }); 
        },
        error: function(data){
            console.log(data);
        } 
    });

});