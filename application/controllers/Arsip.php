<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "DASHBOARD";
        $data['username'] = "Minion";

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('arsip/index', $data);
        $this->load->view('templates/footer_page');
    }

    public function arsip_baru()
    {
        $data['title'] = "DASHBOARD";
        $data['username'] = "Minion";
        $data['jmlSM'] = $this->arsip_model->jmlSuratMasuk();
        $data['jmlSK'] = $this->arsip_model->jmlSuratKeluar();

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('arsip/arsip_baru', $data);
        $this->load->view('templates/footer_page');
    }

    public function tambah_arsip()
    {
        $status = $this->input->post('status');
        if ($status == '0') {
            $statusSurat = "arsipMasuk";
        } else {
            $statusSurat = "arsipKeluar";
        }

        echo $statusSurat;
        //surat
        $config = array();
        $file_surat = $_FILES['scanArsip']['name'];
        if ($file_surat) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|dot|txt';
            $config['max_size']      = '5120';
            $config['upload_path'] = './assets/file/scanArsip/';
            $config['file_name'] = $statusSurat . '_' . time() . '_' . date("Y-m-d") . '_' . htmlspecialchars($this->input->post('dariKepada'));

            $this->load->library('upload', $config, 'suratUpload');
            $this->suratUpload->initialize($config);
            $upload_surat = $this->suratUpload->do_upload('scanArsip');

            if ($upload_surat) {
                echo "berhasil";
                $surat = $this->suratUpload->data('file_name');
            } else {

                echo "gagal";
                $this->suratUpload->display_errors('<p>', '</p>');
                $surat = "";
            }
        } else {

            echo "gagal kw2";
            $this->suratUpload->display_errors('<p>', '</p>');
            $surat = "";
        }

        $data = [
            'dr_kpd' => $this->input->post('dariKepada'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'no_surat' => $this->input->post('noSurat'),
            'no_urut' => $this->input->post('noUrut'),
            'indeks' => $this->input->post('indeks'),
            'kode_surat' => $this->input->post('kodeSurat'),
            'tanggal_surat' => $this->input->post('tanggalSurat'),
            'tanggal_simpan' => $this->input->post('tanggalSimpan'),
            'perihal' => $this->input->post('perihal'),
            'jenis_surat' => $this->input->post('jenisSurat'),
            'b_s_sr' => $this->input->post('bssr'),
            'no_laci' => $this->input->post('noLaci'),
            'sistem_simpan' => $this->input->post('sistemSimpan'),
            'unit' => $this->input->post('unit'),
            'isi_ringkas' => $this->input->post('isiRingkas'),
            'scan_arsip' => $surat,
            'arsiparis' => $this->input->post('arsiparis')
        ];
        $this->arsip_model->tambahArsip($data);

        redirect('arsip/arsip_baru');
    }

    public function peminjaman()
    {
        $data['title'] = "DASHBOARD";
        $data['username'] = "Minion";
        $data['peminjam'] = $this->arsip_model->getPeminjam();

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('arsip/peminjaman', $data);
        $this->load->view('templates/footer_page');
    }


    public function manajemen_arsip()
    {
        $data['title'] = "DASHBOARD";
        $data['username'] = "Minion";
        $data['arsip'] = $this->arsip_model->getArsip();

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('arsip/manajemen_arsip', $data);
        $this->load->view('templates/footer_page');
    }

    public function percobaan()
    {
        $data['title'] = "DASHBOARD";
        $data['username'] = "Minion";

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('arsip/percobaan', $data);
        $this->load->view('templates/footer_page');
    }
}
