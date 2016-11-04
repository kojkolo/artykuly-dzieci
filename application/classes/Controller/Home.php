<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Default {
    
    public function action_index(){
        
        $this->template->title .= __('HomeIndex');
        $this->template->content = 'home/index';
    }
    

    
}