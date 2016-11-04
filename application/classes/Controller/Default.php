<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Default extends Controller_Template {

	public $template = 'template/index';
        
        public $redirect = NULL;
        
        public $session;
        
        public function before() {
            parent::before();
            
            if(!isset($_SESSION)){
                $this->session = Session::instance();
            }
           
            if($this->auto_render)
            {
                $this->template->title=__('MainTitle');
                $this->template->description='';
                $this->template->content='';
                $this->template->styles = array();
                $this->template->scripts = array();
                $this->template->contentmessage = array();
                $this->template->message = array();
                $this->template->errors = array();
            }
            
         
        }
        
        public function after() {
            
            if($this->redirect !== NULL)
            {
                $this->redirect($this->redirect);
            }

            if($this->auto_render)
            {
                $styles = array(
                    'css/style.css' => 'screen',
                    'css/bootstrap.min.css' => 'screen',
                );
            
                $scripts = array(
                    'js/jquery.min.js',
                    'js/bootstrap.min.js',
                );
                
                $this->template->styles = array_merge( $this->template->styles, $styles);
                $this->template->scripts = array_merge( $this->template->scripts, $scripts);
            }
            $this->template->content = View::factory($this->template->content);
            
            if($this->session->get('contentmessage'))
                $this->template->content->message = $this->session->get('contentmessage');
            else
                $this->template->content->message = array();
            
            if($this->session->get('errors'))
                $this->template->content->errors = $this->session->get('errors');
            else
                $this->template->content->errors = array();
            
            if($this->session->get('message'))
                $this->template->message = $this->session->get('message');
            else
                $this->template->message = array();
            
            //$this->template->contentmessage = null;
            $this->session->delete('message');
            $this->session->delete('contentmessage');
            $this->session->delete('errors');
            parent::after();
        }
    
}

