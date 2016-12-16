<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
<div class="panel-heading">
    <h3 class="panel-title">Lista produktów w zamówieniu nr <?php echo $order->id;?></h3>
</div>
<div class="panel-body">
    <strong>Adres dostawy:</strong><br/>
    <?php if(!empty($order->delivery_destination->company_name)){?>
    <?php echo $order->delivery_destination->company_name; ?> <br/>
    <?php }else{?>
    <?php echo $order->delivery_destination->name." ".$order->delivery_destination->surname; ?> <br/>
    <?php }?> 
    <?php echo $order->delivery_destination->street_number; ?> <br/>
    <?php echo $order->delivery_destination->postal_code." ".$order->delivery_destination->city; ?> <br/><br/>
    Tel.:<?php echo $order->delivery_destination->phone_number; ?> <br/>

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
                <td class="middle"></td>
                <td><a href="<?php echo URL::site('product/'.URL::title(UTF8::transliterate_to_ascii($product->product->name)).'/'.$product->product->id); ?>"><h4><?php echo $product->product->name;?></h4></a></td>
                <td class="middle"><h6><?php echo NUM::round_up($product->pcs_price+($product->pcs_price*$product->tax->rate/100), 3);?>PLN <small>Brutto</small></h6>
                    <h6><?php echo $product->pcs_price;?>PLN <small>Netto</small></h6>
                </td>
                <td class="quantity middle text-center"><?php echo $product->quantity; ?></td>
                <td class="middle"><h6><?php $pr = NUM::round_up($product->pcs_price+($product->pcs_price*$product->tax->rate/100), 3)*$product->quantity; echo $pr;?>PLN <small>Brutto (<?php echo $product->tax->rate;?>%)</small></h6>
                    <h6><?php $pr2 = $product->pcs_price*$product->quantity; echo $pr2;?>PLN <small>Netto</small></h6>
                </td>
            </tr>
            <?php 
            
                $totalcost += $pr;
                $totalcostnetto += $pr2;
                $count += $product->quantity;
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
<?php if($order->status_order->id < 3){?>
    <a href="/administration/orders/cancel/<?php echo $order->id;?>" class="btn btn-danger">ANULUJ ZAMÓWIENIE</a>
    <a href="/administration/orders/realisation/<?php echo $order->id;?>" class="btn btn-success right">REALIZUJ</a>
<?php }?>
</div>
