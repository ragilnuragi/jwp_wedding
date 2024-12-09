<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Deklarasi kelas Settings yang merupakan turunan dari CI_Controller
class Settings extends CI_Controller
{
    // Konstruktor kelas Settings
    public function __construct()
    {
        parent::__construct();
        // Memeriksa apakah session 'username' kosong
        if (empty($this->session->userdata('username'))) {
            // Menampilkan pesan flash jika user tidak memiliki akses admin dan mengarahkan ke halaman login
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Upss </strong>
            Anda tidak memiliki akses admin, Login dulu!</div>');
            redirect('login');
        }
        // Memuat model 'settings_model'
        $this->load->model('settings_model');
    }

    // Fungsi untuk menampilkan halaman utama pengaturan
    public function index()
    {
        // Mendapatkan data pengaturan dengan ID '1'
        $data = array(
            'title' => 'JeWePe Wedding Organizer',
            'page' => 'admin/settings',
            'settings' => $this->settings_model->getSettings('1')->row()
        );

        // Memuat view 'admin/templete/main' dengan data yang sudah didapatkan
        $this->load->view('admin/templete/main', $data);
    }

    // Fungsi untuk memperbarui data pengaturan
    public function updateData()
    {
        $post = $this->input->post();

        // Memeriksa apakah terdapat data POST
        if ($post) {
            // Memeriksa apakah ID pengaturan ada
            $cek_id = $this->settings_model->getSettings($post['id'])->num_rows();
            if ($cek_id > 0) {
                $getSettings = $this->settings_model->getSettings($post['id'])->row();
                $filename = date('Ymd') . '_' . rand();
                $datetime = date("Y-m-d H:i:s");

                // Menyiapkan data yang akan diperbarui
                $data = array(
                    'website_name' => $post['website_name'],
                    'phone_number' => $post['phone_number'],
                    'email' => $post['email'],
                    'address' => $post['address'],
                    'maps' => $post['maps'],
                    'facebook_url' => $post['facebook_url'],
                    'instagram_url' => $post['instagram_url'],
                    'header_bussiness_hour' => $post['header_bussiness_hour'],
                    'time_bussiness_hour' => $post['time_bussiness_hour']
                );

                // Memperbarui data pengaturan
                $update = $this->settings_model->update($post['id'], $data);

                // Menampilkan pesan flash berdasarkan hasil update
                if ($update) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show"
                role="alert"><strong>Success </strong>Data berhasil di Update
                <i class="remove ti-close" data-dismiss="alert"></i></div>');
                    redirect('admin/Settings');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show"
                role="alert"><strong>Maaf </strong>Data gagal diUpdate
                <i class="remove ti-close" data-dismiss="alert"></i></div>');
                    redirect('admin/Settings');
                }
            } else {
                // Menampilkan pesan flash jika ID tidak ditemukan
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show"
                role="alert"><strong>Maaf </strong>ID tidak ditemukan
                <i class="remove ti-close" data-dismiss="alert"></i></div>');
                redirect('admin/Settings');
            }
        } else {
            redirect('admin/Settings');
        }
    }

}
?>


?>