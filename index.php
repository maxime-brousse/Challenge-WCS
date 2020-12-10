<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>

  <!-- Header section -->
  <header>
    <h1>
      <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
      Les Argonautes
    </h1>
  </header>

  <!-- Main section -->
  <main>
    <!-- New member form -->
    <h2>Ajouter un(e) Argonaute</h2>
    <form class="new-member-form" action="valider.php" method="post">
      <label for="name">Nom de l&apos;Argonaute</label>
      <input id="name" name="name" type="text" placeholder="Charalampos" />
      <button type="submit">Envoyer</button>
      <?php 
        if (!empty($_GET['erreur'])) {
          echo '<p class="pFaux">'.$_GET['erreur'].'</p>';
        }
        if (!empty($_GET['success'])) {
          echo '<p class="pVrai">'.$_GET['success'].'</p>';
        }
      ?>
    </form>
  
    <?php
      include('config.php');
      $bdd = new PDO('mysql:host=localhost; dbname='.BDD_nom.'; charset=utf8', BDD_login, BDD_mdp);
      $requete='SELECT * FROM argonaute';
      $exe= $bdd -> query($requete);
    ?>
    <!-- Member list -->
    <section class="member-list">
      <h2>Membres de l'équipage</h2>
      <div class="member-div">
        <table>
          <?php
            $number_row=$exe->rowCount();
            for ($i=0; $i <= $number_row; $i=$i+3) { 
              echo '<tr>';
                $ligne1 = $exe->fetch();
                echo '<td>'.$ligne1['argo_name'].'</td>';
                $ligne2 = $exe->fetch();
                echo '<td>'.$ligne2['argo_name'].'</td>';
                $ligne3 = $exe->fetch();
                echo '<td>'.$ligne3['argo_name'].'</td>';
              echo '</tr>';
            }
          ?> 
        </table>
      </div> 
    </section>
  </main>
  <!-- fin main -->

  <footer>
    <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
  </footer>
</html>