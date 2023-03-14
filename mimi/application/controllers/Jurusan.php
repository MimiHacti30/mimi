<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_jurusan');
        if(!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Jurusan';

       $data['jurusan'] = $this->Model_jurusan->getAllJurusan();
       if( $this->input->post('keyword') ) {
            $data['jurusan'] = $this->Model_jurusan->CariJurusan();
       }
        $this->load->view('templates/header.php', $data);
        $this->load->view('jurusan/index.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');

        if($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Jurusan';

            $this->load->view('templates/login_header.php', $data);
            $this->load->view('jurusan/tambah.php', $data);
            $this->load->view('templates/login_footer.php');
        } else {
            $this->Model_jurusan->TambahJurusan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('jurusan');
        }
    }


    public function ubah($id)
    {
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
        $data['jurusan'] =$this->Model_jurusan->getJurusanById($id);

        if($this->from_validation->run() == false) {
            $data['title'] = 'Ubah Jurusan';

            $this->load->view('templates/login_header.php', $data);
            $this->load->view('jurusan/tambah.php', $data);
            $this->load->view('templates/login_footer.php');
        } else {
            $this->Model_jurusan->UbahJurusan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('jurusan');
        }
    }

    public function hapus($id)
    {
        $this->Model_jurusan->hapusJurusan($id);
        $this->session->set_flashdata('flash', 'Diubah');
        redirect('jurusan');
    }
}
   