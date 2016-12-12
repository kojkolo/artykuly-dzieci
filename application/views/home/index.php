<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php
foreach ($message as $k => $v):
    ?>
    <div class="alert alert-<?php echo $k; ?>" role="alert"><?php echo $v; ?></div>
<?php endforeach; ?>

<div class="panel-heading">
    <h3 class="panel-title">Strona główna</h3>
</div>
<div class="panel-body">
    <p>Witamy na stronie sklepu!</p>
</div>

