<?php defined('SYSPATH') or die('No direct script access.');

class Model_StatusOrders extends ORM{
    
    protected $_table_name = 'status_orders';
         
       
    public function rules(){
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value',64)),              
            ),
        );
    }
}