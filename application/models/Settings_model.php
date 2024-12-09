<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
    public function __construct(){
        parent:: __construct();
        $this->load->database(); // Memuat library database CodeIgniter
    }

    /**
     * Mengambil pengaturan berdasarkan ID
     * @param int $id ID dari pengaturan yang ingin diambil
     * @return object Hasil query dari tabel tb_settings
     */
    public function getSettings($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get("tb_settings");
        return $query; // Mengembalikan objek hasil query
    }

    /**
     * Memperbarui pengaturan berdasarkan ID
     * @param int $id ID dari pengaturan yang ingin diperbarui
     * @param array $data Data baru yang akan diperbarui
     * @return bool Status keberhasilan pembaruan
     */
    public function update($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('tb_settings',$data);
        return $query; // Mengembalikan status keberhasilan pembaruan
    }
}
