<?php defined('SYSPATH') or die('No direct script access.');

class Model_PaymentMethods extends ORM{
    
    protected $_table_name = 'payment_methods';
         
       
    public function rules(){
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value',64)),
            ),
          
        );
    }
}