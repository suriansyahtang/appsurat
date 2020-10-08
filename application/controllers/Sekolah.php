<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

	function __construct()
        {
            parent::__construct();
			$this->load->model('m_sekolah');
			$this->load->helper(array('form', 'url'));
        }

	public function index()
	{
		$data['skul'] = $this->m_sekolah->tampil_data()->result();
		$this->load->view('v_navbar');
		$this->load->view('v_sekolah',$data);
		$this->load->view('v_footer');
	}

	function edit($id){
		$where = array('id_sekolah' => $id);
		$data['skul'] = $this->m_sekolah->edit_data($where,'sekolah')->result();
		$this->load->view('v_navbar');
		$this->load->view('v_edit_sekolah',$data);
		$this->load->view('v_footer');
	}

	function update(){
	$config['upload_path']          = 'img/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 3000;
    $config['max_width']            = 1024;
    $config['max_height']           = 1024;
    $this->load->library('upload', $config);
	
	if ( ! $this->upload->do_upload('logo'))
                {
                    echo 'gagal upload';
                }
                else
                {
                	$id = $this->input->post('id_sekolah');
					$nama_sekolah = $this->input->post('nama_sekolah');
					$alamat_sekolah = $this->input->post('alamat_sekolah');
					$kabupaten_sekolah = $this->input->post('kabupaten_sekolah');
					$nama_kepsek = $this->input->post('nama_kepsek');
					$nip_kepsek = $this->input->post('nip_kepsek');
					$pangkat = $this->input->post('pangkat');
					$file = $this->upload->data();
					$gambar = $file['file_name'];

					$data = array(
						'id_sekolah' => $id,
						'nama_sekolah' => $nama_sekolah,
						'alamat_sekolah' => $alamat_sekolah,
						'kabupaten_sekolah' => $kabupaten_sekolah,
						'nama_kepsek' => $nama_kepsek,
						'nip_kepsek' => $nip_kepsek,
						'pangkat' => $pangkat,
						'logo' => $gambar
					);

					$where = array('id_sekolah' => $id);

					$this->m_sekolah->update_data($where,$data,'sekolah');
					redirect('sekolah');
                }
}

}

/* End of file Sekolah.php */
/* Location: ./application/controllers/Sekolah.php */