<?php
        // Les bouts de code ci-dessous permettent d'insérer une nouvelle ligne dans la base de données
        // .. Mais comme je suis maladroit, je les ai mélangés :( A vous de les remettre dans l'ordre !
        // on se connecte à la base de données
        try {
          // il faudra sûrement changer quelques infos pour vous
          $bdd = new PDO("mysql:host=localhost;dbname=signin;", "root", "root");
      }
      catch(Exception $e) {
          die('Erreur : '.$e->getMessage());
      }
        // -------------------------------------------------------------------------------
        // -------------------------------------------------------------------------------
         // je récupère mes variables du formulaire
        // pour vous les noms pourraient être un peu différents
        
        // insérer une nouvelle ligne
        // si vous devez écrire une variable, écrivez-la précédée du symbole ':'
        // par exemple pour insérer une variable 'firstname'
        // je peux écrire ':firstname' dans ma requête (sans les guillemets)
        $query = "INSERT INTO users(nom,email,password) values (:nom, :email, :password) ";
        // -------------------------------------------------------------------------------
        // -------------------------------------------------------------------------------
        // préparation de la requête et exécution
        
        $q = $bdd->prepare($query);
        // -------------------------------------------------------------------------------
        // -------------------------------------------------------------------------------
        // ça permet de remplacer les variables présents dans la requête SQL (précédées par le symbole ':')
        // par les vraies variables qu'on a récupérées de notre formulaire
        if (isset($_POST['nom'], $_POST['email'], $_POST['password'])) {
        $pseudo = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $q->bindParam(':nom', $nom);
        $q->bindParam(':email', $email);
        $q->bindParam(':password', $password);
        $q->execute();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row main">
        <div class="col-6 left">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 ">
                <h2 class="testh2">Daily UI</h2>
                <br>
                <h3>Sign Up</h3>
                <form id="signup" method="post">
       
        <h2 class="h2">Hello there ! Sign in and start managing our <br> TrueDiamond account</h2>
      <input method="post" name="nom" type="nom" placeholder="Login" required="required" class="input"/>
      <input method="post" name="email" type="email" placeholder="Login" required="required" class="input"/>
      <input method="post" name="password" type="password" placeholder="Password" class="input pass"/>
      <input type="submit" value="Sign in now!" class="inputButton"/>
      <?php echo $nom ?>
      </form>
                    </div>
                    <div class="col-lg-6 fondvert">
                    </div>
                </div>
                  </div>

        </div>
        <div class="col-6 right">
            <div class= "green">
            </div>
        </div>
   </div>
</body>
</html>

