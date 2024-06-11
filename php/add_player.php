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

    // Modifiez la requête SQL pour utiliser les colonnes qui existent dans votre table joueur
    $sql = "SELECT nom, prenom, photo FROM joueur";
    $result = $conn->query($sql);
    ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire de Saisie de Joueur</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <style>
    body {
    background-image: url('https://img.freepik.com/photos-premium/vue-panoramique-stade-football-vide-par-journee-ensoleillee-champ-vert-lignes-blanches-ciel-bleu-nuages-blancs_1187703-58816.jpg?size=626&ext=jpg&ga=GA1.1.1208765684.1717925982&semt=sph');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.form-container {
    background-color: rgba(255, 255, 255, 0.9); /* Couleur de fond pour le conteneur du formulaire */
    border-radius: 10px;
}

form {
    max-width: 600px;
    margin: 0 auto;
    padding: 1em;
    border-radius: 5px;
    background-color: #f9f9f9; /* Couleur de fond pour le formulaire */
}

div {
    margin-bottom: 1em;
}

label {
    margin-bottom: .5em;
    color: #333333;
    display: block;
}

input, select, textarea {
    border: 1px solid #CCCCCC;
    padding: .5em;
    font-size: 1em;
    width: 100%;
    box-sizing: border-box;
}

button {
    padding: 0.7em;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #007bff; /* Couleur de fond pour le bouton */
}

button:hover {
    background-color: #0056b3; /* Couleur de fond au survol du bouton */
}

        </style>
    </head>
    <body>
        <!-- Navbar -->
        <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../home.php">ACTU-FOOT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./add_player.php">Joueur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Championnat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Transfert</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if(isset($_SESSION['fname'])) { ?>
                    <li class="nav-item">
                        <span class="nav-link">Hello, <?=$_SESSION['fname']?></span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

        <form action="submit_player.php" method="post" enctype="multipart/form-data">
            <h2>Formulaire de Saisie de Joueur</h2>
            
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            
            <div>
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            
            <div>
                <label for="surnom">Surnom</label>
                <input type="text" id="surnom" name="surnom">
            </div>
            
            <div>
                <label for="date_naissance">Date de Naissance</label>
                <input type="date" id="date_naissance" name="date_naissance">
            </div>
            
            <div>
                <label for="numero">Numéro</label>
                <input type="number" id="numero" name="numero">
            </div>
            
            <div>
                <label for="poste">Poste</label>
                <input type="text" id="poste" name="poste">
            </div>
            
            <div>
                <label for="style_jeu">Style de Jeu</label>
                <input type="text" id="style_jeu" name="style_jeu">
            </div>
            
            <div>
                <label for="saison">Saison</label>
                <input type="text" id="saison" name="saison">
            </div>
            
            <div>
                <label for="pays">Pays</label>
                <input type="text" id="pays" name="pays">
            </div>
            
            <div>
                <label for="titres_obtenus">Titres Obtenus</label>
                <textarea id="titres_obtenus" name="titres_obtenus"></textarea>
            </div>
            
            <div>
                <label for="valeur">Valeur (€)</label>
                <input type="number" step="0.01" id="valeur" name="valeur">
            </div>
            
            <div>
                <label for="photo">Photo</label>
                <input type="url" id="photo" name="photo">
            </div>
            
            <div>
                <label for="code_championnat">Code Championnat</label>
                <input type="text" id="code_championnat" name="code_championnat">
            </div>
            
            <div>
                <button type="submit">Soumettre</button>
            </div>
        </form>
    </body>
    </html>
    <?php 
} else {
    header("Location: login.php");
    exit;
}
?>
