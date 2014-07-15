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
                $urlShare = $url.'?f='.$file->file_name();
            ?>
              <h1 class="cover-heading"><?php echo $file->file_name()." (".$file->file_size_human().")"; ?></h1>
              <p>Téléchargé : <?php echo $file->file_download(); ?></p>
              <label for ="url">Partager</label>
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="url" value="<?php echo $urlShare ?>" >
                  <div id="copy-me" class="btn input-group-addon" data-clipboard-text="<?php echo $urlShare; ?>" type="button">Copy to Clipboard</div>
                </div>
              </div>
              <a href="./download.php?f=<?php echo $file->file_name(); ?>"><button class="btn btn-lg btn-info">Télécharger</button></a>
            <?php } ?>
            </div>
