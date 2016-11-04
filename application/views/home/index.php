<?php defined('SYSPATH') or die('No direct script access.');?>
<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
Tutaj bedzie cos ciekawego