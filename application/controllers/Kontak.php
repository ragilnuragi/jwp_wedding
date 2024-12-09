<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Kontak
 * 
 * Controller ini digunakan untuk menangani halaman kontak pada aplikasi web JeWePe Wedding Organizer.
 */
class Kontak extends CI_Controller {
    /**
     * Kontak constructor.
     * 
     * Memuat model settings_model untuk mendapatkan pengaturan situs web.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('settings_model');
    }

    /**
     * Index
     * 
     * Fungsi ini digunakan untuk menampilkan halaman kontak.
     * Data yang dikirim ke view termasuk judul halaman, halaman yang akan ditampilkan, 
     * dan data pengaturan web yang diambil dari model settings_model.
     */
    public function index()
    {
        // Mengambil data pengaturan web dari model settings_model
        $data = array(
            'title'=> 'JeWePe Wedding Organizer', // Judul halaman
            'page'=> 'landing/kontak', // Halaman yang akan ditampilkan
            'getDataWeb' => $this->settings_model->getSettings('1')->row() // Data pengaturan web
        );

        // Memuat view dengan data yang telah disiapkan
        $this->load->view('landing/templetes/sites', $data);
    }
}
