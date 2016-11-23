<?php defined('SYSPATH') or die('No direct script access.');

class Model_Orders extends ORM{
    
    protected $_table_name = 'orders';
    
    protected $_has_one = array(
        'delivery_method' => array(
            'model'       => 'DeliveryMethods',
            'foreign_key' => 'id',
        ),
        'delivery_destination' => array(
            'model'       => 'DeliveryDestinations',
            'foreign_key' => 'id',
        ),
        'status_order' => array(
            'model'       => 'StatusOrders',
            'foreign_key' => 'id',
        ),
        'payment_method' => array(
            'model'       => 'PaymentMethods',
            'foreign_key' => 'id',
        ),
    );
    
    protected $_has_many = array(
        'products' => array(
            'model'   => 'OrderProducts',
        ),
    );
       
    public function rules(){
        return array(
          
        );
    }
}