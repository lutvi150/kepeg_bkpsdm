<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'model');

    }

    public function index()
    {
        if ($this->session->userdata('role') == 'admin') {
            redirect('admin');
        } else {
            $data['title'] = 'Login';
            $this->load->view('login', $data, false);
        }

    }
    public function auth(Type $var = null)
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $checkAccount = $this->model->authProcess($email, md5($password));
        if ($checkAccount == null) {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('/');
        } else {
            $session = [
                'role' => $checkAccount->role,
                'email' => $checkAccount->email,
                'id_user' => $checkAccount->id_user,
            ];

            $this->session->set_userdata($session);

            if ($checkAccount->role == 'admin') {
                redirect('admin');
            }
        }
        // echo json_encode([$username, $password]);
    }
    public function makeAdmin(Type $var = null)
    {
        $dataAdmin = $this->model->findData('tb_user', 'role', 'admin')->row();
        if ($dataAdmin !== null) {
            $this->model->deleteData('tb_user', 'role', 'admin');
            $insert = [
                'email' => 'admin@gmail.com',
                'password' => md5('admin'),
                'role' => 'admin',
            ];
            $processInsert = $this->model->insertData('tb_user', $insert);
        } else {
            // insert username
            $insert = [
                'email' => 'admin@gmail.com',
                'password' => 'admin',
                'role' => 'admin',
            ];
            $processInsert = $this->model->insertData('tb_user', $insert);
        }
        // $this->model->deleteData('tb_user','')
        echo json_encode($dataAdmin);
    }
    public function e_500(Type $var = null)
    {
        $data['title'] = '500';
        $this->load->view('error_page/e_500', $data, false);

    }
    public function logout(Type $var = null)
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}

/* End of file  Controller.php */
