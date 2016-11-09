<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Dashboard extends Controller_DefaultAdmin{
    public function action_index(){
        $this->template->content = 'administration/dashboard';
        $this->template->title .= __('Dashboard');
        
    }
}
