<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Categories extends Controller_DefaultAdmin{
    
    public function action_index(){
        $this->template->content = 'administration/categories/index';
        $this->template->title .= __('Categories');
        
        $categories = ORM::factory('Categories')->where('parent_id', '=', NULL)->find_all();
        View::set_global('categories', $categories);
    }
    public function action_edit(){
        $this->template->content = 'administration/categories/edit';
        $this->template->title .= __('CategoryEdit');
        
        $category = ORM::factory('Categories', $this->request->param('id'));
        
        if($_POST){
            try{
               $category->name = $this->request->post('name');
               $category->description = $this->request->post('description');
               if(!isset($_POST['hidden']))
                   $category->hidden = 0;
               else
                   $category->hidden = 1;
               
               if($_POST['parent_id'] == 'NULL')
                   $category->parent_id = NULL;
               else
                   $category->parent_id = $this->request->post('parent_id');
               $category->validation();
               $category->save();
               $this->session->set('contentmessage', array('success' => __('CategoryEditSuccess')));
            }catch (ORM_Validation_Exception $e)
            {
                $this->session->set('errors', $e->errors('models'));
                $this->session->set('contentmessage', array('danger' => __('CategoryEditError')));
            }
            catch (Exception $error)
            {
                $this->session->set('errors', $error->getMessage());
                $this->session->set('contentmessage', array('danger' => __('CategoryEditError2')));
            }
        }
            View::set_global('category', $category);
            $categories = ORM::factory('Categories')->find_all();
            View::set_global('categories', $categories);
    }
    public function action_add(){
        $this->template->content = 'administration/categories/add';
        $this->template->title .= __('CategoryAdd');
        
        if($_POST){
            try{
                $category = new Model_Categories();
               $category->name = $this->request->post('name');
               $category->description = $this->request->post('description');
               if(!isset($_POST['hidden']))
                   $category->hidden = 0;
               else
                   $category->hidden = 1;
               
               if($_POST['parent_id'] == 'NULL')
                   $category->parent_id = NULL;
               else
                   $category->parent_id = $this->request->post('parent_id');
               $category->validation();
               $category->save();
               $this->session->set('contentmessage', array('success' => __('CategoryAddSuccess')));
            }catch (ORM_Validation_Exception $e)
            {
                $this->session->set('errors', $e->errors('models'));
                $this->session->set('contentmessage', array('danger' => __('CategoryAddError')));
            }
            catch (Exception $error)
            {
                $this->session->set('errors', $error->getMessage());
                $this->session->set('contentmessage', array('danger' => __('CategoryAddError2')));
            }
        }
        
        $categories = ORM::factory('Categories')->find_all();
            View::set_global('categories', $categories);
        
    }
    
    public function action_delete(){
        //TODO: Zabezpieczenie gdy w danej kategorii znajdują się produkty
        if(count(ORM::factory('Categories', $this->request->param('id'))->childs->find_all()))
        {
            $this->session->set('contentmessage', array('danger' => __('CategoriesDeleteErrorSubcat')));
        }
        else
        {
            ORM::factory('Categories', $this->request->param('id'))->delete();
            $this->session->set('contentmessage', array('success' => __('CategoriesDeleteSuccess')));
        }
        $this->redirect('/administration/categories');
    }
}