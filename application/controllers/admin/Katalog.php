<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{
    // Konstruktor untuk inisialisasi
    public function __construct()
    {
        parent::__construct();
        
        // Mengecek apakah pengguna sudah login atau belum
        if (empty($this->session->userdata('username'))) {
            // Mengatur pesan flash untuk user yang belum login
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><strong>Upss </strong> Anda tidak memiliki akses admin, Login dulu!</div>');
            // Redirect ke halaman login
            redirect('login');
        }
        // Memuat model katalog
        $this->load->model('katalog_model');
    }

    // Fungsi untuk menampilkan halaman utama katalog
    public function index()
    {
        $data = array(
            'title' => 'JeWePe Wedding Organizer', // Judul halaman
            'page' => 'admin/katalog', // Halaman yang akan ditampilkan
            'getAllKatalog' => $this->katalog_model->get_all_katalog()->result() // Mengambil semua data katalog
        );

        // Memuat view dengan template utama
        $this->load->view('admin/templete/main', $data);
    }

    // Fungsi untuk menampilkan halaman tambah katalog
    public function add()
    {
        $data = array(
            'title' => 'JeWePe Wedding Organizer', // Judul halaman
            'page' => 'admin/add_katalog', // Halaman yang akan ditampilkan
        );

        // Memuat view dengan template utama
        $this->load->view('admin/templete/main', $data);
    }

    // Fungsi untuk menampilkan halaman edit katalog
    public function edit()
    {
        if ($this->input->get('id')) {
            // Mengecek apakah data dengan ID tersebut ada
            $cek_data = $this->katalog_model->get_katalog_by_id($this->input->get('id'))->num_rows();

            if ($cek_data) {
                $data = array(
                    'title' => 'JeWePe Wedding Organizer', // Judul halaman
                    'page' => 'admin/edit_katalog', // Halaman yang akan ditampilkan
                    'katalog' => $this->katalog_model->get_katalog_by_id($this->input->get('id'))->row() // Mengambil data katalog berdasarkan ID
                );
                // Memuat view dengan template utama
                $this->load->view('admin/templete/main', $data);
            } else {
                // Mengatur pesan flash jika data tidak ada
                $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissble fade show" role="alert"><strong>Upss </strong>Data tidak ada<i class="remove ti-close" data-dismiss="alert"></i></div>');
                // Redirect ke halaman katalog
                redirect('admin/Katalog');
            }
        } else {
            // Redirect ke halaman katalog jika tidak ada ID yang diberikan
            redirect('admin/Katalog');
        }
    }

    // Fungsi untuk menambah data katalog
    public function addData()
    {
        if ($this->input->post()) {
            $post = $this->input->post();

            $datetime = date("Y-m-d H:i:s"); // Waktu saat ini
            $filename = date('Ymd') . '_' . rand(); // Nama file yang unik

            $data = array(
                'package_name' => $post['package_name'],
                'description' => $post['description'],
                'price' => $post['price'],
                'status_publish' => $post['status_publish'],
                'user_id' => $this->session->userdata('user_id'),
                'created_at' => $datetime,
            );

            if (!empty($_FILES['image']['name'])) {
                $upload = $this->_do_upload($filename);
                if ($upload) {
                    $data['image'] = $upload;
                }
            }
            $insert = $this->katalog_model->insert($data);

            if ($insert) {
                // Mengatur pesan flash jika berhasil menyimpan data
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissble fade show" role="alert"><strong>Success </strong>Data Berhasil di Simpan <i class="remove ti-close" data-dismiss="alert"></i></div>');
                // Redirect ke halaman katalog
                redirect('admin/Katalog');
            } else {
                // Mengatur pesan flash jika gagal menyimpan data
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissble fade show" role="alert"><strong>Gagal </strong>Data tidak tersimpan<i class="remove ti-close" data-dismiss="alert"></i></div>');
                // Redirect ke halaman katalog
                redirect('admin/Katalog');
            }
        } else {
            // Redirect ke halaman katalog jika tidak ada post data
            redirect('admin/Katalog');
        }
    }

    // Fungsi untuk mengupdate data katalog
    public function updateData()
    {
        if ($this->input->post()) {
            $post = $this->input->post();
            $id = $post['id'];
            $cek_data = $this->katalog_model->get_katalog_by_id($id)->num_rows();
            if ($cek_data) {
                $getKatalog = $this->katalog_model->get_katalog_by_id($id)->row();
                $datetime = date("Y-m-d H:i:s"); // Waktu saat ini
                $filename = date('Ymd') . '_' . rand(); // Nama file yang unik

                $data = array(
                    'package_name' => $post['package_name'],
                    'description' => $post['description'],
                    'price' => $post['price'],
                    'status_publish' => $post['status_publish'],
                    'user_id' => $this->session->userdata('user_id'),
                    'updated_at' => $datetime,
                );

                if (!empty($_FILES['image']['name'])) {
                    if (file_exists('./assets/files/katalog/' . $getKatalog->image) && $getKatalog->image) {
                        unlink('./assets/files/katalog/' . $getKatalog->image); // Menghapus file gambar lama
                    }
                    $upload = $this->_do_upload($filename);
                    if ($upload) {
                        $data['image'] = $upload;
                    }
                }

                $update = $this->katalog_model->update($id, $data);
                if ($update) {
                    // Mengatur pesan flash jika berhasil mengupdate data
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success </strong>Data berhasil di Update<i class="remove ti-close" data-dismiss="alert"></i></div>');
                    // Redirect ke halaman katalog
                    redirect('admin/Katalog');
                } else {
                    // Mengatur pesan flash jika gagal mengupdate data
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Maaf </strong>Data gagal diUpdate<i class="remove ti-close" data-dismiss="alert"></i></div>');
                    // Redirect ke halaman katalog
                    redirect('admin/Katalog');
                }
            }
        } else {
            // Redirect ke halaman katalog jika tidak ada post data
            redirect('admin/Katalog');
        }
    }

    // Fungsi untuk menghapus data katalog
    public function delete()
    {
        $id = $this->input->get('id', true);
        if (!empty($id)) {
            $Katalog = $this->katalog_model->get_katalog_by_id($id)->row();
            if ($Katalog && file_exists('./assets/files/katalog/' . $Katalog->image) && $Katalog->image) {
                unlink('./assets/files/katalog/' . $Katalog->image); // Menghapus file gambar
            }
            $delete = $this->katalog_model->delete_by_id($id);

            if ($delete) {
                // Mengatur pesan flash jika berhasil menghapus data
                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Success </strong>Data berhasil dihapus<i class="remove ti-close" data-dismiss="alert"></i></div>');
                // Redirect ke halaman katalog
                redirect('admin/Katalog');
            } else {
                // Mengatur pesan flash jika gagal menghapus data
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Maaf </strong>Data gagal dihapus<i class="remove ti-close" data-dismiss="alert"></i></div>');
                // Redirect ke halaman katalog
                redirect('admin/Katalog');
            }
        } else {
            // Redirect ke halaman katalog jika tidak ada ID yang diberikan
            redirect('admin/Katalog');
        }
    }

    // Fungsi untuk mengupload file gambar
    private function _do_upload($filename)
    {
        $config['file_name'] = $filename; // Nama file
        $config['upload_path'] = './assets/files/katalog/'; // Path untuk upload
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Jenis file yang diizinkan
        $config['max_size'] = 5000; // Ukuran maksimal file
        $config['max_size'] = 5000; // Ukuran maksimal file dalam kilobyte (5 MB)
        $config['create_thumb'] = false; // Tidak membuat thumbnail
        $config['quality'] = '90%'; // Kualitas gambar

        // Memuat library upload dengan konfigurasi yang sudah ditentukan
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // Proses upload dan validasi
        if (!$this->upload->do_upload('image')) {
            $data['inputerror'][] = 'image'; // Mengatur error input
            $data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); // Menampilkan error
            $data['status'] = false;
            echo json_encode($data);
            exit(); // Menghentikan eksekusi jika ada error
        }

        return $this->upload->data('file_name'); // Mengembalikan nama file yang sudah diupload
    }
}
?>

