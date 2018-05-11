<?php

error_reporting(E_PARSE | E_ERROR);

// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	$base = mysqli_connect ('serveur', 'login', 'password');
	mysqli_select_db ('nom_base', $base);

	// on teste si une entrée de la base contient ce couple login / pass
	$sql = 'SELECT count(*) FROM membre WHERE login="'.mysqli_escape_string($_POST['login']).'" AND pass_md5="'.mysqli_escape_string(md5($_POST['pass'])).'"';
	$req = mysqli_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysqli_error());
	$data = mysqli_fetch_array($req);

	mysqli_free_result($req);
	mysqli_close();

	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: membre.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($data[0] == 0) {
		$erreur = 'Compte non reconnu.';
	}
	// sinon, alors la, il y a un gros problème :)
	else {
		$erreur = 'Probème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
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
           
              Connexion à l'espace membre :<br />
<form action="index.php" method="post">
Login : <input type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
Mot de passe : <input type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
<input type="submit" name="connexion" value="Connexion">
</form>
<a href="inscription.php">Vous inscrire</a>
<?php
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
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