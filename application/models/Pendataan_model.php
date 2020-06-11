<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendataan_model extends CI_Model
{

    public function createKK($data)
    {
        return $this->db->insert('tbl_kartukeluarga', $data);
    }

    public function createAnggota($data)
    {
        return $this->db->insert('tbl_anggotakeluarga', $data);
    }

    //edit tapi dihapus
    public function deleteKK($kk)
    {
        $this->db->where('no_kk', $kk);
        return $this->db->delete('tbl_kartukeluarga');
    }

    public function deleteAnggota($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->delete('tbl_anggotakeluarga');
    }

    public function deleteAnggotaKK($kk)
    {
        $this->db->where('noKK', $kk);
        return $this->db->delete('tbl_anggotakeluarga');
    }
    public function getUserKK($no_kk)
    {
        $result = $this->db->get_where('tbl_kartukeluarga', ['no_kk' => $no_kk]);

        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    //single
    public function getUserAnggota($nik)
    {
        $result = $this->db->get_where('tbl_anggotakeluarga', ['nik' => $nik]);

        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }

    public function getAllKK()
    {
        $query = $this->db->query("SELECT * from tbl_kartukeluarga");
        return $query->result();
    }

    public function getAllData()
    {
        $query = $this->db->query("SELECT * FROM `tbl_kartukeluarga` kk, tbl_anggotakeluarga ak where kk.no_kk = ak.noKK");
        return $query->result();
    }

    public function getAnggotaKK($no_kk)
    {
        $query = $this->db->query("SELECT * from tbl_anggotakeluarga WHERE noKK = '" . $no_kk . "'");
        return $query->result();
    }

    //filter ajax
    // Get DataTable data
    function getFilter($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        $searchNama = $postData['searchNama'];
        $searchUmur = $postData['searchUmur'];
        $searchJenkel = $postData['searchJenkel'];
        $searchStatus = $postData['searchStatus'];
        $searchRt = $postData['searchRt'];
        $searchRw = $postData['searchRw'];
        $searchNik = $postData['searchNik'];
        $searchPendidikan = $postData['searchPendidikan'];
        $searchPekerjaan = $postData['searchPekerjaan'];
        $searchPenghasilan = $postData['searchPenghasilan'];
        $searchDesa = $postData['searchDesa'];
        $searchAgama = $postData['searchAgama'];

        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (
        nama like '%" . $searchValue . "%' or 
        umur like '%" . $searchValue . "%' or 
        jenkel like'%" . $searchValue . "%' or 
        status_kawin like'%" . $searchValue . "%' or 
        rt like'%" . $searchValue . "%' or 
        rw like'%" . $searchValue . "%' or 
        nik like'%" . $searchValue . "%' or 
        pendidikan like'%" . $searchValue . "%' or 
        pekerjaan like'%" . $searchValue . "%' or 
        penghasilan like'%" . $searchValue . "%' or 
        desa like'%" . $searchValue . "%' or
        agama like'%" . $searchValue . "%'
        ) ";
        }
        if ($searchNama != '') {
            $search_arr[] = " nama='" . $searchNama . "' ";
        }
        if ($searchUmur != '') {
            $search_arr[] = " umur='" . $searchUmur . "' ";
        }
        if ($searchJenkel != '') {
            $search_arr[] = " jenkel like '%" . $searchJenkel . "%' ";
        }
        if ($searchStatus != '') {
            $search_arr[] = " status_kawin like '%" . $searchStatus . "%' ";
        }
        if ($searchRt != '') {
            $search_arr[] = " rt like '%" . $searchRt . "%' ";
        }
        if ($searchRw != '') {
            $search_arr[] = " rw like '%" . $searchRw . "%' ";
        }
        if ($searchNik != '') {
            $search_arr[] = " nik like '%" . $searchNik . "%' ";
        }
        if ($searchPendidikan != '') {
            $search_arr[] = " pendidikan like '%" . $searchPendidikan . "%' ";
        }
        if ($searchPekerjaan != '') {
            $search_arr[] = " pekerjaan like '%" . $searchPekerjaan . "%' ";
        }
        if ($searchPenghasilan != '') {
            $search_arr[] = " penghasilan like '%" . $searchPenghasilan . "%' ";
        }
        if ($searchDesa != '') {
            $search_arr[] = " desa like '%" . $searchDesa . "%' ";
        }
        if ($searchAgama != '') {
            $search_arr[] = " agama like '%" . $searchAgama . "%' ";
        }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('SELECT * FROM `tbl_kartukeluarga` kk, tbl_anggotakeluarga ak where kk.no_kk = ak.noKK')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->query('SELECT * FROM `tbl_kartukeluarga` kk, tbl_anggotakeluarga ak where kk.no_kk = ak.noKK')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('SELECT * FROM `tbl_kartukeluarga` kk, tbl_anggotakeluarga ak where kk.no_kk = ak.noKK')->result();

        $data = array();

        foreach ($records as $record) {

            $data[] = array(
                "nama" => $record->nama,
                "umur" => $record->umur,
                "jenkel" => $record->jenkel,
                "status_kawin" => $record->status_kawin,
                "rt" => $record->rt,
                "rw" => $record->rw,
                "nik" => $record->nik,
                "pendidikan" => $record->pendidikan,
                "pekerjaan" => $record->pekerjaan,
                "penghasilan" => $record->penghasilan,
                "desa" => $record->desa,
                "agama" => $record->agama
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }

    //COBA MANEH
    var $table = 'customers';
    var $column_order = array(null, 'nama', 'umur', 'jenkel', 'status_kawin', 'rt', 'rw', 'nik', 'pendidikan', 'pekerjaan', 'penghasilan', 'desa', 'agama'); //set column field database for datatable orderable
    var $column_search = array('nama', 'umur', 'jenkel', 'status_kawin', 'rt', 'rw', 'nik', 'pendidikan', 'pekerjaan', 'penghasilan', 'desa', 'agama'); //set column field database for datatable searchable 
    var $order = array('nik' => 'asc'); // default order 

    private function _get_datatables_query()
    {

        //add custom filter here
        if ($this->input->post('nama')) {
            $this->db->where('nama', $this->input->post('nama'));
        }
        if ($this->input->post('umur')) {
            $this->db->like('umur', $this->input->post('umur'));
        }
        if ($this->input->post('jenkel')) {
            $this->db->like('jenkel', $this->input->post('jenkel'));
        }
        if ($this->input->post('status_kawin')) {
            $this->db->like('status_kawin', $this->input->post('status_kawin'));
        }
        if ($this->input->post('rt')) {
            $this->db->like('rt', $this->input->post('rt'));
        }
        if ($this->input->post('rw')) {
            $this->db->like('rw', $this->input->post('rw'));
        }
        if ($this->input->post('nik')) {
            $this->db->like('nik', $this->input->post('nik'));
        }
        if ($this->input->post('pendidikan')) {
            $this->db->like('pendidikan', $this->input->post('pendidikan'));
        }
        if ($this->input->post('pekerjaan')) {
            $this->db->like('pekerjaan', $this->input->post('pekerjaan'));
        }
        if ($this->input->post('penghasilan')) {
            $this->db->like('penghasilan', $this->input->post('penghasilan'));
        }
        if ($this->input->post('desa')) {
            $this->db->like('desa', $this->input->post('desa'));
        }
        if ($this->input->post('agama')) {
            $this->db->like('agama', $this->input->post('agama'));
        }

        $this->db->query('SELECT * FROM `tbl_kartukeluarga` kk, tbl_anggotakeluarga ak where kk.no_kk = ak.noKK');
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
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
        $this->db->query('SELECT * FROM `tbl_kartukeluarga` kk, tbl_anggotakeluarga ak where kk.no_kk = ak.noKK');
        return $this->db->count_all_results();
    }
}
