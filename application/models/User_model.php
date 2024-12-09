<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    // Konstruktor untuk menginisialisasi database
    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }

    // Fungsi untuk mendapatkan data pengguna berdasarkan username dengan query manual
    public function getUserByUsername1($username)
    {
        // Menggunakan query manual dengan parameter yang di-escape untuk mencegah SQL Injection
        $sql='select * from tb_users where username = ' . $this->db->escape($username);
        $query = $this->db->query($sql);
        return $query;
    }

    // Fungsi untuk mendapatkan data pengguna berdasarkan kondisi tertentu menggunakan Active Record
    public function getUserByUsername2($where)
    {
        // Menggunakan Active Record untuk memilih kolom tertentu dari tabel tb_users
        return $this->db->select('user_id, name, username, password, created_at, updated_at')
                        ->from('tb_users')
                        ->where($where)
                        ->get();
    }

    // Fungsi untuk mendapatkan data pengguna berdasarkan username menggunakan Active Record
    public function getUserByUsername3($username){
        // Menggunakan Active Record untuk memilih kolom tertentu dari tabel tb_users
        $this->db->select('user_id, username, password');
        // Penulisan where condition salah, seharusnya tanpa koma
        $this->db->where('username', $username);
        $query = $this->db->get("tb_users");
        return $query;
    }

    // Fungsi untuk mendapatkan semua data pengguna dari tabel tb_users
    public function getAllUser(){
        // Mengatur hasil query diurutkan berdasarkan user_id secara descending
        $this->db->order_by("user_id", "desc");
        $query = $this->db->get("tb_users");
        return $query;
    }
}
