<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin  extends CI_controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->library('form_validation');
            if(!$this->session->userdata('username')) {
                redirect('auth');
            }
        }

        public function index()
        {
            $data['title'] = 'Dashboard';
            $this->load->view('templates/header.php', $data);
            $this->load->view('admin/index.php');
            $this->load->view('templates/footer.php');
        }
}
