<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // Metode konstruktor untuk menginisialisasi komponen yang diperlukan
    public function __construct(){
        parent::__construct();
        
        // Memeriksa apakah pengguna sudah login dan memiliki akses admin
        if(empty($this->session->userdata('username'))){
            // Mengatur pesan flash yang menunjukkan bahwa akses admin tidak ada
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><strong>Upss </strong>
            Anda tidak memiliki akses admin</div>');
            // Mengarahkan ke halaman login jika bukan admin
            redirect('login');
        }

        // Memuat model yang diperlukan untuk katalog dan pesanan
        $this->load->model('katalog_model');
        $this->load->model('pesanan_model');
    }

    // Metode default untuk dashboard
    public function index()
    {
        // Menyiapkan data yang akan diteruskan ke view
        $data = array(
            'title'=> 'JeWePe Wedding Organizer',  // Judul halaman
            'page'=> 'admin/dashboard',            // Identifier halaman
            'TotalKatalog' => $this->katalog_model->get_all_katalog()->num_rows(),  // Total jumlah item katalog
            'TotalPesanan' => $this->pesanan_model->get_count_pesanan('all')->num_rows(),  // Total jumlah pesanan
            'PesananMenunggu' => $this->pesanan_model->get_count_pesanan('requested')->num_rows(),  // Jumlah pesanan yang diminta
            'PesananDiterima' => $this->pesanan_model->get_count_pesanan('approved')->num_rows(),  // Jumlah pesanan yang disetujui
            'PesananDibatalkan' => $this->pesanan_model->get_count_pesanan('cancelled')->num_rows(),  // Jumlah pesanan yang dibatalkan
        );

        // Memuat view template utama dengan data
        $this->load->view('admin/templete/main', $data);
    }
}
