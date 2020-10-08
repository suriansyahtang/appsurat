<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends CI_Controller {

	function __construct()
        {
            parent::__construct();
			$this->load->model('m_surat_keluar');

			// load form and url helpers
	        $this->load->helper('form');
	         
	        // load form_validation library
	        $this->load->library('form_validation');
        }

	public function index()
	{
		$data['surat_keluar'] = $this->m_surat_keluar->tampil_data()->result();
		$this->load->view('v_navbar');
		$this->load->view('v_surat_keluar',$data);
		$this->load->view('v_footer');
	}

	public function tambah_sk()
	{
		$this->load->helper('romawi');
		$data['sk'] = $this->m_surat_keluar->hitung_surat();
		$data['surat_keluar'] = $this->m_surat_keluar->join_nip()->result();
		$this->load->view('v_navbar');
		$this->load->view('v_add_surat_keluar',$data);
		$this->load->view('v_footer');
	}

	function edit($id){
		$where = array('id_sk' => $id);
		$data['surat_keluar'] = $this->m_surat_keluar->edit_data($where,'surat_keluar')->result();
		$data['join_sk'] = $this->m_surat_keluar->join_nip()->result();
		$this->load->view('v_navbar');
		$this->load->view('v_edit_surat_keluar',$data);
		$this->load->view('v_footer');
	}

	function hapus($id){
		$where = array('id_sk' => $id);
		$this->m_surat_keluar->hapus_data($where,'surat_keluar');
		redirect('surat_keluar');
	}

	function tambah_aksi(){
		$this->form_validation->set_rules('no_surat', 'No Surat', 'required');
		$this->form_validation->set_rules('tgl_surat', 'Tanggal', 'required');
		$this->form_validation->set_rules('nip', 'NIP', 'required');
		$this->form_validation->set_rules('acara', 'Acara', 'required');

		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->helper('romawi');
        	$data['sk'] = $this->m_surat_keluar->hitung_surat();
        	$data['surat_keluar'] = $this->m_surat_keluar->join_nip()->result();
			$this->load->view('v_navbar');
			$this->load->view('v_add_surat_keluar',$data);
			$this->load->view('v_footer');
        }
        else
        {
            // load success template...
            $id = $this->input->post('id_sk');
			$no_surat = $this->input->post('no_surat');
			$tgl_surat = $this->input->post('tgl_surat');
			$nip = $this->input->post('nip');
			$acara = $this->input->post('acara');

			$data = array(
				'id_sk' => $id,
				'no_surat' => $no_surat,
				'tgl_surat' => $tgl_surat,
				'nip' => $nip,
				'acara' => $acara
				);
			$this->m_surat_keluar->input_data($data,'surat_keluar');
			redirect('surat_keluar');
        }
	}

	function update(){
		$id = $this->input->post('id_sk');
			$no_surat = $this->input->post('no_surat');
			$tgl_surat = $this->input->post('tgl_surat');
			$nip = $this->input->post('nip');
			$acara = $this->input->post('acara');

			$data = array(
				'id_sk' => $id,
				'no_surat' => $no_surat,
				'tgl_surat' => $tgl_surat,
				'nip' => $nip,
				'acara' => $acara
				);

	$where = array('id_sk' => $id);

	$this->m_surat_keluar->update_data($where,$data,'surat_keluar');
	redirect('surat_keluar');
	}

	function cetak($id){
		$this->load->helper('date');
		$this->load->model('m_sekolah');
		$where = array('id_sk' => $id);
		$sekolah = $this->m_sekolah->tampil_data()->row();
		$join_nip = $this->m_surat_keluar->join_nip_nama($where,'surat_keluar')->row();
		$cetak = $this->m_surat_keluar->edit_data($where,'surat_keluar')->row();
		$this->load->library('pdf');
		$pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Image('img/'.$sekolah->logo,10,13,25,28,'PNG');
        $pdf->Cell(10,5,'',0,0,'C');
		$pdf->Cell(190,9,'PEMERINTAH DAERAH KABUPATEN '.$sekolah->kabupaten_sekolah.'',0,1,'C');
		$pdf->Cell(10,5,'',0,0,'C');
		$pdf->Cell(190,9,'DINAS PENDIDIKAN',0,1,'C');
		$pdf->SetFont('Arial','B',24);
		$pdf->Cell(10,5,'',0,0,'C');
		$pdf->Cell(190,9,$sekolah->nama_sekolah,0,1,'C');
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(10,5,'',0,0,'C');
		$pdf->Cell(190,7,$sekolah->alamat_sekolah,0,1,'C');
		$pdf->Line(10,45,200,45);
		$pdf->Line(10,46,200,46);
		$pdf->Cell(190,5,'',0,1,'C');
		$pdf->SetFont('Arial','BU',16);
		$pdf->Cell(190,7,'SURAT PERINTAH',0,1,'C');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(190,7,'Nomor : '.$join_nip->no_surat.'',0,1,'C');
		$pdf->Cell(190,5,'',0,1,'C');
		$pdf->Cell(190,7,'Yang bertanda tangan di bawah ini :',0,1,'');
		$pdf->Cell(1,7,'Nama',0,0,'L');
		$pdf->Cell(40);
		$pdf->Cell(5,7,':',0,0,'L');
		$pdf->Cell(1,7,$sekolah->nama_kepsek,0,1,'L');
		$pdf->Cell(1,7,'NIP',0,0,'L');
		$pdf->Cell(40);
		$pdf->Cell(5,7,':',0,0,'L');
		$pdf->Cell(1,7,$sekolah->nip_kepsek,0,1,'L');
		$pdf->Cell(1,7,'Pangkat / Golongan',0,0,'L');
		$pdf->Cell(40);
		$pdf->Cell(5,7,':',0,0,'L');
		$pdf->Cell(1,7,$sekolah->pangkat,0,1,'L');
		$pdf->Cell(1,7,'Jabatan',0,0,'L');
		$pdf->Cell(40);
		$pdf->Cell(5,7,':',0,0,'L');
		$pdf->Cell(1,7,'Kepala '.$sekolah->nama_sekolah.'',0,1,'L');
		$pdf->Cell(190,5,'',0,1,'C');
		$pdf->Cell(190,7,'Dengan ini menugaskan kepada :',0,1,'');
		$pdf->Cell(10,10,'No',1,0,'C');
		$pdf->Cell(70,10,'Nama',1,0,'C');
		$pdf->Cell(50,10,'NIP',1,0,'C');
		$pdf->Cell(50,10,'Jabatan',1,1,'C');
		$pdf->Cell(10,10,'1',1,0,'C');
		$pdf->Cell(70,10,$join_nip->nama,1,0,'C');
		$pdf->Cell(50,10,$join_nip->nip,1,0,'C');
		$pdf->Cell(50,10,$join_nip->jabatan,1,1,'C');
		$pdf->Cell(190,5,'',0,1,'C');
		$pdf->MultiCell(180,7,'Untuk '.$join_nip->acara.'',0,1,'');
		$pdf->Cell(190,5,'',0,1,'C');
		$pdf->Cell(190,7,'Demikian surat tugas ini dibuat, agar dilaksanakan dengan penuh rasa tanggung jawab.',0,1,'J');
		$pdf->Cell(190,5,'',0,1,'C');
		$pdf->Cell(100,10,'',0,0,'');
		$pdf->Cell(25,7,ucfirst($sekolah->kabupaten_sekolah).', '.date('d F Y', strtotime($join_nip->tgl_surat)),0,1,'');
		$pdf->Cell(100,10,'',0,0,'');
		$pdf->Cell(25,7,'Kepala '.$sekolah->nama_sekolah.'',0,1,'L');
		$pdf->Cell(190,20,'',0,1,'');
		$pdf->Cell(100,10,'',0,0,'');
		$pdf->SetFont('Arial','BU',12);
		$pdf->Cell(25,7,$sekolah->nama_kepsek,0,1,'L');
		$pdf->Cell(100,10,'',0,0,'');
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(1,5,'NIP. '.$sekolah->nip_kepsek.'',0,1,'L');
		$pdf->Output('I','surat_tugas_'.$join_nip->no_surat.'.pdf');
	}

}

/* End of file surat_keluar.php */
/* Location: ./application/controllers/surat_keluar.php */