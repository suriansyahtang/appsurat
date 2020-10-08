<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct()
        {
            parent::__construct();
			$this->load->model('m_pegawai');

			// load form and url helpers
	        $this->load->helper('form');
	         
	        // load form_validation library
	        $this->load->library('form_validation');
        }

	public function index()
	{
		$data['pegawai'] = $this->m_pegawai->tampil_data()->result();
		$this->load->view('v_navbar');
		$this->load->view('v_pegawai',$data);
		$this->load->view('v_footer');
	}

	function edit($id){
		$where = array('nip' => $id);
		$data['pegawai'] = $this->m_pegawai->edit_data($where,'pegawai')->result();
		$this->load->view('v_navbar');
		$this->load->view('v_edit_pegawai',$data);
		$this->load->view('v_footer');
	}

	function hapus($id){
		$where = array('nip' => $id);
		$this->m_pegawai->hapus_data($where,'pegawai');
		redirect('pegawai');
	}

	function tambah_aksi(){
		$this->form_validation->set_rules('nip', 'NIP', 'required|numeric');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
        {
            $data['pegawai'] = $this->m_pegawai->tampil_data()->result();
			$this->load->view('v_navbar');
			$this->load->view('v_pegawai',$data);
			$this->load->view('v_footer');
        }
        else
        {
            // load success template...
            $id = $this->input->post('nip');
			$nama = $this->input->post('nama');
			$alamat = $this->input->post('alamat');
			$jabatan = $this->input->post('jabatan');
			$no_hp = $this->input->post('no_hp');

			$data = array(
				'nip' => $id,
				'nama' => $nama,
				'alamat' => $alamat,
				'jabatan' => $jabatan,
				'no_hp' => $no_hp
				);
			$this->m_pegawai->input_data($data,'pegawai');
			redirect('pegawai');
        }
	}

	function update(){
		$id = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$jabatan = $this->input->post('jabatan');
		$no_hp = $this->input->post('no_hp');
	
	$data = array(
		'nip' => $id,
		'nama' => $nama,
		'alamat' => $alamat,
		'jabatan' => $jabatan,
		'no_hp' => $no_hp
	);

	$where = array('nip' => $id);

	$this->m_pegawai->update_data($where,$data,'pegawai');
	redirect('pegawai');
}

}

/* End of file pegawai.php */
/* Location: ./application/controllers/pegawai.php */