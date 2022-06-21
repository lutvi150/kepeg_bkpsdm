<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MakeCard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'model');
        $this->load->library('pdf');
    }
    public function index(Type $var = null)
    {
        $user = $this->model->getUser($this->session->userdata('id_user'));
        $pdf = new FPDF('p', 'mm', [60, 91]); //Ukuran kertas
        //Membuat halaman baru
        $pdf->AddPage();
        //seting jenis font yang di gunakan
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(20, 8, $pdf->image(base_url() . 'assets/images/id_card.png', -59, -10, 162), 0, 1, 'C');
        $pdf->Cell(11, 3, '', 0, 0, 'C');
        $pdf->Cell(20, 7, $pdf->image(base_url() . 'uploads/' . $user->foto, $pdf->GetX(), $pdf->GetY(), 17), 0, 1, 'C');
        $pdf->Cell(20, 20, '', 0, 1, 'C');
        $pdf->Cell(11, 3, '', 0, 0, 'C');
        $pdf->SetFont('Arial', 'BU', 10);
        $pdf->Cell(16, 3, strtoupper($user->nama), 0, 1, 'C');
        //mencetak setting
        // $pdf->Cell(240, 6, 'RUMAH KEMASAN', 0, 1, 'C');
        // $pdf->SetFont('Arial', 'B', 15);
        // //mencetak setting
        // $pdf->Cell(320, 6, 'DATA BARANG YANG TERDAFTAR PADA SISTEM', 0, 1, 'C');
        // $pdf->SetFont('Arial', '', 12);
        // $pdf->Cell(320, 5, 'Lima Kaum, Kabupaten Tanah Datar Sumatra Barat', 0, 1, 'C');
        // $pdf->Cell(320, 5, 'Telp. 0752-82077, Fax.0752-82803; e-mail; cs@rumahkemasan.com', 0, 1, 'C');
        // $pdf->Cell(320, 5, 'webesite: www.RumahKemasan.com', 0, 1, 'C');
        // $pdf->Cell(340, 1, '', ':', 0, 1, 'C');
        // $pdf->Cell(300, 5, '', 0, 1, 'C');
        // //Membri spasi kEBawah

        // $pdf->SetFont('Arial', 'BU', 12);
        // $pdf->SetFont('Arial', 'B', 8);
        // $pdf->Cell(7, 10, 'No', 1, 0, 'C');
        // $pdf->Cell(47, 10, 'Nama Barang ', 1, 0, 'C');
        // $pdf->Cell(50, 10, 'Jenis', 1, 0, 'C');
        // $pdf->Cell(30, 10, 'Satuan', 1, 0, 'C');
        // $pdf->Cell(30, 10, 'Harga', 1, 0, 'C');
        // $pdf->Cell(30, 10, 'Desain Kemasan', 1, 0, 'C');
        // $pdf->Cell(145, 10, 'Detail', 1, 1, 'C');

        // $pdf->SetFont('Arial', '', 8);

        // $no = 1;
        // $no2 = 1;

        // $pdf->cell(280, 10, '', 0, 0);
        // $pdf->Cell(0, 4, 'Batusangkar,' . date('d M Y'), 0, 1);
        // $pdf->cell(280, 4, '', 0, 0);
        // $pdf->Cell(0, 4, 'Direktur Rumah Kemasan', 0, 1);
        // $pdf->cell(256, 6, '', 0, 0);
        // $pdf->Cell(0, 6, ' ', 0, 1);
        // $pdf->ln(20);
        // $pdf->SetFont('Arial', 'BU', 8);
        // $pdf->cell(280, 6, '', 0, 0);
        // $pdf->Cell(0, 6, 'Fadjar, A.Md', 0, 1);
        // $pdf->SetFont('Arial', 'B', 12);
        // $pdf->SetFont('Arial', 'B', 12);
        // $pdf->cell(256, 2, '', 0, 0);
        // $pdf->Cell(0, 1, '', 0, 1);

        // $pdf->SetFont('Arial', 'B', 10);
        // $pdf->SetY(270);
        // $pdf->Cell(0, 9, 'Halaman ' . $pdf->PageNo(), 0, 1, 'R');

        $pdf->Output();
    }
    public function move()
    {
        $data['user'] = $this->model->getUser($this->session->userdata('id_user'));
        if ($data['user']->foto == null) {
            $this->session->set_flashdata('error', 'Tidak bisa cetak, karena foto profil belum di upload');
            redirect('user/profil');

        } else {
            $mpdf = new \Mpdf\Mpdf(['format' => 'B']);
            $mpdf->AddPage('P');
            $cetak = $this->load->view('report/idCard', $data, true);
            $mpdf->WriteHTML($cetak);
            $mpdf->Output();
            // $this->load->view('report/idCard', $data, false);

        }

    }

}

/* End of file  MakeCard.php */
