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
                if($this->session->get('redirect'))
                {
                    $rd = $this->session->get('redirect');
                    $this->session->delete('redirect');
                    $this->redirect = $rd;
                }
                else
                {
                    $this->redirect = '/';
                }
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
                
                if($this->session->get('redirect'))
                {
                    Auth::instance()->login($this->request->post('username'), $this->request->post('password'));
                    $rd = $this->session->get('redirect');
                    $this->session->delete('redirect');
                    $this->redirect = $rd;
                }

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
            
    }
    
    }
    
    public function action_acces_denied(){
        $this->template->content = 'auth/access_denied';
        $this->template->title .= __('AccesDenied');
    }
    
}

