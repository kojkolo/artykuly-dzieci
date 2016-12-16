<?php defined('SYSPATH') or die('No direct script access.');

class Model_Orders extends ORM{
    
    protected $_table_name = 'orders';
    
    protected $_belongs_to = array(
        'delivery_method' => array(
            'model'       => 'DeliveryMethods',
            'foreign_key' => 'delivery_methods_id',
          'far_key' => 'id',
        ),
        'delivery_destination' => array(
            'model'       => 'DeliveryDestinations',
            'foreign_key' => 'delivery_destinations_id',
          'far_key' => 'id',
        ),
        'status_order' => array(
            'model'       => 'StatusOrders',
            'foreign_key' => 'status_orders_id',
          'far_key' => 'id',
        ),
        'payment_method' => array(
            'model'       => 'PaymentMethods',
            'foreign_key' => 'payment_methods_id',
          'far_key' => 'id',
        ),
        'user' => array(
          'model'   => 'User',
          'foreign_key' => 'user_id',
          'far_key' => 'id',
      )  
    );
    
    protected $_has_many = array(
        'products' => array(
            'model'   => 'OrderProducts',
            'foreign_key' => 'id',
            'far_key' => 'orders_id',
        ),
    );
    
  
       
    public function rules(){
        return array(
          
        );
    }
}