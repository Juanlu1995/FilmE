const $ = require('jquery');
const Chart = require('chart.js');
const moment = require('moment');

function chargeGraph(fechas) {
    const ctx = document.getElementById("filmGraph");

    const views = fechas.map(x => moment(x).year());

    const dates = Array.from(new Set(views));

    const viewsCount = dates.map(fecha => views
            .filter(x => x === fecha)
            .length
        );

    let labels = [];

    labels = labels.concat(Array.from(dates));

    const dataChart = {
        labels: labels,
        datasets: [{
            label: "Date view",
            data: viewsCount,
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


    const chartOptions = {
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


    new Chart(ctx, {
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

