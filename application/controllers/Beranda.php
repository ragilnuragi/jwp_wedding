<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Kelas Beranda mengelola halaman beranda dari aplikasi JeWePe Wedding Organizer.
 */
class Beranda extends CI_Controller {

    /**
     * Konstruktor untuk kelas Beranda.
     * Memuat database dan model yang diperlukan.
     */
    public function __construct()
    {
        // Memanggil konstruktor dari kelas induk (CI_Controller)
        parent::__construct();
        // Memuat database
        $this->load->database();
        // Memuat model settings_model
        $this->load->model('settings_model');
        // Memuat model katalog_model
        $this->load->model('katalog_model');
    }

    /**
     * Fungsi index untuk memuat halaman beranda.
     */
	public function index()
	{
        // Menyiapkan data yang akan dikirim ke view
        $data = array(
            'title'=> 'JeWePe Wedding Organizer', // Judul halaman
            'page'=> 'landing/beranda', // Halaman yang akan dimuat
            'getDataWeb' => $this->settings_model->getSettings('1')->row(), // Mengambil data pengaturan website dari model settings_model
            'getAllKatalog' => $this->katalog_model->get_all_katalog_landing()->result() // Mengambil semua katalog dari model katalog_model
        );

        // Memuat view dengan template 'landing/templetes/sites' dan data yang telah disiapkan
		$this->load->view('landing/templetes/sites', $data);
	}
}
?>
