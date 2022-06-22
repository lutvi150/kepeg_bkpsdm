<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PgJabatan extends CI_Model
{

    public $table = 'tb_jabatan';
    public $column_order = [null, 'nama_jabatan', 'kuata', 'terisi', 'sisa'];
    public $column_search = ['nama_jabatan', 'kuata', 'terisi', 'sisa'];
    public $order = array('id_jabatan' => 'asc');
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }

            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function countKuataJabatan(Type $var = null)
    {
        $this->db->from($this->table);
        $this->db->select_sum('kuata');
        return $this->db->get()->row();

    }
}

/* End of file PgJabatan.php */
