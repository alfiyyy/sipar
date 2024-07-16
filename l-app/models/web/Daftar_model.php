<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_model extends CI_Model {

    private $_table = 't_user';
    private $_table_peserta = 't_peserta';

    public function __construct()
    {
        parent::__construct();
    }

    public function insert(array $data)
    {
        // Encrypt the password before inserting it into the database
        // sudah di enkripsi di Dafta.php
        // $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        
        $query = $this->db->insert($this->_table, $data);
        
        if ($query == FALSE)
            return FALSE;
        else
            return TRUE;
    }

    public function insert_peserta(array $data)
    {
        $query = $this->db->insert($this->_table_peserta, $data);
        
        if ($query == FALSE)
            return FALSE;
        else
            return TRUE;
    }
}
