<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ModelMigrate extends CI_Model
{

    public function getJabatan(Type $var = null)
    {
        $this->db->select('nama_jabatan');
        $this->db->distinct();
        $this->db->from('tb_pegawai');
        return $this->db->get()->result();
    }

}

/* End of file ModelMigrate.php */
