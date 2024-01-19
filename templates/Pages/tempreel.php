
<head>
    <title>Temp réel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js"></script>

</head>

<body>
<?= $this->element('nav2')?>

<main>
    <canvas id="chart"></canvas>

</main>
<script>

    // Récupérer le canvas
    var ctx = document.getElementById('chart').getContext('2d');

    // Graphique
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                data: []
            }]
        }
    });

    // Fetch des données
    function fetchData() {
        fetch('https://api.coindesk.com/v1/bpi/currentprice.json')
            .then(res => res.json())
            .then(data => {
                console.log(data);
                // Vérifier les données
                if(!data || !data.bpi || !data.bpi.USD) {
                    return;
                }

                // Cours en USD
                var price = parseFloat(data.bpi.USD.rate.replace(/,/g, ''));

                // Ajouter au graph
                var timestamp = new Date();
                chart.data.labels.push(timestamp);
                chart.data.datasets[0].data.push(price);

                // Update
                chart.update();

            });
    }

    // Premier appel
    fetchData();

    // Refresh toutes les minutes
    setInterval(fetchData, 60000);

</script>

</body>
</html>
