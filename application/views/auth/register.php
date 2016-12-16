<?php defined('SYSPATH') or die('No direct access allowed.'); ?>

<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
<div class="panel-heading">
    <h3 class="panel-title">Panel rejestracyjny</h3>
</div>
<div class="panel-body"></div>
<div class="container-fluid">
<form action="" method="POST" class="form-horizontal">
    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username*</label>
        <div class="col-sm-10">
            <input type="text" id="username" name="username" class="form-control" />
            <div class="text-danger">
            <?php echo Arr::get($errors, 'username');?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email*</label>
        <div class="col-sm-10">
            <input type="text" id="email" name="email" class="form-control" />
            <div class="text-danger">
            <?php echo Arr::get($errors, 'email');?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Hasło*</label>
        <div class="col-sm-10">
            <input type="text" id="password" name="password" class="form-control" />
            <div class="text-danger">
            <?php echo Arr::path($errors, '_external.password');?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="password_confirm" class="col-sm-2 control-label">Powtórz hasło*</label>
        <div class="col-sm-10">
            <input type="text" id="password_confirm" name="password_confirm" class="form-control" />
            <div class="text-danger">
            <?php echo Arr::path($errors, '_external.password_confirm');?>
            </div>
        </div>
    </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="submit" class="btn btn-success">Rejestruj</button>
        </div>
      </div>
</form>
