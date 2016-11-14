<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>

<form action="" method="POST">
    Name: <input type="text" name="name" value="<?php echo $category->name;?>" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'name');?>
    </div>
    Description: <input type="text" name="description" value="<?php echo $category->description;?>" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'description');?>
    </div>
    ParentID: <select name ="parent_id">
        <option value ="NULL">###BRAK###</option>
        <?php foreach($categories as $c){
        if($category->id != $c->id){    
        ?>
        <option value ="<?php echo $c -> id;?>" <?php if($category->parent_id == $c->id) echo 'selected';?>><?php echo $c -> name;?></option>
        <?php }} ?>
    </select>
    
    <div class="text-danger">
        <?php echo Arr::path($errors, 'parent_id');?>
    </div>
    Hidden:  <input type="checkbox" name="hidden" value="1" <?php if($category->hidden) echo "checked";?> />
    <div class="text-danger">
        <?php echo Arr::path($errors, 'hidden');?>
    </div>
    <input type="submit" name="submit" value="edytuj" />
</form>