 <?php 

 
 if(isset($_POST['firstname']) && isset($_POST['username']) && isset($_POST['password'])){
   $firstname = $_POST['firstname'];
   $username = $_POST['username'];
   $password = $_POST['password'];
    include "../php/db_conn.php";

   $data = "&firstname=".$firstname."&username=".$username;

   if(empty($firstname)){
        $erreur_message = "Veullez saisir votre Nom";
        header("Location: ../index.php?error=$erreur_message&$data");
        exit;
   }else if(empty($username)){
        $erreur_message = "Veullez saisir votre Nom d'utilisateur ";
        header("Location: ../index.php?error=$erreur_message&$data");
        exit;
    } else if(empty($password)){
        $erreur_message = "Veullez saisir votre mot de pass";
        header("Location: ../index.php?error=$erreur_message&$data");
        exit;
    }else {
        $sql = "INSERT INTO users(firstname, username, password) VALUES(?,?,?) ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$firstname, $username, $password]);
    }


 }else{
    header("Location: index.php?error=error");
    exit;
 }