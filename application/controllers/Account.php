<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model("User_model");
    }

    public function index(){
    }

    public function loginPage(){
        $this->load->view('login');
    }
    public function login(){
        $data = new stdClass();
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Kullanıcı Adı', 'trim|required');
        $this->form_validation->set_rules('password', 'Şifre', 'trim|required');

        if ($this->form_validation->run() == false) {
            set_alert("Başarısız", "Gerekli Alanları Doldurun","error");
            $this->load->view('login');

        } else {

            if ($this->User_model->resolve_user_login($username, $password)) {
                redirect(base_url());
            }
            else{
                set_alert("Başarısız","Giriş Bilgileriniz Doğrulanmıyor Lütfen daha sonra tekrar deneyiniz","error");
                $this->load->view('login');
            }

        }
    }
    public function logout(){
        $this->session->unset_userdata('login');
        redirect(base_url());
    }

    public function updatePassword(){

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('new_password', 'Şifre', 'trim|required|min_length[6]',array('min_length' => 'Şifre en az 6 karakter olmalı.'));
        $this->form_validation->set_rules('confirm_password', 'Şifre Tekrarı', 'trim|required|matches[new_password]',array('matches' => 'Şifreler uyuşmuyor.'));

        $password = $this->input->post('password');
        $new_password = $this->input->post('new_password');

        if ($this->form_validation->run() == FALSE){
            set_alert("HATA","Girdiğiniz Bilgileri Kontrol Edip Tekrar Deneyiniz(Şifreler uyuşmuyor yada 6 karakterden kısa)","error");
        }
        else{

            if ($this->User_model->password_is_true($password)){
                $data = array('password'=>$this->encrypt->encode($new_password));

                $update = $this->User_model->update(array('id'=>get_user()->id),$data);
                if ($update){
                    set_alert("Başarılı","Şifreniz Güncellenmiştir","success");
                }
                else{
                    echo "hata";
                }
            }
            else{
                set_alert("HATA","Eski Şifreyi Yanlış Gridiniz","error");
            }



        }
        redirect(base_url('Customer/Profile'));

    }
    public function updatePasswordPage(){
        if (!is_login()) {
            $this->load->view('login');
        }
        $this->load->view('updatePassword');
    }

}
