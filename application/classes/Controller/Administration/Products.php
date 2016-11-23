<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Administration_Products extends Controller_DefaultAdmin{
    
    public function action_index(){
        $this->template->content = 'administration/products/index';
        $this->template->title .= __('Products');
        
        $products = ORM::factory('products')->find_all();

        View::set_global('products', $products);
    }
    public function action_edit(){
        $this->template->content = 'administration/products/edit';
        $this->template->title .= __('ProductEdit');
        
        $product = ORM::factory('Products', $this->request->param('id'));
        
        if($_POST){
            try{
                $filename = NULL;
                if(isset($_FILES['image']))
                {
                    $filename = $this->_save_image($_FILES['image']);
                }
                
                if($filename == 0 OR $filename == NULL)
                    $filename = $product->image;
                                 
                $product->name = $this->request->post('name'); 
                $product->remove('categories');
                $product->description = $this->request->post('description'); 
                $product->netto_price = $this->request->post('netto_price'); 
                $product->quantity = $this->request->post('quantity'); 
                $product->image = $filename;
                if(!isset($_POST['available']))
                    $product->available = 0;
                else
                    $product->available = 1; 
                $product->tax_id = $this->request->post('tax_id');
                
                $product->validation();
                $product->save();
                
                foreach($this->request->post('categories') as $cat){
                   $product->add('categories', $cat);
               }
            }catch (ORM_Validation_Exception $e)
            {
                $this->session->set('errors', $e->errors('models'));
                $this->session->set('contentmessage', array('danger' => __('ProductEditError')));
            }
            catch (Exception $error)
            {
                $this->session->set('errors', $error->getMessage());
                $this->session->set('contentmessage', array('danger' => __('ProductEditError2')));
            }
        }
            View::set_global('product', $product);
            $taxes = ORM::factory('Taxes')->find_all();
        $categories = ORM::factory('Categories')->find_all();         
            View::set_global('taxes', $taxes);
            View::set_global('categories', $categories);
        
    }
    public function action_delete(){
        ORM::factory('Products', $this->request->param('id'))->remove('categories');
        ORM::factory('Products', $this->request->param('id'))->delete();
        $this->session->set('contentmessage', array('success' => __('DeleteSuccess')));
        $this->redirect('/administration/products');
    }
    
    public function action_add(){
        $this->template->content = 'administration/products/add';
        $this->template->title .= __('ProductAdd');
        
        if($_POST){
            try{
               $product = new Model_Products();
               $product->name = $this->request->post('name');
               $product->description = $this->request->post('description');
               
               $filename = NULL;
               if(isset($_FILES['image']))
               {
                   $filename = $this->_save_image($_FILES['image']);
               }
               
               $product->image = $filename;
               $product->quantity = $this->request->post('quantity');
               $product->tax_id = $this->request->post('tax_id');
               //$product->category = $this->request->post('category');
               $product->netto_price = $this->request->post('netto_price');
               if(!isset($_POST['available']))
                   $product->available = 0;
               else
                   $product->available = 1;
               
               $product->validation();
               $product->save();
               
               foreach($this->request->post('categories') as $cat){
                   $product->add('categories', $cat);
               }
               
               $this->session->set('contentmessage', array('success' => __('ProductAddSuccess')));
            }catch (ORM_Validation_Exception $e)
            {
                $this->session->set('errors', $e->errors('models'));
                $this->session->set('contentmessage', array('danger' => __('ProductAddError')));
            }
            catch (Exception $error)
            {
                $this->session->set('errors', $error->getMessage());
                $this->session->set('contentmessage', array('danger' => __('ProductAddError2')));
            }
        }
        
        $products = ORM::factory('Products')->find_all();
        $taxes = ORM::factory('Taxes')->find_all();
        $categories = ORM::factory('Categories')->find_all();
            View::set_global('products', $products);            
            View::set_global('taxes', $taxes);
            View::set_global('categories', $categories);

    }
    
    protected function _save_image($image)
    {
        if (
            !Upload::valid($image) OR
            !Upload::not_empty($image) OR
            !Upload::type($image, array('jpg', 'jpeg', 'png', 'gif')))
        {
            return FALSE;
        }
 
        $directory = DOCROOT.'uploads/';
 
        if ($file = Upload::save($image, NULL, $directory))
        {
            $filename = strtolower(Text::random('alnum', 20)).'.jpg';
 
            Image::factory($file)
                //->resize(200, 200, Image::AUTO)
                ->save($directory.$filename);
 
            unlink($file);
 
            return $filename;
        }
 
        return FALSE;
    }
}    