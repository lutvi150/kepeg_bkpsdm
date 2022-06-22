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
        $data['pegawai'] = $this->model->pagination_total_rows('tb_pegawai');
        $this->menu('admin/dashboard', $data);
        // echo json_encode($data);

    }
    public function pegawai(Type $var = null)
    {
        $data['title'] = 'Data Pegawai';
        $this->menu('admin/pegawai', $data);
        // echo json_encode($data);
    }
    public function tambah_pegawai(Type $var = null)
    {
        $data['title'] = 'Tambah Data Pegawai';
        $this->menu('admin/tambah_pegawai', $data);
    }
    public function store_data_pegawai(Type $var = null)
    {
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required|alpha_numeric_spaces', [
            'required' => 'Nama Pegawai tidak boleh kosong',
            'alpha_numeric_spaces' => 'Nama Pegawai hanya boleh huruf dan angka',
        ]);
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|min_length[18]|max_length[18]|numeric', [
            'required' => 'NIP tidak boleh kosong',
            'min_length' => 'NIP harus 18 digit',
        ]);
        $this->form_validation->set_rules('gol', 'Golongan', 'trim|required', [
            'required' => 'Golongan tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('tmt_gol', 'TMT Golongan', 'trim|required|date', [
            'required' => 'TMT Golongan tidak boleh kosong',
            'date' => 'Format tanggal tidak benar',
        ]);
        $this->form_validation->set_rules('kgb_tmt', 'KGB TMR', 'trim|required|date', [
            'required' => 'KGB TMR tidak boleh kosong',
            'date' => 'Format tanggal tidak benar',
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', [
            'required' => 'Jabatan tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('tmt_jabatan', 'TMT Jabatan', 'trim|required|date', [
            'required' => 'TMT Jabatan tidak boleh kosong',
            'date' => 'Format tanggal tidak benar',
        ]);
        $this->form_validation->set_rules('jenjang_pendidikan', 'Jenjang Pendidikan', 'trim|required', [
            'required' => 'Jenjang Pendidikan tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required', [
            'required' => 'Jenis Kelamin tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required', [
            'required' => 'Agama tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('eselon_non_eselon', 'Eselon & Non Eselon', 'trim|required', [
            'required' => 'Eselon & Non Eselon tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('perangkat_daerah', 'Perangkat Daerah', 'trim|required', [
            'required' => 'Perangkat Daerah tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('unit_kerja', 'Unit Kerja', 'trim|required', [
            'required' => 'Unit Kerja tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == false) {
            $respon = [
                'status' => 'validation_failed',
                'msg' => $this->form_validation->error_array(),
            ];
        } else {
            $nip = $this->input->post('nip');
            $checkNip = $this->model->findData('tb_pegawai', 'nip', $nip)->row();
            if ($checkNip == null) {
                $data = [
                    'nama_pegawai' => strtoupper($this->input->post('nama_pegawai')),
                    'nip' => $nip,
                    'gol' => $this->input->post('gol'),
                    'tmt_gol' => $this->input->post('tmt_gol'),
                    'kgb_tmt' => $this->input->post('kgb_tmt'),
                    'jabatan' => $this->input->post('jabatan'),
                    'tmt_jabatan' => $this->input->post('tmt_jabatan'),
                    'jenjang_pendidikan' => $this->input->post('jenjang_pendidikan'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'agama' => $this->input->post('agama'),
                    'eseon_non_eselon' => $this->input->post('eseon_non_eselon'),
                    'perangkat_daerah' => $this->input->post('perangkat_daerah'),
                    'unit_kerja' => $this->input->post('unit_kerja'),
                    'source' => 'manual',
                    'created_at' => date('Y-m-d H:i:s'),
                ];
                $respon = [
                    'status' => 'success',
                    'msg' => 'Data berhasil ditambahkan',
                    'data' => $data,
                ];
            } else {
                $respon = [
                    'status' => 'failed',
                    'msg' => 'NIP sudah ada',

                ];
            }

        }
        echo json_encode($respon);

    }
    public function supportData(Type $var = null)
    {
        $jenis_kelamin = [
            [
                'id' => 'LK',
                'name' => 'Laki-laki',
            ], [
                'id' => 'PR',
                'name' => 'Perempuan',
            ],
        ];
        $agama = [
            [
                'id' => 'ISLAM',
                'name' => 'Islam',
            ], [
                'id' => 'KRISTEN',
                'name' => 'Kristen',
            ], [
                'id' => 'KATOLIK',
                'name' => 'Katolik',
            ], [
                'id' => 'HINDU',
                'name' => 'Hindu',
            ], [
                'id' => 'BUDHA',
                'name' => 'Budha',
            ],
        ];
        // golongan
        $golongan = [
            [
                'id' => 'I/a',
                'name' => 'I/a',
            ], [
                'id' => 'I/b',
                'name' => 'I/b',
            ], [
                'id' => 'I/c',
                'name' => 'I/c',
            ], [
                'id' => 'I/d',
                'name' => 'I/d',
            ], [
                'id' => 'I/e',
                'name' => 'I/e',
            ], [
                'id' => 'II/a',
                'name' => 'II/a',
            ], [
                'id' => 'II/b',
                'name' => 'II/b',
            ], [
                'id' => 'II/c',
                'name' => 'II/c',
            ], [
                'id' => 'II/d',
                'name' => 'II/d',
            ], [
                'id' => 'II/e',
                'name' => 'II/e',
            ], [
                'id' => 'III/a',
                'name' => 'III/a',
            ], [
                'id' => 'III/b',
                'name' => 'III/b',
            ], [
                'id' => 'III/c',
                'name' => 'III/c',
            ], [
                'id' => 'III/d',
                'name' => 'III/d',
            ], [
                'id' => 'III/e',
                'name' => 'III/e',
            ], [
                'id' => 'IV/a',
                'name' => 'IV/a',
            ], [
                'id' => 'IV/b',
                'name' => 'IV/b',
            ], [
                'id' => 'IV/c',
                'name' => 'IV/c',
            ], [
                'id' => 'IV/d',
                'name' => 'IV/d',
            ],
        ];
        $jabatan = [
            [
                'id' => 1,
                'name' => 'Kepala Bidang',
            ],
        ];
        $eselon = [
            [
                'id' => '1',
                'name' => 'Eselon I',
            ],
        ];
        $perangkat_daerah = [
            [
                'id' => '1',
                'name' => 'Perangkat Daerah',
            ],
        ];
        $unit_kerja = [
            [
                'id' => '1',
                'name' => 'Unit Kerja',
            ],
        ];
        $jenjang_pendidikan = [
            [
                'id' => '1',
                'name' => 'SMA',
            ],
            [
                'id' => '2',
                'name' => 'D3',
            ],
            [
                'id' => '3',
                'name' => 'S1',
            ],
            [
                'id' => '4',
                'name' => 'S2',
            ],
        ];
        $result = [
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'golongan' => $golongan,
            'jabatan' => $jabatan,
            'eselon' => $eselon,
            'perangkat_daerah' => $perangkat_daerah,
            'unit_kerja' => $unit_kerja,
            'jenjang_pendidikan' => $jenjang_pendidikan,
        ];
        echo json_encode($result);
    }
    public function pagination_pegawai()
    {
        $json = array();

        $this->load->library('pagination');

        $config['base_url'] = base_url('admin/pagination');
        $config['total_rows'] = $this->model->pagination_total_rows('tb_pegawai');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config["use_page_numbers"] = true;
        $config['num_links'] = "16";
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $this->pagination->initialize($config);

        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config["per_page"];

        $json = [
            'pagination_links' => $this->pagination->create_links(),
            'pagination_results' => $this->model->pagination_data($config["per_page"], $start, 'tb_pegawai'),
        ];
        echo json_encode($json);
    }

}

/* End of file  Admin.php */
