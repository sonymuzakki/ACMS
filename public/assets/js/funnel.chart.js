var ctx = document.getElementById('funnelChart').getContext('2d');
var myFunnelChart = new Chart(ctx, {
    type: 'funnel',
    data: {
        labels: ["Walk-in", "Contacted", "Showroom Unit", "Test Drive", "SPK"],
        datasets: [{
            data: [1000, 800, 600, 400, 200],
            backgroundColor: ["#3498db", "#2ecc71", "#f39c12", "#e74c3c", "#9b59b6"]
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Sales Funnel'
        }
    }
});
