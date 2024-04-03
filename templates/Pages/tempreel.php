

<main id="temps-main" class="navmarge" >
    <div id="temps-titre-conteneur">
        <?=$this->Html->image('cryptobitcoin.png', ['alt' => 'accueil'])?>
        <h2>Courbe du Bitcoin</h2>
    </div>

    <div id="temps-graphics-conteneur"  style="position: relative; height:600px; width:100%" >
        <select id="chartType" onchange="changeChartType()">
            <option value="line">Line</option>
            <option value="candlestick">Candlestick</option>
        </select>
        <canvas id="chart"></canvas>
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

    console.log("TEST");

    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;




    color ='yellow';


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
                    borderColor: color,
                }]
            },
            options: {
                responsive: true, // Ajoutez cette ligne
                maintainAspectRatio: false, // Ajoutez cette ligne
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'minute'
                        },
                        grid: {
                            display: true,
                            color: 'rgba(255, 255, 255, 0.4)',
                        },
                        ticks:{
                            color: 'rgba(255, 255, 255, 0.6)'
                        }
                    },
                    y: {
                        grid: {
                            display: true,
                            color: 'rgba(255, 255, 255, 0.4)',
                        },
                        ticks:{
                            color: 'rgba(255, 255, 255, 0.6)'
                        }
                    }
                },
                plugins: {
                    legend:{
                        labels:{
                            color:'rgba(255, 255, 255, 0.6)'
                        }
                    }
                }
            }
        });
    }

    // Formatter pour les données en mode Line
    function formatLine(candle) {
        color = 'white';
        return {
            x: candle[0],
            y: candle[4]
        }
    }

    // Formatter pour les données en mode Candlestick
    function formatBar(candle) {
        color = 'yellow';
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
            if(isMobileDevice()){
                formattedData = rawData.filter((_, index) => index % 25 === 0).map(formatLine);
            }
            else{
                formattedData = rawData.filter((_, index) => index % 5 === 0).map(formatLine);
            }
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

    function isMobileDevice() {
        if (

            navigator.userAgent.match(/iPhone/i) ||
            navigator.userAgent.match(/webOS/i) ||
            navigator.userAgent.match(/Android/i) ||
            navigator.userAgent.match(/iPad/i) ||
            navigator.userAgent.match(/iPod/i) ||
            navigator.userAgent.match(/BlackBerry/i) ||
            navigator.userAgent.match(/Windows Phone/i)
        ) {
            console.log("mobile");
            return true;

        } else {
            console.log("ordi");
            return false;
        }
    }
</script>
