<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
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
               <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
               <br /><br />
               Pseudo = <?php echo $userinfo['pseudo']; ?>
               <br />
               Mail = <?php echo $userinfo['mail']; ?>
               <br />
               <?php
               if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
               ?>
               <br />
               <a href="editionprofil.php">Editer mon profil</a>
               <a href="deconnexion.php">Se déconnecter</a>
               <?php
               }
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
<?php
}
?>
