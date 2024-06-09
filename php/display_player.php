<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $player_id = $_GET['id'];

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

        // Requête SQL pour obtenir les informations du joueur avec l'ID donné
        $sql = "SELECT * FROM joueur WHERE id = $player_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Récupérer les informations du joueur

            // Assigner les informations du joueur aux variables
            $nom = $row['nom'];
            $prenom = $row['prenom'];
            $surnom = $row['surnom'];
            $date_naissance = $row['date_naissance'];
            $numero = $row['numero'];
            $poste = $row['poste'];
            $style_jeu = $row['style_jeu'];
            $saison = $row['saison'];
            $pays = $row['pays'];
            $titres_obtenus = $row['titres_obtenus'];
            $valeur = $row['valeur'];
            $photo = $row['photo'];
        } else {
            echo "Aucun joueur trouvé avec cet ID.";
        }

        $conn->close(); // Fermer la connexion à la base de données
    } else {
        echo "ID du joueur non spécifié.";
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation du Joueur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ACTU-FOOT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../php/add_player.php">Joueur</a>
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
    
    <div class="container">
        <h2 class="text-center mt-4 mb-5">Présentation du Joueur</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Informations du Joueur</h5>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo:</label>
                            <img src="<?= htmlspecialchars($photo) ?>" alt="Photo du Joueur" id="photo" class="img-fluid">
                        </div>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom:</label>
                            <input type="text" class="form-control" id="nom" value="<?= htmlspecialchars($nom) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom:</label>
                            <input type="text" class="form-control" id="prenom" value="<?= htmlspecialchars($prenom) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="surnom" class="form-label">Surnom:</label>
                            <input type="text" class="form-control" id="surnom" value="<?= htmlspecialchars($surnom) ?>" readonly>
                        </div>
                       
                        <div class="mb-3">
                            <label for="date_naissance" class="form-label">Date de Naissance:</label>
                            <input type="text" class="form-control" id="date_naissance" value="<?= htmlspecialchars($date_naissance) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="numero" class="form-label">Numéro:</label>
                            <input type="text" class="form-control" id="numero" value="<?= htmlspecialchars($numero) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="poste" class="form-label">Poste:</label>
                            <input type="text" class="form-control" id="poste" value="<?= htmlspecialchars($poste) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="style_jeu" class="form-label">Style de Jeu:</label>
                            <input type="text" class="form-control" id="style_jeu" value="<?= htmlspecialchars($style_jeu) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="saison" class="form-label">Saison:</label>
                            <input type="text" class="form-control" id="saison" value="<?= htmlspecialchars($saison) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="pays" class="form-label">Pays:</label>
                            <input type="text" class="form-control" id="pays" value="<?= htmlspecialchars($pays) ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="titres_obtenus" class="form-label">Titres Obtenus:</label>
                            <textarea class="form-control" id="titres_obtenus" rows="3" readonly><?= htmlspecialchars($titres_obtenus) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="valeur" class="form-label">Valeur (€):</label>
                            <input type="text" class="form-control" id="valeur" value="<?= htmlspecialchars($valeur) ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
} else {
    header("Location: login.php");
    exit;
}
?>
