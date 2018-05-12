<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">

    <title>Projet TM</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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
               <span class="section-heading-upper">Présentation de nos véhicules</span>
             </h1>
             <div id="zone">
             		<script>
             				$(document).ready(function(){
             					$.getJSON('select.php',function(data){
             						alert("Test");
             						for(var i in data){
             							$('#zone').append('<img src="img/voit'+data[i].id+'.jpg">'+'<br>');
             							$('#zone').append('categorie : ' + data[i].cat + '<br>');
             							$('#zone').append('marque : ' + data[i].marque + '<br>');
             							$('#zone').append('modele : ' + data[i].modele + '<br>');
             							$('#zone').append('nbPortes : ' + data[i].nb + '<br>');
             							$('#zone').append('transmission : ' + data[i].trans + '<br>');
                          $('#zone').append('climatisation : ' + data[i].clim + '<br><hr>');
                          $('#zone').append('Dispo : ' + data[i].dispo + '<br><hr>');

                        }
             					});
             				});
            	</script>
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
