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

    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $surnom = $_POST['surnom'];
    $date_naissance = $_POST['date_naissance'];
    $numero = $_POST['numero'];
    $poste = $_POST['poste'];
    $style_jeu = $_POST['style_jeu'];
    $saison = $_POST['saison'];
    $pays = $_POST['pays'];
    $titres_obtenus = $_POST['titres_obtenus'];
    $valeur = $_POST['valeur'];
    $code_championnat = $_POST['code_championnat'];

    // Gestion de l'upload de la photo
    $photo =$_POST['photo'];
   

    // Préparer et exécuter la requête d'insertion
    $stmt = $conn->prepare("INSERT INTO joueur (nom, prenom, surnom, date_naissance, numero, poste, style_jeu, saison, pays, titres_obtenus, valeur, photo, code_championnat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssissssssss", $nom, $prenom, $surnom, $date_naissance, $numero, $poste, $style_jeu, $saison, $pays, $titres_obtenus, $valeur, $photo, $code_championnat);

    if ($stmt->execute()) {
        echo "Nouveau joueur ajouté avec succès";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: login.php");
    exit;
}
?>
