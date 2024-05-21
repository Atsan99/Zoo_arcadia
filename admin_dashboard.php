<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Administrateur - Zoo Aventure</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Dashboard Administrateur</h1>
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="habitats.html">Habitats</a></li>
                <li><a href="login.html">Connexion</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Nombre de consultations par animal</h2>
        <table>
            <thead>
                <tr>
                    <th>Animal</th>
                    <th>Nombre de consultations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php'; // Fichier de configuration avec la connexion à la base de données

                $sql = "SELECT animal.prenom, COUNT(rapport_veterinaire.rapport_id) AS consultations
                        FROM animal
                        JOIN rapport_veterinaire ON animal.animal_id = rapport_veterinaire.animal_id
                        GROUP BY animal.animal_id, animal.prenom";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Générer les lignes du tableau HTML
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["prenom"] . "</td><td>" . $row["consultations"] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>Aucune donnée disponible</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>
