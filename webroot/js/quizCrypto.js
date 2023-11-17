const canvas = document.createElement('canvas');
canvas.id = 'crypto-chart';
document.getElementById('quiz-container').appendChild(canvas);

// Sélectionnez le canvas pour le graphique
const ctx = document.getElementById('crypto-chart').getContext('2d');

// Données du graphique (exemples)
const data = {
    labels: ['Bitcoin', 'Ethereum', 'Cardano', 'Solana', 'Ripple'],
    datasets: [{
        label: 'Prix en USD',
        data: [48000, 3300, 2.5, 150, 1.2], // Les prix de crypto exemple
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
    }]
};

// Options du graphique (par exemple, pour rendre le graphique cliquable)
const options = {
    onClick: (e, elements) => {
        if (elements.length > 0) {
            // Gérer le clic sur le graphique, par exemple, ouvrir une page d'informations pour cette crypto
            const clickedCrypto = data.labels[elements[0].index];
            alert(`Vous avez cliqué sur ${clickedCrypto}`);
        }
    }
};

// Créez le graphique
const cryptoChart = new Chart(ctx, {
    type: 'bar', // Type de graphique (barres dans cet exemple)
    data: data,
    options: options
});
