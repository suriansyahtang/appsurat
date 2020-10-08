<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_surat_keluar extends CI_Model {

	function tampil_data(){
		return $this->db->get('surat_keluar');
	}

	function hitung_surat(){
		$query = $this->db->get('surat_keluar');
		return $query->num_rows();
	}

	function join_nip(){
		$this->db->select('pegawai.nip,pegawai.nama,pegawai.jabatan');
		$this->db->from('pegawai');
		$this->db->join('surat_keluar','surat_keluar.nip = pegawai.nip', 'LEFT');
		$this->db->group_by("nip");
		$query = $this->db->get();
		return $query;
	}

	function join_nip_nama($where,$table){
		$this->db->select('no_surat,tgl_surat,surat_keluar.nip,pegawai.nama,pegawai.jabatan,acara');
		$this->db->join('pegawai','pegawai.nip = surat_keluar.nip', 'LEFT');
		$query = $this->db->get_where($table,$where);
		return $query;
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

}

/* End of file m_surat_keluar.php */
/* Location: ./application/models/m_surat_keluar.php */