<?php defined('SYSPATH') or die('No direct script access.');

class Model_Taxes extends ORM{
    
    protected $_table_name = 'taxes';
         
    
    
    public function rules(){
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value',64)),              
            )
        );
    }
}