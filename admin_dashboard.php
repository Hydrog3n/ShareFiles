<?php
  if ( ( isset($_SESSION['connect']) && $_SESSION['connect'] == 1 ) || (isset($_POST['login']) && isset($_POST['password']) && $_POST["login"] ==  $admin_pseudo && $_POST['password'])) {
        $_SESSION['connect'] = 1;
?>
  <div class="inner cover">
        <h1 class="cover-heading">Tableau de Bord</h1>
  <?php
    $info = $manage->getInfoTotal();
    if (!empty($info)){

        echo '<div class="col-md-6">';
        echo '<p class="lead"> Taille du repertoire '.$info['tailleTotal'].' Mo</p><p class="lead" >Nombre de fichier : '.$info['nbFile'].'</p>';
        echo '</div>';

    } else echo "Il n'y a pas de fichier";
  ?>
    </div>
<?php
  } else include 'admin_login.php';
