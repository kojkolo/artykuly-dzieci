<?php defined('SYSPATH') or die('No direct script access.');?>

<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
<div class="panel-heading">
    <h3 class="panel-title">Panel logowania</h3>
</div>
<div class="panel-body"></div>
<div class="container-fluid">
<form action="" method="POST" class="form-horizontal">
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
            <input type="text" id="username" name="username" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Hasło</label>
        <div class="col-sm-10">
            <input type="password" id="password" name="password" class="form-control" />
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-success">Zaloguj się</button>
        </div>
    </div>
</form> 
</div>
