<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>

<form action="" method="POST" enctype="multipart/form-data">
    Name: <input type="text" name="name" value="<?php echo $product->name;?>" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'name');?>
    </div>
    Description: <input type="text" name="description" value="<?php echo $product->description;?>" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'description');?>
    </div>
    Netto_price: <input type="text" name="netto_price" value="<?php echo $product->netto_price;?>" />
    <div class="text-danger">
        <?php echo Arr::get($errors, 'netto_price');?>
    </div>
    Quantity: <input type="text" name="quantity" value="<?php echo $product->quantity;?>" />
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
        <option value ="<?php echo $t -> id;?>" <?php if($t->id == $product->tax_id){echo "selected";}?> ><?php echo $t -> name;?></option>
        <?php } ?>
    </select>
    Kategoria: <select name ="categories[]" multiple="true">
        <?php foreach($categories as $c){
        ?>
        <option value ="<?php echo $c -> id;?>" <?php if($product->has('categories', $c->id)){echo "selected";} ?> ><?php echo $c -> name;?></option>
        <?php } ?>
    </select>
    Available:  <input type="checkbox" name="available" value="0" <?php if($product->available==1){echo "checked";}?> />
    <div class="text-danger">
        <?php echo Arr::path($errors, 'available');?>
    </div>
    <input type="submit" name="submit" value="edytuj" />
</form>