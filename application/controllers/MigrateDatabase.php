<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MigrateDatabase extends CI_Controller
{

    public function index()
    {
        $start = microtime(true);
        $data_1 = $this->db->from('dumy')->get()->result();
        foreach ($data_1 as $key => $value) {
            $result[] = [
                'nama_pegawai' => $value->nama2,
                'nip' => $value->nip,
                'gol' => $value->gol,
                'tmt_gol' => $value->tmt_gol,
                'kgb_tmt' => $value->kgb_tmt,
                'nama_jabatan' => $value->nama_jabatan,
                'tmt_jabatan' => $value->tmt_jabatan,
                'jenjang_pendidikan' => $value->jenjang_pendidikan,
                'jenis_kelamin' => $value->jenis_kelamin,
                'agama' => $value->agama,
                'eselon_non_eselon' => $value->eselon_non_eselon,
                'perangkat_daerah' => $value->perangkat_daerah,
                'unit_kerja' => $value->unit_kerja,
                'source' => 'import',
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->truncate('tb_pegawai');
        $this->db->insert_batch('tb_pegawai', $result);
        echo json_encode($respon = [
            'time_execute' => microtime(true) - $start,
            'data' => $result,
        ]);

    }

}

/* End of file  MigrateDatabase.php */
