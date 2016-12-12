<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
<div class="panel-heading">
    <h3 class="panel-title">Lista produktów w koszyku</h3>
</div>
<div class="panel-body">
    Tutaj jakiś tekst
    </div>
    <table class="table table-hover productscart">
        <thead>
            <th></th>
            <th>Nazwa produktu</th>
            <th>Cena</th>
            <th>Ilość</th>
            <th>Koszt</th>
        </thead>
        <tbody>
            <?php 
            $count = 0;
            $totalcostnetto = 0.00;
            $totalcost = 0.00;
            foreach($products as $product){
                ?>
            <tr>
                <td class="middle"><a href="<?php echo URL::site('product/'.URL::title(UTF8::transliterate_to_ascii($product->name)).'/'.$product->id); ?>"><img src="uploads/<?php echo $product->image;?>" alt="" /></a></td>
                <td><a href="<?php echo URL::site('product/'.URL::title(UTF8::transliterate_to_ascii($product->name)).'/'.$product->id); ?>"><h4><?php echo $product->name;?></h4></a></td>
                <td class="middle"><h6><?php echo NUM::round_up($product->netto_price+($product->netto_price*$product->tax->rate/100), 3);?>PLN <small>Brutto</small></h6>
                    <h6><?php echo $product->netto_price;?>PLN <small>Netto</small></h6>
                </td>
                <td class="quantity middle text-center">
                        <p><?php echo $shopCart[$product->id]; ?></p>
                        <form class="quantityform" method="post">
                            <input type="number" class="form-control input-sm" name="quantity" value="<?php echo $shopCart[$product->id]; ?>" />
                            <input type="hidden" name="id" value="<?php echo $product->id;?>" />
                            <input type="submit" class="btn btn-xs btn-danger btn-block" value="zmień" />
                        </form>
                </td>
                <td class="middle"><h6><?php $pr = NUM::round_up($product->netto_price+($product->netto_price*$product->tax->rate/100), 3)*$shopCart[$product->id]; echo $pr;?>PLN <small>Brutto (<?php echo $product->tax->rate;?>%)</small></h6>
                    <h6><?php $pr2 = $product->netto_price*$shopCart[$product->id]; echo $pr2;?>PLN <small>Netto</small></h6>
                </td>
            </tr>
            <?php 
            
                $totalcost += $pr;
                $totalcostnetto += $pr2;
                $count += $shopCart[$product->id];
            } ?>
        </tbody>
        <tfoot class="panel-footer">
            <tr>
                <td colspan="3" class="text-right middle">Suma:</td>
                <td class="middle text-center"><?php echo $count; ?></td>
                <td class="middle"><h6><?php echo $totalcost;?>PLN <small>Brutto</small></h6>
                    <h6><?php echo $totalcostnetto;?>PLN <small>Netto</small></h6></td>
            </tr>
        </tfoot>
    </table>
<div class="panel-footer">
    <a href="/" class="btn btn-warning">KONTYNUUJ ZAKUPY</a>
    <a href="/order" class="btn btn-success right">ZŁÓŻ ZAMÓWIENIE</a>
</div>
