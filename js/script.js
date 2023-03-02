$.ajax({
    url: "test.php",
    type: "GET",        
    success: function (data) {
        data = JSON.parse(data)
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Nombre de RDV', 'RDV 7 derniers jours', 'Clients vus'],
            datasets: [{
                label: '#RDV',
                data: [data[0], data[1], data[2]],
                backgroundColor:['#FF0000', '#00ff00', '#0000ff'],
                borderWidth: 1
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    }
});
    
    


