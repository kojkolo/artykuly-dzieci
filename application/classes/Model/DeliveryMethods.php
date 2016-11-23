<?php defined('SYSPATH') or die('No direct script access.');

class Model_DeliveryMethods extends ORM{
    
    protected $_table_name = 'delivery_methods';
    
    protected $_has_many = array(
        'orders' => array(
            'model'       => 'Orders',
        ),
    );
       
    public function rules(){
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value',64)),              
            ),
          
        );
    }
}