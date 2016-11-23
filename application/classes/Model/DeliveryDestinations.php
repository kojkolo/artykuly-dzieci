<?php defined('SYSPATH') or die('No direct script access.');

class Model_DeliveryDestinations extends ORM{
    
    protected $_table_name = 'delivery_destinations';
         
       
    public function rules(){
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value',32)),              
            ),
            'surname' => array(
                array('not_empty'),
                array('max_length', array(':value',32)),              
            ),
            'company_name' => array(
                array('max_length', array(':value',64)),              
            ),
            'street_number' => array(
                array('not_empty'),
                array('max_length', array(':value',64)),              
            ),
            'postal_code' => array(
                array('not_empty'),
                array('max_length', array(':value',6)),              
            ),
            'city' => array(
                array('not_empty'),
                array('max_length', array(':value',64)),              
            ),
            'phone_number' => array(
                array('not_empty'),
                array('max_length', array(':value',20)),              
            ),
          
        );
    }
}