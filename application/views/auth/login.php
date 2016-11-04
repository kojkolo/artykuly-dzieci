<?php defined('SYSPATH') or die('No direct script access.');?>

<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>

<h1> panel logowania </h1>
 <form action="" method="POST">
  Username: <input type="text" name="username" />
  Password: <input type="password" name="password" />
  <input type="submit" name="submit" value="zaloguj">
</form> 

