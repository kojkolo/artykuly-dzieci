<?php defined('SYSPATH') or die('No direct script access.');

class Model_OrderProducts extends ORM{
    
    protected $_table_name = 'order_products';
    
    protected $_belongs_to = array (
        'order' => array(
            'model' => 'Orders',
            'foreign_key' => 'id'
        ),
        'product' => array(
            'model' => 'Products',
            'foreign_key' => 'product_id',
            'far_key' => 'id',
        ),
        'tax' => array(
            'model'   => 'Taxes',
            'foreign_key' => 'tax_id',
            'far_key' => 'id',
        ),
    );
       
    public function rules(){
        return array(
          
        );
    }
}