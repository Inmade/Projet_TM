<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_POST['forminscription'])) {
   $pseudo = htmlspecialchars($_POST['pseudo']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($pseudo);
      if($pseudolength <= 255) {
         if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM membres WHERE mail = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                     $insertmbr->execute(array($pseudo, $mail, $mdp));
                    /* $_SESSION['comptecree'] */ $erreur= "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                    /* header('Location: index.php');*/
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
   }
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">

    <title>Projet TM</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </head>

  <body>

    <h1 class="site-heading text-center text-white d-none d-lg-block ">
      <span class="site-heading-upper text-primary mb-3 title">Benny's location</span>
      <span class="site-heading-lower title">Location de voitures</span>
    </h1>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="nav navbar-nav mx-auto">
            <li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="dropdown">
          <a  class="nav-link text-uppercase text-expanded">Location</a>
       <div class="dropdown-content">
         <a href="voiture.php">Voiture</a>
		 <a href="camion.html">Camion</a>
		 <a href="autocar.html">Autocar</a>
       </div>
            </li>

			<li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="membre.php">Membre
                <span class="sr-only">(current)</span>
              </a>
            </li>

			<li class="nav-item active px-lg-4">
              <a class="nav-link text-uppercase text-expanded" href="contact.php">Contact
                <span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="page-section clearfix">
      <div class="container">
        <div class="intro">
          <div class=" text-center bg-faded p-5 rounded">
						<div align="center">
			         <h2>Inscription</h2>
			         <br /><br />
			         <form method="POST" action="">
			            <table>
			               <tr>
			                  <td align="right">
			                     <label for="pseudo">Pseudo :</label>
			                  </td>
			                  <td>
			                     <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
			                  </td>
			               </tr>
			               <tr>
			                  <td align="right">
			                     <label for="mail">Mail :</label>
			                  </td>
			                  <td>
			                     <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
			                  </td>
			               </tr>
			               <tr>
			                  <td align="right">
			                     <label for="mail2">Confirmation du mail :</label>
			                  </td>
			                  <td>
			                     <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />
			                  </td>
			               </tr>
			               <tr>
			                  <td align="right">
			                     <label for="mdp">Mot de passe :</label>
			                  </td>
			                  <td>
			                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
			                  </td>
			               </tr>
			               <tr>
			                  <td align="right">
			                     <label for="mdp2">Confirmation du mot de passe :</label>
			                  </td>
			                  <td>
			                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
			                  </td>
			               </tr>
			               <tr>
			                  <td></td>
			                  <td align="center">
			                     <br />
			                     <input type="submit" name="forminscription" value="Je m'inscris" />
			                  </td>
			               </tr>
			            </table>
			         </form>
			         <?php
			         if(isset($erreur)) {
			            echo '<font color="red">'.$erreur."</font>";
			         }
			         ?>
			      </div>
        </div>
      </div>
    </section>

    <footer class="footer text-faded text-center py-5">
      <div class="container">
        <p class="m-0 small">Copyright &copy; Benny's location 2018</p>
      </div>
    </footer>
  </body>

</html>
