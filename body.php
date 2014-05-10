		<div class="site-wrapper">

      		<div class="site-wrapper-inner">

        		<div class="cover-container">

          			<div class="masthead clearfix">
            			<div class="inner">
              				<h3 class="masthead-brand"><?php echo $name_site;?></h3>
              				<ul class="nav masthead-nav">
                				<li class="active"><a href="./">Home</a></li>
                				<li><a href="#">Contact</a></li>
              				</ul>
            			</div>
          			</div>

          		<div class="inner cover">
            		<h1 class="cover-heading">Envoyer un fichier</h1>
            		<form  method="post" action="index.php" enctype="multipart/form-data">
            			<fieldset>
            				<input type="file" name="fichier">
            				<p class="help-block">Extensions acceptés : <?php listWord($extend_files); ?> - Taille max : <?php echo $max_size; ?>Mo</p>
            			</fieldset>
            			<input type="submit" name="envoie"class="btn btn-lg btn-default" value ="Envoyer">
            		</form>
          		</div>

          