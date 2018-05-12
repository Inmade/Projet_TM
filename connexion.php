<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_POST['formconnexion'])) {
   $mailconnect = htmlspecialchars($_POST['mailconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($mailconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");
      $requser->execute(array($mailconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['pseudo'] = $userinfo['pseudo'];
         $_SESSION['mail'] = $userinfo['mail'];
         header("Location: profil.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
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

    <?php
        include('navbar.php');
    ?>

    <section class="page-section clearfix">
       <div class="container">
         <div class="intro">
           <div class=" text-center bg-faded p-5 rounded">
             <h1 class="section-heading">
               <span class="section-heading-upper">Connexion !</span>
             </h1>
							 <br /><br />
							 <form method="POST" action="">
									<input type="email" name="mailconnect" placeholder="Mail" />
									<input type="password" name="mdpconnect" placeholder="Mot de passe" />
									<br /><br />
									<input type="submit" name="formconnexion" value="Se connecter !" />
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
