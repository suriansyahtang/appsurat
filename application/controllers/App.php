<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function index()
	{
		$this->load->model('m_surat_keluar');
		$this->load->model('m_sekolah');
		$sk = $this->m_surat_keluar->hitung_surat();
		$data = array (
			'title' => 'Aplikasi Pembuatan Surat Tugas Sekolah Kab. Purwakarta',
			'sk' => $sk
		);
		$this->load->view('v_navbar',$data);
		$this->load->view('v_index',$data);
		$this->load->view('v_footer');
	}

	public function pembuat()
	{
		$this->load->view('v_navbar');
		$this->load->view('v_pembuat');
		$this->load->view('v_footer');
	}
}
