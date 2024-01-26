
<head>
    <title>Temp réel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>

</head>

<body class="bg-secondary" style="min-height:100vh;" >
<?= $this->element('nav2')?>

<?= $this->element('cookie_popup') ?>
<main class="mt-5 pt-5" >
    <div class=" mt-3 d-flex align-items-center mx-auto w-75">
        <?=$this->Html->image('cryptobitcoin.png', ['class' => 'img-fluid rounded-circle p-2 ','alt' => 'accueil','style' => 'width: 100px; height: 100px;'])?>
        <h2 class="text-center" >Courbe du Bitcoin</h2>
    </div>

    <div class="d-flex mt-2 bg-dark border-1 border border-warning p-2 w-75 mx-auto rounded-3" >
        <canvas id="chart" class="m-2" style="max-height:60vh"></canvas>
    </div>


</main>
<?= $this->element('footer')?>
<script>
    var data = {
        labels: [],
        datasets: [{
            data: [],
            label: 'Bitcoin',
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
                    color: 'rgb(108, 117, 125)'
                },
                ticks: {
                    color: 'rgb(255, 255, 255)'
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
                    color: 'rgb(108, 117, 125)'
                },
                ticks: {
                    color: 'rgb(255, 255, 255)'
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

        const now = new Date();

        const response = await fetch('//api.coindesk.com/v1/bpi/currentprice.json');
        const json = await response.json();
        const price = parseFloat(json.bpi.USD.rate.replace(/,/g, ''));

        data.labels.push(now.toLocaleTimeString());
        data.datasets[0].data.push(price);

        chart.update();

    }

    setInterval(fetchData, 100 * 60);

    fetchData();
</script>


</body>
</html>
