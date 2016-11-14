<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Auth extends Controller_Default{
    
    public function action_login(){
        if(Auth::instance()->logged_in())
        {
            $this->redirect('/');
        }
        $this->template->content = 'auth/login';
        $this->template->title .= __('AuthLogin');
        if(isset($_POST['submit'])){
            $user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'));
              // var_dump($user);
            if($user)
            {
                $this->session->set('message', array('success' => __('LoggedIn')));
                $this->redirect = '/';
            }
            else
            {
                $this->session->set('contentmessage', array('danger' => __('LoginError')));
            }
        }
    }
        
       //$client = ORM::factory('user')->where('id', '=', 1)->find_all();
       //var_dump($client);
        //echo $client->get('username');
        
    
    
    public function action_logout(){
        if(!Auth::instance()->logged_in())
        {
            $this->session->set('message', array('danger' => __('NotLoggedIn')));
        }
        else
        {
            Auth::instance()->logout();
            $this->session->set('message', array('success' => __('LogoutSucces')));
        }
        $this->redirect('/');
    }
    
    public function action_register(){
        
        if(Auth::instance()->logged_in() && !Auth::instance()->logged_in('admin'))
        {
            $this->redirect('/');
        }
        $this->template->content = 'auth/register';
        $this->template->title .= __('AuthRegister');
        if(isset($_POST['submit'])){
           
            
            try{
                $user = new Model_User;
                $user->create_user($this->request->post(), array('username', 'password', 'email'));
                $user->save();
                $role = ORM::factory('Role','1');
                $user->add('roles',$role);
                $user->save();
                $this->session->set('contentmessage', array('success' => __('RegistrationSuccess')));

            }catch (ORM_Validation_Exception $e)
            {
                $this->session->set('errors', $e->errors('models'));
                $this->session->set('contentmessage', array('danger' => __('RegistrationError')));
            }
            catch (Exception $error)
            {
                $this->session->set('errors', $error->getMessage());
                $this->session->set('contentmessage', array('danger' => __('RegistrationError2')));
            }
            
            if(Auth::instance()->logged_in('admin') && !empty($this->session->get('contentmessage')['success'])) $this->redirect('/administration/users');
            /*if($user)
            {
                $client = ORM::factory('user');
                $client->email = $this->request->post('email');
                $client->username = $this->request->post('username');
                $client->password = $this->request->post('password');
                $client->save();

                $role = ORM::factory('role','1');
                $client->add('roles',$role);
                $client->save();
                $this->session->set('message', array('success' => __('RegistrationSuccess')));
                $this->redirect = '/';
            }
            else
            {
                $this->session->set('contentmessage', array('danger' => __('RegistrationError')));
            }
        }
        /*$client = ORM::factory('user');
        $client->email = "gurzigod@gmail.com";
        $client->username = "gurzigod";
        $client->password = "gurzigod";
        $client->save();
        
        $role = ORM::factory('role','2');
        $client->add('roles',$role);
        $client->save();*/
    }
    
    }
    
    public function action_acces_denied(){
        $this->template->content = 'auth/access_denied';
        $this->template->title .= __('AccesDenied');
    }
    
}

