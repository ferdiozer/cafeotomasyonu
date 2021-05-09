<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function index()
	{
	    $this->load->view('Settings/main');
	}

	public function general(){
        $viewData = new stdClass();
        $viewData->row  = $this->db->where('id',1)->get('contact')->row();
        $this->load->view('Settings/general',$viewData);
    }
    public function generalUpdate(){

        $data = array(
            "title" 			=> $this->input->post("title"),
            "address" 				=> $this->input->post("address"),
            "phone" 				    => $this->input->post("phone"),
            "fax" 				=> $this->input->post("fax"),
            "email" 					=> $this->input->post("email"),
            "web" 		=> $this->input->post("web"),
            "facebook" 			=> $this->input->post("facebook"),
            "twitter" 		=> $this->input->post("twitter"),
            "google_plus" 		=> $this->input->post("google_plus"),
            "instagram"	=> $this->input->post("instagram"),
            "youtube"	=> $this->input->post("youtube"),
            "linkedin"	=> $this->input->post("linkedin"),
            "mission"	=> $this->input->post("mission"),
            "vision"	=> $this->input->post("vision"),
            "about_us"	=> $this->input->post("about_us"),
            "about_us_short"	=> $this->input->post("about_us_short"),
            "meta_keyword"	=> $this->input->post("meta_keyword"),
            "meta_description"	=> $this->input->post("meta_description"),
            "map_att"	=> $this->input->post("map_att"),
            "map_lat"	=> $this->input->post("map_lat")
        );

        $update = $this->db->where('id',1)->update('contact', $data);
        if ($update){
            set_alert("Başarılı","Güncelleme Yapıldı","success");
            redirect(base_url('Settings'));
        }
        else{
            echo "hata";
        }
    }

    public function analytic_code(){
        $viewData = new stdClass();
        $viewData->row  = $this->db->where('id',1)->get('contact')->row('analytic_code');
        $this->load->view('Settings/analytic_code',$viewData);
    }

    public function analytic_codeUpdate(){

       /* echo $this->input->post("analytic_code");die();*/

        $data = array(
            "analytic_code" 			=> $this->input->post("analytic_code")
        );

        $update = $this->db->where('id',1)->update('contact', $data);
        if ($update){
            set_alert("Başarılı","Güncelleme Yapıldı","success");
            redirect(base_url('Settings'));
        }
        else{
            echo "hata";
        }
    }

    public function adverd_page(){
        $viewData = new stdClass();
        $viewData->row  = $this->db->where('id',1)->get('contact')->row();
        $this->load->view('Settings/adverd_page',$viewData);
    }
    public function adverd_pageUpdate(){
        $data = array(
            "a_seo_title" 			=> $this->input->post("a_seo_title"),
            "a_seo_description" 				=> $this->input->post("a_seo_description"),
            "a_seo_keyword" 				    => $this->input->post("a_seo_keyword")
        );

        $update = $this->db->where('id',1)->update('contact', $data);
        if ($update){
            set_alert("Başarılı","Güncelleme Yapıldı","success");
            redirect(base_url('Settings'));
        }
        else{
            echo "hata";
        }

    }
}
