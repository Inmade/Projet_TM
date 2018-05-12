<?php
session_start();
if (!isset($_SESSION['id'])) {
	header ('Location: index.php');
	exit();
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

  </head>

  <body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3 title">Benny's location</span>
      <span class="site-heading-lower title">Location de voitures</span>
    </h1>

    <?php
        include('navbar.php');
    ?>

    <section class="page-section clearfix">
      <div class="container">
        <div class="intro">
          <div class=" bg-faded p-5 rounded">
            <form class="form-horizontal" action="" method="post">
			<h1>Contactez nous</h1>

	<?php
		// S'il y des données de postées
		if ($_SERVER['REQUEST_METHOD']=='POST') {
		// Code PHP pour traiter l'envoi de l'email

			$nombreErreur = 0; // Variable qui compte le nombre d'erreur

			// Définit toutes les erreurs possibles
			if (!isset($_POST['email'])) { // Si la variable "email" du formulaire n'existe pas (il y a un problème)
				$nombreErreur++; // On incrémente la variable qui compte les erreurs
				$erreur1 = '<p>Il y a un problème avec la variable "email".</p>';
			} else { // Sinon, cela signifie que la variable existe (c'est normal)
				if (empty($_POST['email'])) { // Si la variable est vide
				$nombreErreur++; // On incrémente la variable qui compte les erreurs
				$erreur2 = '<p>Vous avez oublié de donner votre email.</p>';
				} else {
				if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
					$nombreErreur++; // On incrémente la variable qui compte les erreurs
					$erreur3 = '<p>Cet email ne ressemble pas un email.</p>';
				}
				}
			}

			if (!isset($_POST['message'])) {
				$nombreErreur++;
				$erreur4 = '<p>Il y a un problème avec la variable "message".</p>';
			} else {
				if (empty($_POST['message'])) {
				$nombreErreur++;
				$erreur5 = '<p>Vous avez oublié de donner un message.</p>';
				}
			}

			if (!isset($_POST['captcha'])) {
				$nombreErreur++;
				$erreur6 = '<p>Il y a un problème avec la variable "captcha".</p>';
			} else {
				if ($_POST['captcha']!=4) {
				$nombreErreur++;
				$erreur7 = '<p>Désolé, le captcha anti-spam est erroné.</p>';
				}
			}

			if ($nombreErreur==0) { // S'il n'y a pas d'erreur
				// Récupération des variables et sécurisation des données
				$nom = htmlentities($_POST['nom']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
				$email = htmlentities($_POST['email']);
				$message = htmlentities($_POST['message']);

				// Variables concernant l'email
				$destinataire = 'luca20119@hotmail.com'; // Adresse email du webmaster
				$sujet = 'ProjetTm'; // Titre de l'email
				$contenu = '<html><head><title>ProjetTM</title></head><body>';
				$contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
				$contenu .= '<p><strong>Nom</strong>: '.$nom.'</p>';
				$contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
				$contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
				$contenu .= '</body></html>'; // Contenu du message de l'email

				// Pour envoyer un email HTML, l'en-tête Content-type doit être défini
				$headers = 'MIME-Version: 1.0'."\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

				@mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email

				echo '<h2>Message envoyé!</h2>'; // Afficher un message pour indiquer que le message a été envoyé
			} else { // S'il y a un moins une erreur
				echo '<div style="border:1px solid #ff0000; padding:5px;">';
				echo '<p style="color:#ff0000;">Désolé, il y a eu '.$nombreErreur.' erreur(s). Voici le détail des erreurs:</p>';
				if (isset($erreur1)) echo '<p>'.$erreur1.'</p>';
				if (isset($erreur2)) echo '<p>'.$erreur2.'</p>';
				if (isset($erreur3)) echo '<p>'.$erreur3.'</p>';
				if (isset($erreur4)) echo '<p>'.$erreur4.'</p>';
				if (isset($erreur5)) echo '<p>'.$erreur5.'</p>';
				if (isset($erreur6)) echo '<p>'.$erreur6.'</p>';
				if (isset($erreur7)) echo '<p>'.$erreur7.'</p>';
				echo '</div>';
			}
			}
	?>

		  <form method="post" action="<?php echo strip_tags($_SERVER['REQUEST_URI']); ?>">
			<p>Votre nom et prénom: <input type="text" name="nom" size="30" /></p>
			<p>Votre email: <span style="color:#ff0000;">*</span>: <input type="text" name="email" size="30" /></p>
			<p>Message <span style="color:#ff0000;">*</span>:</p>
			<textarea name="message" cols="60" rows="10"></textarea>
			<p>Combien font 1+3: <span style="color:#ff0000;">*</span>: <input type="text" name="captcha" size="2" /></p>
			<p><input type="submit" name="submit" value="Envoyer" /></p>
		  </form>

					</form>
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
