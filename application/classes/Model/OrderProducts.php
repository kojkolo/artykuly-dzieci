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
            'foreign_key' => 'id'
        ),
    );
    
    protected $_has_one = array(
        'tax' => array(
            'model'       => 'Taxes',
            'foreign_key' => 'id',
        ),
    );
       
    public function rules(){
        return array(
          
        );
    }
}