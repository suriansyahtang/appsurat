<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sekolah extends CI_Model {

	function tampil_data(){
		return $this->db->get('sekolah');
	}

	function edit_data($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

}

/* End of file m_sekolah.php */
/* Location: ./application/models/m_sekolah.php */