<?php defined('SYSPATH') or die('No direct script access.');

class Controller_ShopCart extends Controller_Default {
    
    public function action_index(){
        $this->template->title .= __('ShopCartIndex');
        $this->template->content = 'shopcart/index';
        
        if($_POST){
            $this->addToCart($this->request->post('id'), $this->request->post('quantity'));
            $this->redirect('shopCart');
        }
        //$this->session->delete('shopCart');
        $sql = "SELECT * FROM `products` WHERE id IN "; //(1, 3)
        
       $dd = '(';
       $cart = $this->session->get('shopCart');
       if($cart != NULL){
        foreach($cart as $k => $v){
            $dd .= $k.', ';
        }
       }
        $dd .= 'null)';
        
        $sql .= $dd;
        
        //echo $sql;

        $results = DB::query(Database::SELECT, $sql)->as_object('Model_Products')->execute();
        
        View::set_global('shopCart', $cart);
        View::set_global('products', $results);

    }
}