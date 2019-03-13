/*
colorA = [
    {
        label :  'resolution',
        backgroundColor: 'rgba(200, 200, 200, 0.75)',
        borderColor: 'rgba(200, 200, 200, 0.75)',
        hoverBackgroundColor: 'rgba(200,200, 200, 1)',
        hoverBorderColor: 'rgba(200, 200, 200, 1)',
        data: number
    },
    {
        label :  'resolution',
        backgroundColor: 'rgba(29, 202, 255, 0.75)',
        borderColor: 'rgba(29, 202, 255, 1)',
        hoverBackgroundColor: 'rgba(29,202, 255, 1)',
        hoverBorderColor: 'rgba(29, 202, 255, 1)',
        data: number
    },
    {
        label :  'resolution',
        backgroundColor: 'rgba(211, 72, 54, 0.75)',
        borderColor: 'rgba(211, 72, 54, 1)',
        hoverBackgroundColor: 'rgba(211, 72, 54, 1)',
        hoverBorderColor: 'rgba(211, 72, 54, 1)',
        data: number
    }
]
*/

$(document).ready(function(){
    $.ajax({
        url: "http://localhost/Data/dataB.php",
        method: "GET",
        success: function(data){
            data = JSON.parse(data);
            console.log(data);
            var resolution = [];
            var number = [];
            console.log(data.length);
            for(var i=0; i < data.length; i++){
                resolution.push(data[i].resolution);
                number.push(data[i].Count);
            }
            var chartdata = {
                labels: resolution,
                datasets: [
                    {
                        label :  'resolution',
                        backgroundColor: ['rgba(29, 202, 255, 0.75)', 'rgba(211, 72, 54, 0.75)', 'rgba(200, 200, 200, 0.75)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        borderColor: ['rgba(29, 202, 255, 1)', 'rgba(211, 72, 54, 1)', 'rgba(200, 200, 200, 0.75)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        hoverBackgroundColor: ['rgba(29,202, 255, 1)','rgba(211, 72, 54, 1)', 'rgba(200,200, 200, 1)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        hoverBorderColor: ['rgba(29, 202, 255, 1)','rgba(211, 72, 54, 1)', 'rgba(200, 200, 200, 1)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        data: number
                    }
                ]
            };

            var ctx = $("#canvas1");
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