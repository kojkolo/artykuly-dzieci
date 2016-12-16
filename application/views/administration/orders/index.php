<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php 
    foreach($message as $k => $v):
    ?>
<div class="alert alert-<?php echo $k;?>" role="alert"><?php echo $v;?></div>
<?php endforeach; ?>
<br/>
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Użytkownik</th>
            <th>Status</th>
            <th>Data</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($orders as $order){
            $class="";
            switch($order->status_order->id){
                case 1:
                    $class='class="info"';
                    break;
                case 2:
                    $class='class="warning"';
                    break;
                case 3:
                    $class='class="success"';
                    break;
                case 4:
                    $class='class="danger"';
                    break;
            }
            ?>
        <tr <?php echo $class;?>>
            <td><?php echo $order->id;?></td>
            <td><?php echo $order->user->email;?></td>
            <td><?php echo $order->status_order->name;?></td>
            <td><?php echo $order->date;?></td>
            <td><a href="/administration/orders/view/<?php echo $order->id;?>">PRZEGLĄDAJ</a> 
                <?php if($order->status_order->id <= 2){?>
                    | <a href="/administration/orders/realisation/<?php echo $order->id;?>">REALIZUJ</a>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
