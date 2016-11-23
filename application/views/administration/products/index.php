<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
<br/>
<a href="/administration/products/add">Dodaj produkt</a>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($products as $product){?>
        <tr>
            <td><?php echo $product->id;?></td>
            <td><?php echo $product->name;?></td>
            <td><?php echo $product->description;?></td>
            <td><a href="/administration/products/edit/<?php echo $product->id;?>">EDYTUJ</a> | <a href="/administration/products/delete/<?php echo $product->id;?>" onclick="return confirm('Na pewno usunąć ten produkt?');">USUŃ</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
