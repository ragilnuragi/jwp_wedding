<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    // Konstruktor untuk menginisialisasi library dan model yang diperlukan
    public function __construct(){
        parent:: __construct();
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    // Metode utama yang menampilkan halaman login
    // $passDefault=password_hash('admin013', PASSWORD_DEFAULT);
    public function index(){
        // Validasi form untuk input username dan password
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // Jika validasi gagal, tampilkan halaman login
        if($this->form_validation->run() == false){
            $data = array(
                'title'=> 'JeWePe Wedding Organizer',
            );

            $this->load->view('admin/login', $data);
        } else {
            // Jika validasi berhasil dan terdapat input dari pengguna
            if($this->input->post()){
                $post = $this->input->post();

                // Cari pengguna berdasarkan username
                $where1 = $post["username"];
                $user = $this->user_model->getUserByUsername1($where1)->row();

                // Jika pengguna ditemukan
                if ($user){
                    // Periksa kesesuaian password
                    $isPasswordTrue = password_verify($post["password"], $user->password);

                    // Jika password benar, buat session untuk pengguna
                    if ($isPasswordTrue){
                        $array = array(
                            'user_id' => $user->user_id,
                            'username' => $user->username
                        );
                        $this->session->set_userdata($array);

                        // Redirect ke halaman dashboard admin
                        redirect('admin/Dashboard');
                        return true;
                    } else {
                        // Jika password salah, tampilkan pesan error
                        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"><strong>Upss </strong>
                        Password anda tidak sesuai</div>');
                        redirect('login');
                    }
                } else {
                    // Jika pengguna tidak ditemukan, tampilkan pesan error
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Upss </strong>
                        Username tidak terdaftar</div>');
                    redirect('login');
                }
            }
        }
    }

    // Metode untuk logout dan menghancurkan session
    public function logout(){
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        $this->session->sess_destroy;
        redirect('login');
    }
}
