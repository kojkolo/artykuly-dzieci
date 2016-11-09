<?php defined('SYSPATH') or die('No direct access allowed.'); ?>

<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>

<form action="" method="POST">
    Username: <input type="text" name="username" value="<?php echo $user->username;?>" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'username');?>
    </div>
    Email: <input type="text" name="email" value="<?php echo $user->email;?>" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'email');?>
    </div>
    Password: <input type="text" name="password" />
    <div class="text-danger">
        <?php echo Arr::path($errors, '_external.password');?>
    </div>
    Password2:  <input type="text" name="password_confirm" />
    <div class="text-danger">
        <?php echo Arr::path($errors, '_external.password_confirm');?>
    </div>
    <input type="submit" name="submit" value="edytuj" />
</form>