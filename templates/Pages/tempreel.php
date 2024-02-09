<?= $this->element('nav')?>

<main class="mt-5 pt-5" >
    <div class=" mt-3 d-flex align-items-center mx-auto w-75">
        <?=$this->Html->image('cryptobitcoin.png', ['class' => 'img-fluid rounded-circle p-2 ','alt' => 'accueil','style' => 'width: 100px; height: 100px;'])?>
        <h2 class="text-center" >Courbe du Bitcoin</h2>
    </div>

    <div class="" >
        <canvas id="chart" class="m-2" style="max-height:60vh"></canvas>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/luxon@1.26.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.1/dist/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script>
<?= $this->Html->script('chartjs-chart-financial') ?>

<script>
    var ctx = document.getElementById('chart').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'candlestick',
        data: {
            datasets: [{
                label: 'BTC/USDT',
                data: []
            }]
        }
    });

    function formatBar(candle) {
        return {
            x: candle[0], // Pass the timestamp directly
            o: parseFloat(candle[1]),
            h: parseFloat(candle[2]),
            l: parseFloat(candle[3]),
            c: parseFloat(candle[4])
        };
    }

    function updateChart() {
        fetch('https://api.binance.com/api/v3/klines?symbol=BTCUSDT&interval=1m&limit=60')
            .then(response => response.json())
            .then(data => {
                var formattedData = data.map(formatBar);

                // insertion dans le graphique
                chart.data.datasets[0].data = []; // Clear the existing data
                chart.data.datasets[0].data = formattedData; // Add the new data
                chart.update();
            })
            .catch(error => {
                console.error('An error occurred: ', error);
            });
    }

    // Appellez la fonction updateChart
    updateChart();

    // Appellez la fonction updateChart toutes les 10 secondes
    setInterval(updateChart, 10000);
</script>
