<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MakeReport extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'model');
    }

    public function performaMitra()
    {
        $jenis_laporan = $this->input->post('jenis_laporan');
        $keriteria = $this->input->post('keriteria');
        if ($jenis_laporan == 1) {
            $data['mitra'] = $this->model->performaMitra();
            $data['title'] = 'Laporan Performa Mitra';
        } else {
            $data['mitra'] = $this->hitungKeriteria($keriteria);
            $data['title'] = 'Laporan Performa Mitra Berdasarkan Kriteria : ' . $this->checkKriteria($keriteria);
        }
        $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
        $mpdf->AddPage('P');
        $cetak = $this->load->view('report/performaMitra', $data, true);
        $mpdf->WriteHTML($cetak);
        $mpdf->Output();
        // echo json_encode($data);
    }
    public function checkKriteria($id_kriteria)
    {
        $keriteria = $this->keriteria();
        foreach ($keriteria as $key => $value) {
            if ($value['id_kriteria'] == $id_kriteria) {
                return $value['kriteria'];
            }
        }
    }
    public function keriteria(Type $var = null)
    {
        $kriteria = [
            [
                'id_kriteria' => 1,
                'kriteria' => 'Tata Bahasa',
                'bobot' => 10,
            ], [
                'id_kriteria' => 2,
                'kriteria' => 'Cara Berkomunikasi',
                'bobot' => 25,
            ], [
                'id_kriteria' => 3,
                'kriteria' => 'Kemampuan memberikan layanan',
                'bobot' => 10,
            ], [
                'id_kriteria' => 4,
                'kriteria' => 'Kesopanan',
                'bobot' => 15,
            ], [
                'id_kriteria' => 5,
                'kriteria' => 'Keramahan Mitra',
                'bobot' => 10,
            ], [
                'id_kriteria' => 6,
                'kriteria' => 'Cara Berpakaian',
                'bobot' => 10,
            ], [
                'id_kriteria' => 7,
                'kriteria' => 'Sikap',
                'bobot' => 20,
            ],
        ];
        return $kriteria;
    }
    public function hitungKeriteria($keriteria)
    {
        $data = $this->model->performaMitra();
        foreach ($data as $key => $value) {
            $result[] = (object) [
                'nama' => $value->nama,
                'email' => $value->email,
                'nomor_kontak' => $value->nomor_kontak,
                'score' => $this->hitungScoreKeriteria($value->id_user, $keriteria),
            ];
        }
        return $result;
    }
    public function hitungScoreKeriteria($id_mitra, $id_kriteria)
    {
        $score = $this->model->performaByKeriteria($id_mitra, $id_kriteria);
        $jumlah = 0;
        if (count($score) > 0) {
            foreach ($score as $key => $value) {
                $total[] = $value->score;
            }
            $jumlah = array_sum($total) / count($total);
        }
        return $jumlah;
    }

}

/* End of file  MakeReport.php */
