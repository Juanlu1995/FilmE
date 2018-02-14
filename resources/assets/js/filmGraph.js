const $ = require('jquery');
const Chart = require('chart.js');
const moment = require('moment');

function chargeGraph(fechas) {

    // TODO mejorar gráfica

    const ctx = document.getElementById("filmGraph");

    const dates = fechas.map(x => moment(x).year());

    let labels = [];

    labels = labels.concat(dates);

    let dataChart = {
        labels: labels,
        datasets: [{
            label: "Date view",
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
                    labelString: "VIEWS",
                    fontColor: "#BF532F",
                    fontSize: 40,
                }
            }],
            yAxes: [{
                gridLines: {
                    color: "black",
                    borderDash: [2, 5],
                },
                scaleLabel: {
                    display: true,
                    labelString: "TIME",
                    fontColor: "#2AB283",
                    fontSize: 40,
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
            const data = $response.data;
            let fechas = [];
            data.map(x => fechas.push(x.created_at));
            fechas.sort((a, b) => new Date(a) - new Date(b));
            chargeGraph(fechas)
        }).catch(function (error) {
        console.log(error)
    });

});

