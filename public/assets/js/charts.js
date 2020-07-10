
    var ctx = document.getElementById('visits');
    var ctx1 = document.getElementById('fileschart');

    window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};
    var details = {
                steppedLine: false,
				label: 'بازدیدهای سایت در یک هفته اخیر',
                color: window.chartColors.red
            }
            var myChart = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ['درام','اکشن','جنایی','خانوادگی'],
        datasets: [{
            label: 'تعداد محتوا',
            data: ['10','4','10','20'],
            backgroundColor: [
                window.chartColors.blue,
                window.chartColors.blue,
                window.chartColors.blue,
                window.chartColors.blue,
                window.chartColors.blue,
                window.chartColors.blue
            ],
           
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

    var myChart = new Chart(ctx, {
        type: 'line',
				data: {
					labels: ['دیروز','امروز'],
					datasets: [{
						label: 'تعداد بازدیدها: ',
						steppedLine: details.steppedLine,
						data:['1','2'],
						borderColor: details.color,
						fill: false,
					}]
				},
                options: {
					responsive: true,
					title: {
						display: true,
						text: details.label,
					}
				}
    });
