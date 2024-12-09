<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Katalog_model adalah model yang berhubungan dengan data katalog.
 * Model ini berisi fungsi-fungsi untuk melakukan operasi CRUD pada tabel 'tb_catalogue'.
 */
class Katalog_model extends CI_Model {
    
    /**
     * Constructor untuk Katalog_model.
     * Memanggil constructor dari parent class (CI_Model) dan memuat library database.
     */
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    /**
     * Mengambil semua data katalog beserta informasi pengguna (user) yang terkait.
     * Data diurutkan berdasarkan tanggal update secara descending.
     *
     * @return object Hasil dari query berupa objek hasil query.
     */
    public function get_all_katalog(){
        $this->db->select('*');
        $this->db->from('tb_catalogue tbc');
        $this->db->join('tb_users tbu', 'tbu.user_id = tbc.user_id');
        $this->db->order_by("tbc.updated_at", "DESC");
        $query = $this->db->get();
        return $query;
    }

    /**
     * Mengambil semua data katalog yang status publish-nya adalah 'publish'.
     * Data diurutkan berdasarkan tanggal update secara descending.
     *
     * @return object Hasil dari query berupa objek hasil query.
     */
    public function get_all_katalog_landing(){
        $this->db->select('*');
        $this->db->from('tb_catalogue tbc');
        $this->db->join('tb_users tbu', 'tbu.user_id = tbc.user_id');
        $this->db->where('tbc.status_publish', 'publish');
        $this->db->order_by("tbc.updated_at", "DESC");
        $query = $this->db->get();
        return $query;
    }

    /**
     * Mengambil data katalog berdasarkan ID katalog.
     *
     * @param int $id ID dari katalog yang ingin diambil.
     * @return object Hasil dari query berupa objek hasil query.
     */
    public function get_katalog_by_id($id){
        $this->db->select('*');
        $this->db->from('tb_catalogue tbc');
        $this->db->join('tb_users tbu', 'tbu.user_id = tbc.user_id');
        $this->db->where("tbc.catalogue_id", $id);
        $query = $this->db->get();
        return $query;
    }

    /**
     * Memasukkan data katalog baru ke dalam tabel 'tb_catalogue'.
     *
     * @param array $data Data katalog yang akan dimasukkan.
     * @return bool True jika insert berhasil, false jika gagal.
     */
    public function insert($data){
        return $this->db->insert('tb_catalogue', $data);
    }

    /**
     * Memperbarui data katalog berdasarkan ID katalog.
     *
     * @param int $id ID dari katalog yang akan diperbarui.
     * @param array $data Data yang akan diperbarui pada katalog tersebut.
     * @return bool True jika update berhasil, false jika gagal.
     */
    public function update($id, $data){
        $this->db->where('catalogue_id', $id);
        $query = $this->db->update('tb_catalogue', $data);
        return $query;
    }

    /**
     * Menghapus data katalog berdasarkan ID katalog.
     *
     * @param int $id ID dari katalog yang akan dihapus.
     * @return bool True jika delete berhasil, false jika gagal.
     */
    public function delete_by_id($id){
        $this->db->where('catalogue_id', $id);
        return $this->db->delete('tb_catalogue');
    }
}
