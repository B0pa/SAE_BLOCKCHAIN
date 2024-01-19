
<head>

    <title>Temp réel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@1.1.0"></script>
</head>
<body>
<?= $this->element('nav2')?>
<main>
    <div>
        <h1>bitcoin</h1>
        <canvas id="chartContainer"></canvas>
    </div>
</main>

<script>
    var ctx = document.getElementById('chartContainer').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Bitcoin Price',
                data: [],
                borderColor: 'rgba(75, 192, 192, 1)',
                fill: false
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'time',
                    time: {
                        unit: 'minute'
                    }
                }
            }
        }
    });

    function fetchBitcoinPrice() {
        fetch('https://api.coindesk.com/v1/bpi/currentprice/BTC.json')
            .then(response => response.json())
            .then(data => {
                var date = new Date();
                chart.data.labels.push(date);
                chart.data.datasets[0].data.push(data.bpi.USD.rate_float);
                chart.update();
            });
    }

    fetchBitcoinPrice();
    setInterval(fetchBitcoinPrice, 60000); // Update every minute
</script>

</body>
</html>
