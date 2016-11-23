<?php defined('SYSPATH') or die('No direct script access.');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="<?php echo $description; ?>">
    <title>Admin + <?php echo $title; ?></title>
    <!--<base href="http://artykuly-dzieci.rf.gd">-->
    <base href="http://localhost">
    <?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), PHP_EOL ?>
<?php foreach ($scripts as $file) echo HTML::script($file), PHP_EOL ?>
  
    <style>.table .table { margin-bottom: 0px;}</style>
  </head>
  <body>
      <?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
      <div class="container">
          <?php if(Auth::instance()->logged_in('admin')){ ?>
          <a href="auth/logout">Wyloguj</a>
          | <a href="administration">Panel administracyjny</a>
          <?php } else{ ?>
          <a href="auth/login">Zaloguj</a> | <a href="auth/register">Rejestracja</a>
          <?php } ?>
    <h1>Panel Administracyjny!</h1>
    <?php echo $content; ?>
      </div>
  </body>
</html>
