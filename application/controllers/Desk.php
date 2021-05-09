<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();


                if (!is_login()) {
                    redirect(base_url('Account/loginPage'));
                }


        $this->load->model("Desk_model");
        $this->load->model("Desk_category_model");
    }

	public function index(){
        $where_data = array();
	    $data= array(
	        'desks'=>$this->Desk_model->get_all($where_data),
	        'desks_categories'=>$this->Desk_category_model->get_all($where_data)

        );

        $this->load->view('Desk/index',$data);
	}

	public function delete($id){
        $where_data = array('id'=>$id);
       $delete = $this->Desk_model->delete($where_data);
       if ($delete){
           redirect(base_url("Desk"));
       }
    }

    public function deleteDeskCategory($id){
        $where_data = array('id'=>$id);
        $delete = $this->Desk_category_model->delete($where_data);
        if ($delete){
            $delete2 = $this->Desk_model->delete(array('desk_category_id'=>$id));
            if ($delete2){
                redirect(base_url("Desk"));
            }
        }
    }

    /*masa kategori ekle*/
    public function saveDeskCategory(){
        $data = array(
            "title" 	=> $this->input->post("title")
        );

        $insert = $this->Desk_category_model->add($data);

        if($insert){
            redirect(base_url("Desk"));
        }else{
            echo "hata oluştu";
        }
    }

    /*masa ekle*/
    public function saveDesk(){
        $data = array(
            "title" 	=> $this->input->post("title"),
            "desk_category_id" 	=> $this->input->post("desk_category_id")
        );

        $insert = $this->Desk_model->add($data);

        if($insert){
            redirect(base_url("Desk"));
        }else{
            echo "hata oluştu";
        }
    }

}
