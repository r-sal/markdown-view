<?php
require 'config.php';

$path = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REDIRECT_URL'];
$noter = new Noter($path);

?>
<!DOCTYPE html>
  <head>
    <title><?php echo $noter->getTitle(); ?></title>

    <link href="<?php echo $app['favicon']; ?>" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <link rel="stylesheet" href="<?php echo $assetDir; ?>/css/style.css">
  </head>
  <body>

    <div id="view-page-wrap">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="title"><?php echo $noter->getTitle(); ?></h1>
          </div>
        </div>
      </div><!-- /.container -->

      <div class="container">
        <div id="doc-wrap">
          <div class="row markdown-body">
            <div class="col-md-12">
              <?php echo $noter->getHtml(); ?>
            </div>
          </div>
        </div><!-- /#doc-wrap -->
      </div><!-- /.container -->

      <?php /* Include footer */
      if (isset($app['footer']) && $app['footer']) {
        echo file_get_contents($app['footer']);
      }
      ?>
    </div><!-- /#view-page-wrap -->

  </body>
</html>