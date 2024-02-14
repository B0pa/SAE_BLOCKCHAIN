

<main class="mt-5 pt-5" >
    <div class=" mt-3 d-flex align-items-center mx-auto w-75">
        <?=$this->Html->image('cryptobitcoin.png', ['class' => 'img-fluid rounded-circle p-2 ','alt' => 'accueil','style' => 'width: 100px; height: 100px;'])?>
        <h2 class="text-center" >Courbe du Bitcoin</h2>
    </div>

    <div class="" >
        <select id="chartType" onchange="changeChartType()">
            <option value="line">Line</option>
            <option value="candlestick">Candlestick</option>
        </select>
        <canvas id="chart" class="m-2" style="max-height:60vh"></canvas>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/luxon@1.26.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.1/dist/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@1.0.0"></script>
<?= $this->Html->script('chartjs-chart-financial') ?>


<script>
    // Récupération du context du canvas
    // Récupération du context du canvas
    const ctx = document.getElementById('chart').getContext('2d');

    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    // Création du graphique
    var chart;

    // Fonction pour créer le graphique
    function createChart(chartType) {
        // Destruction s'il existe déjà
        if(chart) {
            chart.destroy();
        }

        // Création
        chart = new Chart(ctx, {
            type: chartType,
            data: {
                datasets: [{
                    label: 'BTCUSDT',
                    data: [],
                    borderColor: 'yellow',
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
    }

    // Formatter pour les données en mode Line
    function formatLine(candle) {
        return {
            x: candle[0],
            y: candle[4]
        }
    }

    // Formatter pour les données en mode Candlestick
    function formatBar(candle) {
        return {
            x: candle[0], // Pass the timestamp directly
            o: parseFloat(candle[1]),
            h: parseFloat(candle[2]),
            l: parseFloat(candle[3]),
            c: parseFloat(candle[4])
        };
    }

    // Fonction de mise à jour des données
    async function updateData() {
        // Récupération des données
        const url = 'https://api.binance.com/api/v3/klines?symbol=BTCUSDT&interval=1m';
        const res = await fetch(url);
        const rawData = await res.json();

        // Formatage
        let formattedData = [];
        if(chart.config.type === 'line') {
            formattedData = rawData.map(formatLine);
        } else {
            // Take only every 10th data point for candlestick chart
            formattedData = rawData.filter((_, index) => index % 5 === 0).map(formatBar);
        }

        // Insertion des données dans le dataset
        chart.data.datasets[0].data = formattedData;

        // Update du graphique
        chart.update();
    }

    // Boucle à interval régulier
    setInterval(updateData, 10000);

    // Appel initial
    createChart('line');
    updateData();

    // Event listener pour le select
    document.getElementById('chartType').addEventListener('change', function() {
        createChart(this.value);
        updateData();
    });
</script>
