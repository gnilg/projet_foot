<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root"; // Changez 'root' si vous avez un autre nom d'utilisateur
    $password = ""; // Ajoutez le mot de passe si vous en avez un
    $dbname = "projet_foot"; // Remplacez par le nom de votre base de données

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Requête SQL pour obtenir les informations des joueurs
    $sql = "SELECT id, nom, prenom, photo FROM joueur"; // Ajout de l'ID du joueur à la requête SQL
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>body {
            background-image: url('https://img.freepik.com/photos-premium/vue-panoramique-stade-football-vide-par-journee-ensoleillee-champ-vert-lignes-blanches-ciel-bleu-nuages-blancs_1187703-58816.jpg?size=626&ext=jpg&ga=GA1.1.1208765684.1717925982&semt=sph');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
        }</style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ACTU-FOOT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./php/add_player.php">Joueur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Championnat</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Transfert</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link">Hello, <?= htmlspecialchars($_SESSION['fname']) ?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <a href="./php/display_player.php?id=<?= htmlspecialchars($row["id"]) ?>"><img src="<?= htmlspecialchars($row["photo"]) ?>" class="card-img-top" alt="Player Image"></a>
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($row["nom"]) ?> <?= htmlspecialchars($row["prenom"]) ?></h5>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<div class='col-12'><p class='text-center'>0 résultats trouvés</p></div>";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7/z25hU/WNJnWdRv9Pq/hQ/MHLJImSw+Q4FA2z/q7N2u59f3sGYlglvxFwYD3gjr" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9Ohygk5D4dFhTbB8r/sM6jvtt6i3xm0pboDF6ZQrBjT6JVuBcH9jum3" crossorigin="anonymous"></script>
</body>
</html>

<?php 
} else {
    header("Location: login.php");
    exit;
}
?>
