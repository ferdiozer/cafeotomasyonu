<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();


                if (!is_login()) {
                    redirect(base_url('Account/loginPage'));
                }

    }

	public function index() {

        $this->load->view('Dashboard/index');
	}

	public function setting() {
        $this->load->view("Dashboard/setting");
    }

}
