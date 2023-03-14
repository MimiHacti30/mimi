<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_Siswa');
        $this->load->model('Model_jurusan');
        if(!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
        {
            $data['title'] = 'Siswa';
            if ($this->input->post('submit')) {
                $data['keyword'] = $this->input->post('keyword');
            } else {
                $data['keyword'] = null;
            }
            
            $data['siswa'] = $this->Model_Siswa->getAllSiswa($data['keyword']);
            
            $this->load->view('templates/header.php', $data);
            $this->load->view('siswa/index.php', $data);
            $this->load->view('templates/footer.php');
        }

        public function tambah()
        {
            $data['jurusan'] = $this->Model_jurusan->getAllJurusan();
            $this->form_validation->set_rules('nis','Nis','trim|requidred|numeric');
            $this->form_validation->set_rules('nama','Nama','trim|required');
            $this->form_validation->set_rules('angkatan','Angkatan','trim|required');
            $this->form_validation->set_rules('jurusan','Jurusan','trim|required');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('hp','Hp','trim|required|numeric');
            $this->form_validation->set_rules('alamat','Alamat','trim|required');


            if($this->form_validation->run() == false ) {
                $data['title'] ='Tambah Siswa';

                $this->load->view('templates/header.php',$data);
                $this->load->view('siswa/tambah.php',$data);
                $this->load->view('templates/footer.php');
            } else {
                $this->Model_Siswa->Tambahsiswa();
                redirect('siswa');
            }
        }


      public function ubah($id)
      {
            $data['siswa'] = $this->Model_Siswa->getSiswaById($id);
            $data['jurusan'] = $this->Model_jurusan->getAllJurusan();
            $this->form_validation->set_rules('nis', 'Nis', 'trim|required|numeric');
            $this->form_validation->set_rules('nis', 'Nis', 'trim|required');
            $this->form_validation->set_rules('nis', 'Nis', 'trim|required|numeric');
            $this->form_validation->set_rules('nis', 'Nis', 'trim|required');
            $this->form_validation->set_rules('nis', 'Nis', 'trim|required|numeric');
            $this->form_validation->set_rules('nis', 'Nis', 'trim|required|numeric');
            $this->form_validation->set_rules('nis', 'Nis', 'trim|required|numeric');
            $this->form_validation->set_rules('nis', 'Nis', 'trim|required|numeric');


            if($this->form_validation->run() == false ) {
                $data['title'] = 'ubah siswa';

                $this->load->view('templates/header.php',$data);
                $this->load->view('siswa/ubah.php',$data);
                $this->load->view('templates/footer.php');
            }  else {
                $this->Model_Siswa->Ubahsiswa();
                $old_image = $data['siswa']['foto'];
                unlink(FCPATH . 'assets/foto/' . $old_image);
                $this->session->set_flashdata('flash', 'Diubahkan');
                redirect('siswa');
            } 
      }
        

            public function detail($id)
            {
                $data['siswa'] = $this->Model_Siswa->getSiswaById($id);

                $data['title'] = 'Detail Siswa';
                $this->load->view('templates/header.php',$data);
                $this->load->view('siswa/ubah.php',$data);
                $this->load->view('templates/footer.php');
            }

            public function hapus($id)
            {
                $data['siswa'] = $this->Model_Siswa->getSiswaById($id);
                $old_image = $data['siswa']['foto'];
                unlink(FCPATH . 'assets/foto/' . $old_image);
                $this->Model_Siswa->hapusSiswa($id);
                $this->session->set_flashdata('flash', 'Dihapus');
                redirect('siswa');

            }
           
}
        
       