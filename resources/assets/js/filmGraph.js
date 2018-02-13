const $ = require('jquery');
const Chart = require('chart.js');
const moment = require('moment');

function chargeGraph(fechas) {

    let ctx = document.getElementById("filmGraph");


    let dates = fechas.map(x => moment(x));

    let dataChart = {
        labels: dates.map(x => x._i),
        datasets: [{
            label: "Date views",
            data: dates,
            lineTension: 0,
            fill: false,
            borderColor: 'grey',
            backgroundColor: 'transparent',
            pointBorderColor: 'orange',
            pointBackgroundColor: 'rgba(255,150,0,0.5)',
            borderDash: [5, 5],
            pointRadius: 5,
            pointHoverRadius: 10,
            pointHitRadius: 30,
            pointBorderWidth: 2,
            pointStyle: 'rectRounded'
        }]
    };


    let chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 80,
                fontColor: 'black'
            }
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                    color: "black"
                },
                scaleLabel: {
                    display: true,
                    labelString: "Time the film is viewed",
                    fontColor: "red"
                }
            }],
            yAxes: [{
                gridLines: {
                    color: "black",
                    borderDash: [2, 5],
                },
                scaleLabel: {
                    display: true,
                    labelString: "Views",
                    fontColor: "green"
                }
            }]
        }
    };

    let myChart = new Chart(ctx, {
        type: 'line',
        data: dataChart,
        options: chartOptions
    });
    
}


$(function () {
    axios.get('/views/film?id=' + document.getElementById('filmId').value)
        .then(function ($response) {
            let data = $response.data;
            let fechas = [];
            data.map(x => fechas.push(x.created_at));
            fechas.sort((a, b) => new Date(a) - new Date(b));
            chargeGraph(fechas)
        }).catch(function (error) {
        console.log(error)
    });
});

