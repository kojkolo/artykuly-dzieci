<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Products extends Controller_Default {
    
    private $all_subcat = array();
    
    public function action_index(){
        $this->template->title .= __('ProductsIndex');
        $this->template->content = 'products/index';
        
        //$products = ORM::factory('Products')->with('categories')->where('categories_id', '=', $this->request->param('id'))->find_all();
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
    }
    
    public function action_show(){
        $this->template->title .= __('ProductsShow');
        $this->template->content = 'products/show';
        
        //$products = ORM::factory('Products')->with('categories')->where('categories_id', '=', $this->request->param('id'))->find_all();
        $product = ORM::factory('Products', $this->request->param('id'))->with('tax');
        
        if($_POST){
            $this->addToCart($this->request->param('id'), $this->request->post('quantity'));
            $this->redirect('shopCart');
        }
        //print_r($this->session->get('shopCart'));
        //$this->session->delete('shopCart');
        View::set_global('product', $product);
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
