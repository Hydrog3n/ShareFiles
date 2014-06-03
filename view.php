            <div class="inner cover">
            <?php
              if (isset($_GET['f']))
              {
                if(file_exists("./files/".$_GET['f']))
                {
                    $file = $manage->getFile($_GET['f']);

                } else echo "Le fichier n'existe pas<br />".$_GET['f'];
              }
              if (isset ($file))
              {
            ?>
              <h1 class="cover-heading"><?php echo $file->file_name()." (".$file->file_size_human().")"; ?></h1>
              <p>Téléchargé : <?php echo $file->file_download(); ?></p>
              <label for ="url">Partager</label>
              <input type="text" class="form-control" id="url" value="<?php echo $url.'?f='.$file->file_name(); ?>" ><br />
              <a href="./download.php?f=<?php echo $file->file_name(); ?>"><button class="btn btn-lg btn-info">Télécharger</button></a>
            <?php } ?>
            </div>
