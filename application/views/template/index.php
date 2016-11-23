<?php defined('SYSPATH') or die('No direct script access.');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="<?php echo $description; ?>">
    <title><?php echo $title; ?></title>
    <!--<base href="http://artykuly-dzieci.rf.gd">-->
    <base href="http://localhost">
    <?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), PHP_EOL ?>
<?php foreach ($scripts as $file) echo HTML::script($file), PHP_EOL ?>
  </head>
  <body>
      <?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
      <div class="container">
          <?php if(Auth::instance()->logged_in()){ ?>
          <a href="auth/logout">Wyloguj</a>
          <?php if(Auth::instance()->logged_in('admin')){ ?>
          | <a href="administration">Panel administracyjny</a>
          <?php }
          } else{ ?>
          <a href="auth/login">Zaloguj</a> | <a href="auth/register">Rejestracja</a>
          <?php } ?>
    <h1>Hello, world!</h1>
    <?php echo $content; ?>
      </div>
  </body>
</html>
