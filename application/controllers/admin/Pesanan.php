<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

    // Konstruktor untuk inisialisasi
    public function __construct()
    {
        parent::__construct();
        // Cek apakah pengguna sudah login, jika tidak arahkan ke halaman login
        if (empty($this->session->userdata('username'))) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Upss </strong> Anda tidak memiliki akses admin, Login dulu!</div>');
            redirect('login');
        }
        // Memuat model pesanan
        $this->load->model('pesanan_model');
    }

    // Metode untuk menampilkan halaman pesanan
    public function index()
    {
        // Mengumpulkan data yang akan dikirim ke tampilan
        $data = array(
            'title'=> 'JeWePe Wedding Organizer',
            'page'=> 'admin/pesanan',
            'getAllPesanan' => $this->pesanan_model->get_all_pesanan()->result(),
        );

        // Memuat tampilan utama dengan data yang sudah dikumpulkan
        $this->load->view('admin/templete/main', $data);
    }

    // Metode untuk memperbarui status pesanan
    public function updateStatus()
    {
        if ($this->input->get()) {
            $get = $this->input->get();

            if (isset($get['id'])) {
                // Cek apakah pesanan dengan ID yang diberikan ada
                $cek_data = $this->pesanan_model->get_pesanan_by_id($get['id'])->num_rows();
                if ($cek_data > 0) {
                    $datetime = date("Y-m-d H:i:s");

                    // Data yang akan diperbarui
                    $data = array(
                        'status' => $get['status'],
                        'user_id' => $this->session->userdata('user_id'),
                        'updated_at' => $datetime,
                    );

                    // Melakukan update pada pesanan
                    $update = $this->pesanan_model->update($get['id'], $data);
                    if ($update) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success </strong>Status berhasil di ganti<i class="remove ti-close" data-dismiss="alert"></i></div>');
                        redirect('admin/Pesanan');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf </strong>Status gagal di ganti<i class="remove ti-close" data-dismiss="alert"></i></div>');
                        redirect('admin/Pesanan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf </strong>Data pesanan tidak ditemukan<i class="remove ti-close" data-dismiss="alert"></i></div>');
                    redirect('admin/Pesanan');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf </strong>ID tidak ditemukan<i class="remove ti-close" data-dismiss="alert"></i></div>');
                redirect('admin/Pesanan');
            }
        } else {
            redirect('admin/Pesanan');
        }
    }

    // Metode untuk menghapus pesanan
    public function delete()
    {
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
            // Menghapus pesanan berdasarkan ID
            $delete = $this->pesanan_model->delete_by_id($id);
            if ($delete) {
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success </strong>Pesanan berhasil dihapus<i class="remove ti-close" data-dismiss="alert"></i></div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf </strong>Pesanan gagal dihapus<i class="remove ti-close" data-dismiss="alert"></i></div>');
            }
            redirect('admin/Pesanan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Maaf </strong>ID tidak ditemukan<i class="remove ti-close" data-dismiss="alert"></i></div>');
            redirect('admin/Pesanan');
        }
    }
}
?>
