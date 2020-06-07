<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->has_userdata('id')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda harus login terlebih dahulu. </div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = "DASHBOARD";

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('arsip/index', $data);
        $this->load->view('templates/footer_page');
    }

    public function arsip_baru()
    {
        $data['title'] = "ARSIP BARU";

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
        $file_surat = $_FILES['scan_arsip']['name'];
        if ($file_surat) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|dot|txt';
            $config['max_size']      = '5120';
            $config['upload_path'] = './assets/file/scanArsip/';
            $config['file_name'] = $statusSurat . '_' . time() . '_' . date("Y-m-d") . '_' . htmlspecialchars($this->input->post('dariKepada'));

            $this->load->library('upload', $config, 'suratUpload');
            $this->suratUpload->initialize($config);
            $upload_surat = $this->suratUpload->do_upload('scan_arsip');

            if ($upload_surat) {
                $surat = $this->suratUpload->data('file_name');
            } else {
                $surat = "";
            }
        } else {
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

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Tambah Arsip Berhasil. </div>');

        redirect('arsip/arsip_baru');
    }

    public function peminjaman()
    {
        $data['title'] = "PEMINJAMAN";

        $data['peminjam'] = $this->arsip_model->getPeminjam();
        $data['noSurat'] = $this->arsip_model->getNoSurat();

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('arsip/peminjaman', $data);
        $this->load->view('templates/footer_page');
    }

    public function tambahPeminjam()
    {
        $data = [
            'nama_peminjam' => $this->input->post('nama_peminjam'),
            'indeks' => $this->input->post('indeks'),
            'kode_surat' => $this->input->post('kode_surat'),
            'no_surat' => $this->input->post('no_surat'),
            'no_laci' =>  $this->input->post('no_laci'),
            'perihal' => $this->input->post('perihal'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali')
        ];

        $this->arsip_model->createPeminjam($data);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Tambah Peminjam Berhasil. </div>');

        redirect('arsip/peminjaman');
    }

    public function editPeminjam()
    {
        $id = $this->input->post('id');

        $data = [
            'nama_peminjam' => $this->input->post('nama_peminjam'),
            'indeks' => $this->input->post('indeks'),
            'kode_surat' => $this->input->post('kode_surat'),
            'no_surat' => $this->input->post('no_surat'),
            'no_laci' =>  $this->input->post('no_laci'),
            'perihal' => $this->input->post('perihal'),
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali')
        ];

        $this->arsip_model->updatePeminjam($id, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Edit Peminjam Berhasil. </div>');

        redirect('arsip/peminjaman');
    }

    public function hapusPeminjam($id)
    {
        $this->arsip_model->deletePeminjam($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Hapus Peminjam Berhasil. </div>');

        redirect('arsip/peminjaman');
    }

    public function manajemen_arsip()
    {
        $data['title'] = "MANAJEMEN ARSIP";

        $data['arsip'] = $this->arsip_model->getArsip();

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('arsip/manajemen_arsip', $data);
        $this->load->view('templates/footer_page');
    }

    public function editArsip($id)
    {
        $data['title'] = "EDIT ARSIP";

        $data['jmlSM'] = $this->arsip_model->jmlSuratMasuk();
        $data['jmlSK'] = $this->arsip_model->jmlSuratKeluar();
        $data['dataArsip'] = $this->arsip_model->getUser($id);

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('arsip/arsip_edit', $data);
        $this->load->view('templates/footer_page');
    }

    public function do_edit($id)
    {
        $status = $this->input->post('status');
        if ($status == '0') {
            $statusSurat = "arsipMasuk";
        } else {
            $statusSurat = "arsipKeluar";
        }

        $data['user'] = $this->arsip_model->getUserData($id);
        //surat
        $config = array();
        $file_surat = $_FILES['scan_arsip']['name'];
        if ($file_surat) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|docx|dot|txt';
            $config['max_size']      = '5120';
            $config['upload_path'] = './assets/file/scanArsip/';
            $config['file_name'] = $statusSurat . '_' . time() . '_' . date("Y-m-d") . '_' . htmlspecialchars($this->input->post('dariKepada'));

            $this->load->library('upload', $config, 'suratUpload');
            $this->suratUpload->initialize($config);
            $upload_surat = $this->suratUpload->do_upload('scan_arsip');

            if ($upload_surat) {
                $surat = $this->suratUpload->data('file_name');
            } else {
                $surat = $data['user']['scan_arsip'];
            }
        } else {
            $surat = $data['user']['scan_arsip'];
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

        $this->arsip_model->editArsip($id, $data);
        
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Edit Arsip Berhasil. </div>');

        redirect('arsip/manajemen_arsip');
    }

    public function hapusArsip($id)
    {
        $this->arsip_model->deleteArsip($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Hapus Arsip Berhasil. </div>');

        redirect('arsip/manajemen_arsip');
    }

    public function percobaan()
    {
        $data['title'] = "DASHBOARD";

        $this->load->view('templates/header_page');
        $this->load->view('templates/sidebar_page');
        $this->load->view('templates/topbar_page');
        $this->load->view('arsip/percobaan', $data);
        $this->load->view('templates/footer_page');
    }
}
