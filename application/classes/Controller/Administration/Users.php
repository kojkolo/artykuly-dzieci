<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Users extends Controller_DefaultAdmin{
    public function action_index(){
        $this->template->content = 'administration/users';
        $this->template->title .= __('Users');
        
        $users = ORM::factory('user')->find_all();
        View::set_global('users', $users);
    }
    
    public function action_edit(){
        $this->template->content = 'administration/useredit';
        $this->template->title .= __('UserEdit');
        
        $user = ORM::factory('user', $this->request->param('id'));
        
        if($_POST){
            try{
                $user->update_user($this->request->post(), array('username', 'password', 'email'));
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
        }
            View::set_global('user', $user);
        
    }
    
    public function action_delete(){
        ORM::factory('user', $this->request->param('id'))->remove('roles');
        ORM::factory('user', $this->request->param('id'))->delete();
        $this->session->set('contentmessage', array('success' => __('DeleteSuccess')));
        $this->redirect('/administration/users');
    }
    
}

