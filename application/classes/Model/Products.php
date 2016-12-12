<?php defined('SYSPATH') or die('No direct script access.');

class Model_Products extends ORM{
    
    protected $_table_name = 'products';
    
    protected $_has_many = array(
        'categories' => array(
            'model'   => 'Categories',
            'through' => 'category_products',
            'foreign_key' => 'products_id',
            'far_key' => 'categories_id',
        ),
        
    );
    
    protected $_belongs_to = array(
        'tax' => array(
            'model'   => 'Taxes',
            'foreign_key' => 'tax_id',
            'far_key' => 'id',
        ),
    );
         
       
    public function rules(){
        return array(
          'name' => array(
                array('not_empty'),
                array('max_length', array(':value',128)),              
            ),
          'image' => array(
                array('max_length', array(':value',128)),
          ),
            'netto_price' => array(
                array('decimal'),
                array('not_empty'),
            ),
            'quantity' => array(
                array('numeric'),
                array('not_empty'),
            )
        );
    }
}