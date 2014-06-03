          		<div class="inner cover">
            		<h1 class="cover-heading">Envoyer un fichier</h1>
            		<form  method="post" action="index.php" enctype="multipart/form-data">
            			<fieldset>
            				<input type="file" name="fichier">
            				<p class="help-block">Extensions acceptées : <?php listWord($extend_files); ?> - Taille max : <?php echo $max_size; ?>Mo</p>
            			</fieldset>
            			<input type="submit" name="envoie"class="btn btn-lg btn-info" value ="Envoyer">
            		</form>
          		</div>
