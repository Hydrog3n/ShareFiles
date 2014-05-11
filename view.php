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
                    if(file_exists("./files/".$_GET['f'])){

                    }
                  }
                ?>
            		<h1 class="cover-heading"><?php echo $file->file_name(); ?></h1>
                <a href="./download.php?f=<?php echo $file->file_name(); ?>"><button class="btn btn-lg btn-default">Télécharger</button></a>
          		</div>