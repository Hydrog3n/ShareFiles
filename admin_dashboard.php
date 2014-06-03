		<div class="site-wrapper">
      		<div class="site-wrapper-inner">

        		<div class="cover-container">

          			<div class="masthead clearfix">
            			<div class="inner">
              				<h3 class="masthead-brand"><?php echo $name_site;?></h3>
              				<ul class="nav masthead-nav">
                				<li><a href="./">Home</a></li>
                                <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 1){ ?>
                                <li><a href="?p=administration">Administration</a></li>
                                <?php } ?>
                				<li><a href="#">Contact</a></li>
              				</ul>
            			</div>
          			</div>
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