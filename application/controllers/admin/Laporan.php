<?php
// Cegah akses langsung ke file ini
defined('BASEPATH') OR exit('No direct script access allowed');

// Deklarasi kelas Laporan yang merupakan turunan dari CI_Controller
class Laporan extends CI_Controller {

    // Konstruktor kelas Laporan
    public function __construct(){
        // Panggil konstruktor dari kelas induk
        parent::__construct();
        
        // Cek apakah sesi 'username' kosong, jika ya, maka beri pesan kesalahan dan redirect ke halaman login
        if(empty($this->session->userdata('username'))){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"><strong>Upss </strong>
            Anda tidak memiliki akses admin</div>');
            redirect('login');
        }
        
        // Load model 'pesanan_model' untuk digunakan dalam kelas ini
        $this->load->model('pesanan_model');
    }

    // Fungsi default yang akan dipanggil saat mengakses controller ini
    public function index()
    {
        // Buat array data untuk dikirim ke view
        $data = array(
            'title'=> 'JeWePe Wedding Organizer', // Judul halaman
            'page'=> 'admin/laporan', // Nama halaman yang akan ditampilkan
            'getAllLaporan' => $this->pesanan_model->get_all_laporan()->result(), // Data semua laporan dari model pesanan_model
        );

        // Load view 'main' yang berada di folder 'admin/templete' dengan data yang telah disiapkan
        $this->load->view('admin/templete/main', $data);
    }
}
?>
