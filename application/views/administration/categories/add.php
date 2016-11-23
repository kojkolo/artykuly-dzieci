<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>

<form action="" method="POST">
    Name: <input type="text" name="name" value="" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'name');?>
    </div>
    Description: <input type="text" name="description" value="" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'description');?>
    </div>
    ParentID: <select name ="parent_id">
        <option value ="NULL">###BRAK###</option>
        <?php foreach($categories as $c){
        ?>
        <option value ="<?php echo $c -> id;?>" ><?php echo $c -> name;?></option>
        <?php } ?>
    </select>
    
    <div class="text-danger">
        <?php echo Arr::path($errors, 'parent_id');?>
    </div>
    Hidden:  <input type="checkbox" name="hidden" value="1" checked />
    <div class="text-danger">
        <?php echo Arr::path($errors, 'hidden');?>
    </div>
    <input type="submit" name="submit" value="dodaj" />
</form>