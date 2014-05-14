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
            <?php
              if (isset($_GET['f']))
              {
                if(file_exists("./files/".$_GET['f']))
                {
                    $infofile = infoFile("./files/".$_GET['f']);
                    $file = new files($infofile);
                } else echo "Le fichier n'existe pas<br />".$_GET['f'];
              }
              if (isset ($file)) 
              {            
            ?>
              <h1 class="cover-heading"><?php echo $file->file_name()." (".$file->file_size_human().")"; ?></h1>
              <label for ="url">Partager</label>
              <input type="text" class="form-control" id="url" value="<?php echo $url.'?f='.$file->file_name(); ?>" ><br />
              <a href="./download.php?f=<?php echo $file->file_name(); ?>"><button class="btn btn-lg btn-default">Télécharger</button></a>
            <?php } ?>
            </div>