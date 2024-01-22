
<head>
    <title>Temp réel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>

</head>

<body class="bg-secondary">
<?= $this->element('nav2')?>

<main>
    <canvas id="chart"></canvas>

</main>
<script>
    var data = {
        labels: [],
        datasets: [{
            data: [],
            // barre de la courbe
            borderColor: 'rgb(255, 193, 7)',
        }]
    };

    var options = {

        scales: {
            x: {
                //Axe X
                display: true,
                grid: {
                    color: 'rgb(197, 222, 198)'
                },
                ticks: {
                    color: 'rgb(197, 222, 198)'
                },
                time: {
                    displayFormats: {
                        minute: 'HH:mm:ss'
                    }
                }
            },
            //Axe Y
            y: {
                grid: {
                    color: 'rgb(197, 222, 198)'
                },
                ticks: {
                    color: 'rgb(197, 222, 198)'
                }
            }
        },
        // point de la courbe
        elements: {
            line: {
                borderColor: 'rgb(0, 0, 0)'
            },
            point: {
                backgroundColor: 'rgb(0, 0, 0)'
            }
        }
    }

    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: options
    });

    async function fetchData() {
        const response = await fetch('//api.coindesk.com/v1/bpi/currentprice.json');
        const json = await response.json();
        const price = parseFloat(json.bpi.USD.rate.replace(/,/g,''));

        data.labels.push(new Date().toISOString().slice(11,19));
        data.datasets[0].data.push(price);



        chart.update();
    }

    setInterval(fetchData, 100 * 60);

    fetchData();
</script>

</body>
</html>
