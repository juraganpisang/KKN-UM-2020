<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendataan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('id')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda harus login terlebih dahulu. </div>');
            redirect('auth');
        }
    }

    public function input_data()
    {
        $data['title'] = "INPUT DATA PENDUDUK";

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('pendataan/input_data', $data);
        $this->load->view('templates/footer_page');
    }

    public function do_tambah()
    {
        //kk
        $config = array();
        $file_KK = $_FILES['foto_kk']['name'];
        if ($file_KK) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|dot|txt';
            $config['max_size']      = '5120';
            $config['upload_path'] = './assets/file/fotoKK/';
            $config['file_name'] = 'KK' . $this->input->post('noKK') . '_' . time() . '_' . date("Y-m-d");

            $this->load->library('upload', $config, 'kkUpload');
            $this->kkUpload->initialize($config);
            $upload_kk = $this->kkUpload->do_upload('foto_kk');

            if ($upload_kk) {
                $fotoKK = $this->kkUpload->data('file_name');
            } else {
                $fotoKK = "";
            }
        } else {
            $fotoKK = "";
        }

        //diset null upload nya
        $config = array();

        $data = [
            'no_kk' => $this->input->post('noKK'),
            'foto_kk' => $fotoKK,
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
        ];

        // var_dump($data);
        $this->pendataan_model->createKK($data);

        // MEMASUKKAN KE TABEL ANGGOTA KELUARGA
        $nik = $this->input->post('nik');

        for ($x = 0; $x < sizeof($nik); $x++) {
            //kk
            $config = array();
            $file_penghasilan = $_FILES['fotoPenghasilan' . $x]['name'];
            if ($file_penghasilan) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|dot|txt';
                $config['max_size']      = '5120';
                $config['upload_path'] = './assets/file/fotoPenghasilan/';
                $config['file_name'] = 'Penghasilan' . $this->input->post('nik')[$x] . '_' . time() . '_' . date("Y-m-d");

                $this->load->library('upload', $config, 'penghasilanUpload');
                $this->penghasilanUpload->initialize($config);
                $upload_penghasilan = $this->penghasilanUpload->do_upload('fotoPenghasilan' . $x);

                if ($upload_penghasilan) {
                    $fotoPenghasilan[$x] = $this->penghasilanUpload->data('file_name');
                } else {
                    $fotoPenghasilan[$x] = "";
                }
            } else {
                $fotoPenghasilan[$x] = "";
            }

            $data = [
                'nik' => $nik[$x],
                'nama' => $this->input->post('nama')[$x],
                'umur' => $this->input->post('umur')[$x],
                'tempat_lahir' => $this->input->post('tempatLahir')[$x],
                'tanggal_lahir' => $this->input->post('tanggalLahir')[$x],
                'jenkel' => $this->input->post('jenkel' . $x),
                'agama' => $this->input->post('agama')[$x],
                'pendidikan' => $this->input->post('pendidikan')[$x],
                'status_kawin' => $this->input->post('status_kawin')[$x],
                'pekerjaan' => $this->input->post('pekerjaan')[$x],
                'penghasilan' => $this->input->post('penghasilan')[$x],
                'foto_penghasilan' => $fotoPenghasilan[$x],
                'noKK' => $this->input->post('noKK')
            ];

            // var_dump($data);
            $this->pendataan_model->createAnggota($data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Tambah Data Berhasil. </div>');

        redirect('pendataan/input_data');
    }

    public function edit_data($kk)
    {
        $data['title'] = "EDIT DATA PENDUDUK";
        $data['kk'] = $this->pendataan_model->getUserKK($kk);
        $data['anggota'] = $this->pendataan_model->getAnggotaKK($kk);

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('pendataan/edit_data', $data);
        $this->load->view('templates/footer_page');
    }

    public function do_edit($kk)
    {
        $data['kk'] = $this->pendataan_model->getUserKK($kk);

        //kk
        $config = array();
        $file_KK = $_FILES['foto_kk']['name'];

        if ($file_KK) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|dot|txt';
            $config['max_size']      = '5120';
            $config['upload_path'] = './assets/file/fotoKK/';
            $config['file_name'] = 'KK' . $this->input->post('noKK') . '_' . time() . '_' . date("Y-m-d");

            $this->load->library('upload', $config, 'kkUpload');
            $this->kkUpload->initialize($config);
            $upload_kk = $this->kkUpload->do_upload('foto_kk');

            if ($upload_kk) {
                $fotoKK = $this->kkUpload->data('file_name');
            } else {
                $fotoKK = $data['kk']['foto_kk'];
            }
        } else {
            $fotoKK = $data['kk']['foto_kk'];
        }

        //setelah upload dihapus
        $this->pendataan_model->deleteKK($kk);

        //diset null upload nya
        $config = array();

        $data = [
            'no_kk' => $this->input->post('noKK'),
            'foto_kk' => $fotoKK,
            'alamat' => $this->input->post('alamat'),
            'desa' => $this->input->post('desa'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
        ];

        //dihapus dulu bos
        $this->pendataan_model->deleteKK($kk);

        // var_dump($data);
        $this->pendataan_model->createKK($data);

        // MEMASUKKAN KE TABEL ANGGOTA KELUARGA
        $nik = $this->input->post('nik');

        echo sizeof($nik);
        for ($x = 0; $x < sizeof($nik); $x++) {
            $data['nik'] = $this->pendataan_model->getUserAnggota($nik[$x]);
            //kk
            $config = array();
            $file_penghasilan = $_FILES['fotoPenghasilan' . $x]['name'];
            if ($file_penghasilan) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|dot|txt';
                $config['max_size']      = '5120';
                $config['upload_path'] = './assets/file/fotoPenghasilan/';
                $config['file_name'] = 'Penghasilan' . $this->input->post('nik')[$x] . '_' . time() . '_' . date("Y-m-d");

                $this->load->library('upload', $config, 'penghasilanUpload');
                $this->penghasilanUpload->initialize($config);
                $upload_penghasilan = $this->penghasilanUpload->do_upload('fotoPenghasilan' . $x);

                if ($upload_penghasilan) {
                    $fotoPenghasilan[$x] = $this->penghasilanUpload->data('file_name');
                } else {
                    $fotoPenghasilan[$x] = $data['nik']['foto_penghasilan'];
                }
            } else {
                $fotoPenghasilan[$x]  = $data['nik']['foto_penghasilan'];
            }

            $data = [
                'nik' => $nik[$x],
                'nama' => $this->input->post('nama')[$x],
                'umur' => $this->input->post('umur')[$x],
                'tempat_lahir' => $this->input->post('tempatLahir')[$x],
                'tanggal_lahir' => $this->input->post('tanggalLahir')[$x],
                'jenkel' => $this->input->post('jenkel' . $x),
                'agama' => $this->input->post('agama')[$x],
                'pendidikan' => $this->input->post('pendidikan')[$x],
                'status_kawin' => $this->input->post('status_kawin')[$x],
                'pekerjaan' => $this->input->post('pekerjaan')[$x],
                'penghasilan' => $this->input->post('penghasilan')[$x],
                'foto_penghasilan' => $fotoPenghasilan[$x],
                'noKK' => $this->input->post('noKK')
            ];

            //setelah data disimpan, lalu dihapus
            $this->pendataan_model->deleteAnggota($nik[$x]);

            // var_dump($data);
            //dimasukkan
            $this->pendataan_model->createAnggota($data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Edit Data Berhasil. </div>');

        redirect('pendataan/manajemen_data');
    }

    public function manajemen_data()
    {
        $data['title'] = "MANAJEMEN DATA PENDUDUK";
        $data['kepala'] = $this->pendataan_model->getAllKK();

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('pendataan/manajemen_data', $data);
        $this->load->view('templates/footer_page');
    }

    public function hapusData($no_kk)
    {

        $data['kk'] = $this->pendataan_model->getUserKK($no_kk);

        $this->pendataan_model->deleteAnggotaKK($data['kk']['no_kk']);
        $this->pendataan_model->deleteKK($no_kk);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Hapus Data Berhasil. </div>');

        redirect('pendataan/manajemen_data');
    }

    public function cetakData($no_kk)
    {
        $data['kpl'] = $this->pendataan_model->getUserKK($no_kk);
        $data['detail'] = $this->pendataan_model->getAnggotaKK($no_kk);

        $this->load->view('templates/header_page');
        $this->load->view('pendataan/cetak_data', $data);
        $this->load->view('templates/footer_page');
    }
}
