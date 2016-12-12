<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>

<form action="" method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="name" value="" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'name');?>
    </div>
    Description: <textarea name="description" cols="50" rows="5"></textarea>
    <div class="text-danger">
        <?php echo Arr::get($errors, 'description');?>
    </div>
    Netto_price: <input type="text" name="netto_price" value="" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'netto_price');?>
    </div>
    Quantity: <input type="text" name="quantity" value="" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'quantity');?>
    </div>
    Image: <input type="file" name="image" value="" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'image');?>
    </div>
    TaxID: <select name ="tax_id">
        <?php foreach($taxes as $t){
        ?>
        <option value ="<?php echo $t -> id;?>" ><?php echo $t -> name;?></option>
        <?php } ?>
    </select>
    Kategoria: <select name ="categories[]">
        <?php foreach($categories as $c){
        ?>
        <option value ="<?php echo $c -> id;?>" ><?php echo $c -> name;?></option>
        <?php } ?>
    </select>
    Available:  <input type="checkbox" name="available" value="0" unchecked />
    <div class="text-danger">
        <?php echo Arr::path($errors, 'available');?>
    </div>
    <input type="submit" name="submit" value="dodaj" />
</form>