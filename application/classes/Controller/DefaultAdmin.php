<?php defined('SYSPATH') or die('No direct script access.');

class Controller_DefaultAdmin extends Controller_Default{
    
    public function before(){
        $this->template = 'template/admin';
        parent::before();

        if(!Auth::instance()->logged_in('admin')){
            $this->redirect('/access_denied');
            exit();
        }
    }
    
    public function after() {
        parent::after();
    }
    
}

