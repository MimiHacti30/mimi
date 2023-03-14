<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

        public function index()
        {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/login_header.php');
            $this->load->view('auth/index.php');
            $this->load->view('templates/login_footer.php');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $user = $this->input->post('username', true);
        $pass = $this->input->post('password', true);

        $ambil_data = $this->db->get_where('user', ['username' =>$user])->row_array();

    if($ambil_data) {
        if($pass == $ambil_data['password']) {
            $data = [
                'username' => $ambil_data['username']
            ];
            $this->session->set_userdata($data);
            redirect('admin');
    } else {
            $this->session->set_flashdata('message', 'password salah' );
            redirect('auth');
        } 
    } else {
        $this->session->set_flashdata('message','username','username salah');
        redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', 'telah logout');
        redirect('auth');
    }
}