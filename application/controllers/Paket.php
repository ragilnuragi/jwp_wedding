<?php
// Melarang akses langsung ke file ini
defined('BASEPATH') OR exit('No direct script access allowed');

// Definisi kelas Paket yang meng-extend CI_Controller
class Paket extends CI_Controller {
    
    // Konstruktor kelas Paket
    public function __construct()
    {
        parent::__construct();
        // Memuat database dan model yang diperlukan
        $this->load->database();
        $this->load->model('settings_model');
        $this->load->model('pesanan_model');
        $this->load->model('katalog_model');
    }

    // Metode untuk menampilkan halaman index/paket
    public function index()
    {
        // Mengatur data yang akan dikirim ke view
        $data = array(
            'title'=> 'JeWePe Wedding Organizer',
            'page'=> 'landing/paket',
            'getDataWeb' => $this->settings_model->getSettings('1')->row(),
            'getAllKatalog' => $this->katalog_model->get_all_katalog_landing()->result()
        );

        // Memuat view dengan data yang telah disiapkan
        $this->load->view('landing/templetes/sites', $data);
    }

    // Metode untuk menampilkan detail katalog
    public function detail()
    {
        // Mengecek apakah ada parameter 'id' di URL
        if ($this->input->get('id')) {
            $catalogue_id = $this->input->get('id');
            // Mengecek apakah data katalog dengan ID tersebut ada
            $cek_data = $this->katalog_model->get_katalog_by_id($catalogue_id)->num_rows();

            if ($cek_data > 0) {
                // Mengatur data yang akan dikirim ke view
                $data = array(
                    'title' => 'JeWePe Wedding Organizer',
                    'page' => 'landing/detail',
                    'getDataWeb' => $this->settings_model->getSettings('1')->row(),
                    'katalog' => $this->katalog_model->get_katalog_by_id($catalogue_id)->row()
                );
                // Memuat view dengan data yang telah disiapkan
                $this->load->view('landing/templetes/sites', $data);
            } else {
                // Redirect ke halaman utama jika data tidak ditemukan
                redirect('/');
            }
        } else {
            // Redirect ke halaman utama jika tidak ada parameter 'id' di URL
            redirect('/');
        }
    }

    // Metode untuk menangani pemesanan paket
    public function pesan()
    {
        // Mengecek apakah ada data POST
        if ($this->input->post()) {
            $post = $this->input->post();
            // Mengecek apakah data pesanan sudah ada berdasarkan ID, email, dan tanggal pernikahan
            $cek_data = $this->pesanan_model->cek_data_pesanan($post['id'], $post['email'], $post['wedding_date'])->num_rows();

            if ($cek_data == 0) {
                $datetime = date("Y-m-d H:i:s");

                // Menyiapkan data yang akan dimasukkan ke dalam database
                $data = array(
                    'catalogue_id' => $post['id'],
                    'name' => $post['name'],
                    'email' => $post['email'],
                    'phone_number' => $post['phone_number'],
                    'address' => $post['address'],
                    'wedding_date' => $post['wedding_date'],
                    'status' => 'requested',
                    'created_at' => $datetime,
                );
                // Memasukkan data pesanan ke dalam database
                $insert = $this->pesanan_model->insert($data);

                if ($insert) {
                    // Menampilkan pesan sukses jika data berhasil dimasukkan
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success </strong>Terima kasih telah memesan paket ini. Silahkan tunggu konfirmasi lewat email.
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button></div>');
                    redirect('Paket/detail?id=' . $post['id']);
                } else {
                    // Menampilkan pesan gagal jika data tidak berhasil dimasukkan
                    $this->session->set_flashdata('message', 
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf </strong>Permintaan pesanan gagal.
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button></div>');
                    redirect('Paket/detail?id=' . $post['id']);
                }
            } else {
                // Menampilkan pesan bahwa paket dan tanggal pernikahan sudah ada sebelumnya
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Maaf </strong>Paket dan tanggal pernikahan sudah ada sebelumnya, silahkan tunggu konfirmasi dari kami.
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button></div>');
                redirect('Paket/detail?id=' . $post['id']);
            }
        } else {
            // Redirect ke halaman Paket jika tidak ada data POST
            redirect('Paket');
        }
    }
}
?>
