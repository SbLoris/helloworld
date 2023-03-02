<?php require_once("api/includeAll.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:white;">
    <?php
        new DatabaseConnection();
        new statsRDV();
        $idUser = $_SESSION["idUser"];
            if($idUser == false) {
                echo "Identifiant ou mot de passe incorrect, merci de réessayer";
                echo "<a href='index_login.php'><button>Se reconnecter</button></a>";
                exit();
            }

        $data = [$_SESSION['result1'], $_SESSION['result2'], $_SESSION['result3']];

        echo "L'ID de l'utilisateur est le : $idUser";
    ?>

    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        data = <?php print json_encode($data); ?>

        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['Nombre de RDV', 'RDV 7 derniers jours', 'Clients vus'],
            datasets: [{
                label: '#RDV',
                data: data,
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
    </script>
</body>
</html>