<?php defined('SYSPATH') or die('No direct script access.');

class Model_Categories extends ORM{
    
    protected $_table_name = 'categories';
    
    protected $_belongs_to = array (
        'parent' => array(
            'model' => 'categories',
            'foreign_key' => 'parent_id'
        )
    );
    
    protected $_has_many = array (
        'childs' => array(
            'model' => 'categories',
            'foreign_key' => 'parent_id'
        )
    );
    
    public function rules(){
        return array(
            'name' => array(
                array('not_empty'),
                array('max_length', array(':value',128)),
                array(array($this, 'is_unique')),                
            )
        );
    }

        public function is_unique($id){
        return !(bool) DB::select(array(DB::expr('COUNT(id)'), 'total'))
                ->from($this->_table_name)
                ->where('name', '=', $id)
                ->and_where($this->_primary_key, '!=', $this->pk())
                ->execute()
                ->get('total');
    }
}