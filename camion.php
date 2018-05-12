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
			<div class="form-group row">
				<label for="nom" class="col-2 col-form-label">Nom</label>
				<div class="col-10">
					<input class="form-control" type="email" placeholder="SMISSI" id="nom">
				</div>
			</div>
			<div class="form-group row">
				<label for="prenom" class="col-2 col-form-label">Prenom</label>
				<div class="col-10">
					<input class="form-control" type="email" placeholder="MICHEL" id="prenom">
				</div>
			</div>
		  	<div class="form-group row">
				<label for="email"class=col-2 col-form-label">Email</label>
				<div class="col-10">
					<input class="form-control" type="email" placeholder="bootstrap@hotmail.com" id="email">
				</div>
			</div>
			<div class="form-group row">
				<label for="telephone" class="col-2 col-form-label">Telephone</label>
				<div class="col-10">
					<input class="form-control" type="tel" placeholder="0495162158" id="telephone">
				</div>
			</div>
			<div class="form-group row">
				<label for="lieu" class="col-2 col-form-label">Lieu de prise en charge:</label>
				<div class="col-10">
					<input class="form-control" type="text" placeholder="Milano" id="lieu">
				</div>
			</div>
			<div class="form-group row">
				<label for="lieuRemise" class="col-2 col-form-label">Lieu de remise du véhicule:</label>
				<div class="col-10">
					<input class="form-control" type="text" placeholder="Paris" id="lieuRemise">
				</div>
			</div>
		<div class="form-group row">
			<label for="dateDebut" class="col-2 col-form-label">Date de prise en charge:</label>
			<div class="col-10">
				<input class="form-control" type="datetime-local" placeholder="2018-08-19T13:45:00" id="dateDebut">
			</div>
		</div>
		<div class="form-group row">
			<label for="dateFin" class="col-2 col-form-label">Date de restitution:</label>
			<div class="col-10">
				<input class="form-control" type="datetime-local" placeholder="2018-08-24T18:15:00" id="dateFin">
			</div>
		</div>
		<div class="form-group row">
			<label for="dateFin" class="col-2 col-form-label">Modèle du camion:</label>
			<div class="col-10">
			<select class="custom-select">
				<option value="Fiat">Fiat</option>
				<option value="Mercedez">Mercedez</option>
				<option value="Opel">Opel</option>
			</select>
			</div>
		</div>

		<div class="checkbox">
			<label>
				<input type="checkbox"> Le conducteur a t-il entre 30 et 65 ans?
			</label>
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
