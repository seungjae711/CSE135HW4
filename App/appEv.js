$(document).ready(function(){
    $.ajax({
        url: "http://localhost/Data/dataEv.php",
        method: "GET",
        success: function(data){
            data = JSON.parse(data);
            console.log(data);
            var click = [];
            var number = [];
            console.log(data.length);
            for(var i=0; i < data.length; i++){
                //click.push(data[i].click);
                number.push(data[i].Count);
            }
            click.push("clicked");
            click.push("scrolled")
            var chartdata = {
                labels: click,
                datasets: [
                    {
                        //label : error2,
                        backgroundColor: ['rgba(29, 202, 255, 0.75)', 'rgba(211, 72, 54, 0.75)', 'rgba(200, 200, 200, 0.75)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        borderColor: ['rgba(29, 202, 255, 1)', 'rgba(211, 72, 54, 1)', 'rgba(200, 200, 200, 0.75)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        hoverBackgroundColor: ['rgba(29,202, 255, 1)','rgba(211, 72, 54, 1)', 'rgba(200,200, 200, 1)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        hoverBorderColor: ['rgba(29, 202, 255, 1)','rgba(211, 72, 54, 1)', 'rgba(200, 200, 200, 1)', 'rgba(0, 255, 0, 0.3)', 'rgba(255, 255, 0, 1.0)', 'rgba(255, 0, 255, 1.0)'],
                        data: number
                    }
                ]
            };

            var ctx = $("#canvas6");
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