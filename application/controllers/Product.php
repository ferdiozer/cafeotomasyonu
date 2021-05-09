<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
                if (!is_login()) {
                    redirect(base_url('Account/loginPage'));
                }

        $this->load->model("Product_model");
        $this->load->model("Product_category_model");
    }

	public function index(){
        $where_data = array();
	    $data= array(
	        'products'=>$this->Product_model->get_all($where_data),
	        'product_categories'=>$this->Product_category_model->get_all($where_data)

        );

        $this->load->view('Product/index',$data);
	}

	public function delete($id){
        $where_data = array('id'=>$id);
       $delete = $this->Product_model->delete($where_data);
       if ($delete){
           redirect(base_url("Product"));
       }
    }

    public function deleteProductCategory($id){
        $where_data = array('id'=>$id);
        $delete = $this->Product_category_model->delete($where_data);
        if ($delete){
            $delete2 = $this->Product_model->delete(array('product_category_id'=>$id));
            if ($delete2){
                redirect(base_url("Product"));
            }
        }
    }

    /*masa kategori ekle*/
    public function saveProductCategory(){
        $data = array(
            "title" 	=> $this->input->post("title")
        );

        $insert = $this->Product_category_model->add($data);

        if($insert){
            redirect(base_url("Product"));
        }else{
            echo "hata oluştu";
        }
    }

    /*masa ekle*/
    public function saveProduct(){
        $data = array(
            "title" 	=> $this->input->post("title"),
            "product_category_id" 	=> $this->input->post("product_category_id"),
            "price_default" 	=> $this->input->post("price_default")
        );

        $insert = $this->Product_model->add($data);

        if($insert){
            redirect(base_url("Product"));
        }else{
            echo "hata oluştu";
        }
    }

}
