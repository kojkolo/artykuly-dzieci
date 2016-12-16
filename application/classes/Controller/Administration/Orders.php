<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Orders extends Controller_DefaultAdmin{
    public function action_index(){
        $this->template->content = 'administration/orders/index';
        $this->template->title .= __('Orders');
        $orders = ORM::factory('Orders')->find_all();

        View::set_global('orders', $orders);
    }
    
    public function action_view(){
        $this->template->content = 'administration/orders/view';
        $this->template->title .= __('OrdersView');
        $order = ORM::factory('Orders', $this->request->param('id'));
        $products = ORM::factory('OrderProducts')->where('orders_id', '=', $order->id)->find_all();
        View::set_global('order', $order);
        View::set_global('products', $products);
    }
    
    public function action_realisation(){
        $order = ORM::factory('Orders', $this->request->param('id'));
        $order->status_orders_id = $order->status_orders_id+1;
        $order->save();
        $this->redirect('administration/orders/index');
    }
    
    public function action_cancel(){
        $order = ORM::factory('Orders', $this->request->param('id'));
        $order->status_orders_id = 4;
        $order->save();
        $this->redirect('administration/orders/index');
    }
}