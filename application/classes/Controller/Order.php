<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Order extends Controller_Default {
    
    public function action_index(){
        $this->template->title .= __('OrderIndex');
        
        if(!Auth::instance()->logged_in()){
            $this->template->content = 'order/login';
            $this->session->set('redirect', '/order');
        }
        else
        {
            $delmet = ORM::factory('DeliveryMethods')->find_all();
            View::set_global('deliverymethods', $delmet);
            $paymet = ORM::factory('PaymentMethods')->find_all();
            View::set_global('paymentmethods', $paymet);
            $this->template->content = 'order/index';
        }
        
    }
}