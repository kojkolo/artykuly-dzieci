<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller {
    
    private $all_subcat = array();
    
    public function action_index(){
        $c = ORM::factory('Categories', $this->request->param('id'));
        
        $cch = $c->childs->find_all();
        
        $this->subcat($cch);
$sql = "SELECT `p`.* FROM `category_products` as `cp` LEFT JOIN `categories` as `c` ON cp.categories_id = c.id LEFT JOIN `products` as `p` ON cp.products_id = p.id WHERE c.id IN "; //(1, 3)
        
       $dd = '('.$c->id;
        foreach($this->all_subcat as $id){
            $dd .= ', '.$id;
        }
        $dd .= ')';
        
        $sql .= $dd;
        
        //echo $sql;

        $results = DB::query(Database::SELECT, $sql)->as_object('Model_Products')->execute();
       // $cat_prod = ORM::factory('CategoryProducts')->where('categories_id', '=', $this->request->param('id'))->products->find_all();
        View::set_global('cat', $c);
        View::set_global('products', $results);        
        View::set_global('message', array());

        
        echo View::factory('products/index');
    }
    
    private function subcat($i){
        foreach($i as $sc)
        {
            array_push($this->all_subcat, $sc->id);
            $check = $sc->childs->find_all();
            if(count($check))$this->subcat($check);
        }
        
    }
}