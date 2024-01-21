
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
            borderColor: 'rgb(255, 193, 7)',
        }]
    };

    var options = {
        scales: {
            x: {
                display: true,
                time: {
                    displayFormats: {
                        minute: 'HH:mm'
                    }
                }
            }
        }
    };

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

        data.labels.push(new Date());
        data.datasets[0].data.push(price);



        chart.update();
    }

    setInterval(fetchData, 100 * 60);

    fetchData();
</script>

</body>
</html>
