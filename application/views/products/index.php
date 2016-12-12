<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
<div class="panel-heading">
    <h3 class="panel-title">Lista produktów kategorii: <?php echo $cat->name;?></h3>
</div>
<div class="panel-body">
    <?php echo nl2br($cat->description);?>
    </div>
    <table class="table table-hover products">
        <tbody>
            <?php 
            foreach($products as $product){?>
            <tr>
                <td class="middle"><img src="uploads/<?php echo $product->image;?>" alt="" /></td>
                <td><h4><?php echo $product->name;?></h4><br/>
                <?php echo substr($product->description, 0, 150);?>...</td>
                <td class="middle"><h6><?php echo NUM::round_up($product->netto_price+($product->netto_price*$product->tax->rate/100), 3);?>PLN <small>Brutto</small></h6>
                    <h6><?php echo $product->netto_price;?>PLN <small>Netto</small></h6>
                    <a href="<?php echo URL::site('product/'.URL::title(UTF8::transliterate_to_ascii($product->name)).'/'.$product->id); ?>" class="btn btn-info">WIĘCEJ</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

