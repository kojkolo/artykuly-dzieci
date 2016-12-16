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
            if($_POST){
                $user = Auth::instance()->get_user();

                $destination = ORM::factory('DeliveryDestinations');
                $destination->name = $this->request->post('name');
                $destination->surname = $this->request->post('surname');
                $destination->company_name = $this->request->post('company_name');
                $destination->street_number = $this->request->post('street_number');
                $destination->postal_code = $this->request->post('postal_code');
                $destination->city = $this->request->post('city');
                $destination->phone_number = $this->request->post('phone_number');
                $destination->save();

                $order = ORM::factory('Orders');
                $order->user_id = $user->id;
                $order->delivery_methods_id = $this->request->post('deliverymethods');
                $order->delivery_destinations_id = $destination->id;
                $order->payment_methods_id = $this->request->post('paymentmethods');
                $order->status_orders_id = 1;
                $order->save();

                $cart = $this->session->get('shopCart');

                foreach($cart as $k => $v)
                {
                    $pro = ORM::factory('Products', $k);
                    $ordPro = ORM::factory('OrderProducts');
                    $ordPro->orders_id = $order->id;
                    $ordPro->product_id = $pro->id;
                    $ordPro->tax_id = $pro->tax_id;
                    $ordPro->quantity = $v;
                    $ordPro->pcs_price = $pro->netto_price;
                    $ordPro->save();
                }
                
                $this->session->delete('shopCart');
                $this->redirect('order/confirmation');
            }
            
            $delmet = ORM::factory('DeliveryMethods')->find_all();
            View::set_global('deliverymethods', $delmet);
            $paymet = ORM::factory('PaymentMethods')->find_all();
            View::set_global('paymentmethods', $paymet);
            $this->template->content = 'order/index';
        }
        
    }
    
    public function action_confirmation(){
        $this->template->title .= __('OrderConfirmation');
        
        if(!Auth::instance()->logged_in()){
            $this->template->content = 'order/login';
            $this->session->set('redirect', '/order');
        }
        else
        {
                      
            $this->template->content = 'order/confirmation';
        }
        
    }
}