<?php

// Établir une connexion à la base de données MySQL
$conn = mysqli_connect('host', 'username', 'password', 'database');

// Sélectionner toutes les URL de la table
$sql = "SELECT url FROM table_name";
$result = mysqli_query($conn, $sql);

// Boucler à travers les résultats de la requête
while ($row = mysqli_fetch_assoc($result)) {
    // Vérifier si l'URL correspond à l'une des URL de la base de données
    if ($row['url'] == $_GET['url']) {
        // URL correspondante trouvée
        break;
    }
}

// Vérifier si l'URL a été trouvée
if (isset($row)) {
    // URL correspondante trouvée
    //supprimé la base de donées
    $sql = "DELETE FROM table_name WHERE url='" . $_GET['url'] . "'";
    if (mysqli_query($conn, $sql)) {
        echo "URL supprimée avec succès";
    } else {
        echo "Erreur lors de la suppression de l'URL: " . mysqli_error($conn);
    }

} else {
    // URL non trouvée dans la base de données
    echo "URL non valide";
}

// Fermer la connexion à la base de données
mysqli_close($conn);

?>