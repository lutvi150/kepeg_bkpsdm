<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'model');
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Akses dilarang');
            redirect('/');
        }
    }
    public function menu($link, $data)
    {
        $this->load->view('layout/header', $data, false);
        $this->load->view('layout/sidebar', $data, false);
        $this->load->view($link, $data, false);
        $this->load->view('layout/footer', $data, false);

    }
    public function settingCheck(Type $var = null)
    {
        // check sms
        $sms = $this->model->findData('setting', 'setting_name', 'wa')->row();
        if ($sms == null) {
            $this->model->storeData('setting', ['setting_name' => 'wa', 'setting_value' => '0']);
            $sms = $this->model->findData('setting', 'setting_name', 'wa')->row();

            $array = array(
                'wa' => $sms->setting_value,
            );
            $this->session->set_userdata($array);
        } else {
            $array = array(
                'wa' => $sms->setting_value,
            );
            $this->session->set_userdata($array);
        }
        //setting hitung
        $hitung = $this->model->findData('setting', 'setting_name', 'hitung')->row();
        if ($hitung == null) {
            $this->model->storeData('setting', ['setting_name' => 'hitung', 'setting_value' => '0']);
            $hitung = $this->model->findData('setting', 'setting_name', 'hitung')->row();

            $array = array(
                'hitung' => $hitung->setting_value,
            );
            $this->session->set_userdata($array);
        } else {
            $array = array(
                'hitung' => $hitung->setting_value,
            );
            $this->session->set_userdata($array);
        }

    }
    // setting
    public function setting(Type $var = null)
    {
        $data['title'] = 'Setting';
        $data['setting'] = $this->model->getData('setting');
        $this->menu('admin/setting', $data);
    }
    public function index()
    {

        $data['title'] = 'Dashboard';
        $this->menu('admin/dashboard', $data);
        // echo json_encode($data);

    }
    public function pegawai(Type $var = null)
    {
        $data['title'] = 'Data Pegawai';
        $data['pegawai'] = $this->model->getData('tb_pegawai');
        $this->menu('admin/pegawai', $data);
        // echo json_encode($data);
    }

}

/* End of file  Admin.php */
