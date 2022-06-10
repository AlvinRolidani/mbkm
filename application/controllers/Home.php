<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Peta', 'peta');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
	public function peta()
	{
		$inovator = $this->input->get('kategoriinovator');
		$inovasi = $this->input->get('kategoriinovasi');
		$tahun = $this->input->get('tahun');
		$data['tahun'] = $tahun;
		$data['inovasi'] = $inovasi;
		$data['inovator'] = $inovator;

		$data['kecamatan'] = $this->M_Peta->get();


		$this->load->view('templates/header_peta');
		$this->load->view('templates/sidebar_peta');
		$this->load->view('petasebaran/peta_sebaran', $data);
	}

	public function detail($id_kecamatan)
	{
		$where = ['id_kecamatan' => $id_kecamatan];
		$id = implode("','", $where);
		$inovasi = $this->db->select('inovasi.deskripsi,inovasi.manfaat_inovasi,inovasi.foto_inovasi,inovasi.foto_inovator,inovator.tgl_lahir,inovator.id_inovator,inovasi.id_inovasi,inovasi.nama_inovasi, bidang_inovasi.nama_bidang_inovasi,tb_kecamatan.nama_kecamatan, inovator.nama_inovator,kategori_inovator.nama_kategori_inovator,inovasi.created_at')->from('inovasi')->join('bidang_inovasi', 'inovasi.id_bidang_inovasi=bidang_inovasi.id_bidang_inovasi', 'INNER')->join('tb_kecamatan', 'inovasi.id_kecamatan=tb_kecamatan.id_kecamatan', 'INNER')->join('inovator', 'inovasi.id_inovator = inovator.id_inovator', 'INNER')->join('kategori_inovator', 'inovator.id_kategori_inovator = kategori_inovator.id_kategori_inovator')->where('inovasi.id_kecamatan', $id)->get();

		$inovator = $this->db->select('inovator.id_inovator,instansi.id_instansi,inovasi.foto_inovator,inovator.nama_inovator,inovator.email,inovator.alamat,kategori_inovator.nama_kategori_inovator,instansi.nama_instansi')->from('inovator')->join('inovasi', 'inovator.id_inovator=inovasi.id_inovasi')->join('kategori_inovator', 'inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator', 'INNER')->join('instansi', 'inovator.id_instansi=instansi.id_instansi', 'LEFT')->get();
		$data['inovasi'] = $inovasi->result();
		$data['inovator'] = $inovator->result();
		$data['kecamatan'] = $this->peta->namaKecamatan($where, 'tb_kecamatan')->result();
		$this->load->view('templates/header_peta.php');
		$this->load->view('petasebaran/detail', $data);
	}
	public function detailgetkategori($id_kecamatan)
	{
		$where = ['id_kecamatan' => $id_kecamatan];
		$id = implode("','", $where);
		$idi = $this->input->get('kategoriinovator');
		$idino = $this->input->get('kategoriinovasi');
		$tahun = $this->input->get('tahun');

		$inovasi = $this->db->query("SELECT inovasi.deskripsi,inovasi.manfaat_inovasi,inovasi.foto_inovasi,inovasi.foto_inovator,inovator.tgl_lahir,inovator.id_inovator,inovasi.id_inovasi,inovasi.nama_inovasi, bidang_inovasi.nama_bidang_inovasi,tb_kecamatan.nama_kecamatan, inovator.nama_inovator,kategori_inovator.nama_kategori_inovator,inovasi.created_at FROM inovasi JOIN inovator ON inovasi.id_inovator=inovator.id_inovator INNER JOIN kategori_inovator ON inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator JOIN bidang_inovasi ON inovasi.id_bidang_inovasi=bidang_inovasi.id_bidang_inovasi INNER JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan=inovasi.id_kecamatan WHERE DATE_FORMAT(inovasi.created_at,'%Y')='" . $tahun . "' AND kategori_inovator.id_kategori_inovator= '" . $idi . "'AND inovasi.id_kecamatan='" . $id . "' AND bidang_inovasi.id_bidang_inovasi ='" . $idino . "'");

		$inovator = $this->db->select('inovator.id_inovator,instansi.id_instansi,inovasi.foto_inovator,inovator.nama_inovator,inovator.email,inovator.alamat,kategori_inovator.nama_kategori_inovator,instansi.nama_instansi')->from('inovator')->join('inovasi', 'inovator.id_inovator=inovasi.id_inovasi')->join('kategori_inovator', 'inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator', 'INNER')->join('instansi', 'inovator.id_instansi=instansi.id_instansi', 'LEFT')->get();


		$data['inovasi'] = $inovasi->result();
		$data['inovator'] = $inovator->result();
		$data['tb_kecamatan'] = $this->peta->namaKecamatan($where, 'tb_kecamatan')->result();
		$this->load->view('templates/header_peta.php');
		$this->load->view('petasebaran/detail', $data);
	}
	public function detailInovasiTahun($id_kecamatan)
	{
		$where = ['id_kecamatan' => $id_kecamatan];
		$id = implode("','", $where);
		$idino = $this->input->get('kategoriinovasi');
		$tahun = $this->input->get('tahun');


		$inovasi = $this->db->query("SELECT inovasi.deskripsi,inovasi.manfaat_inovasi,inovasi.foto_inovasi,inovasi.foto_inovator,inovator.tgl_lahir,inovator.id_inovator,inovasi.id_inovasi,inovasi.nama_inovasi, bidang_inovasi.nama_bidang_inovasi,tb_kecamatan.nama_kecamatan, inovator.nama_inovator,kategori_inovator.nama_kategori_inovator,inovasi.created_at FROM inovasi JOIN inovator ON inovasi.id_inovator=inovator.id_inovator INNER JOIN kategori_inovator ON inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator JOIN bidang_inovasi ON inovasi.id_bidang_inovasi=bidang_inovasi.id_bidang_inovasi INNER JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan=inovasi.id_kecamatan WHERE DATE_FORMAT(inovasi.created_at,'%Y')='" . $tahun . "'AND inovasi.id_kecamatan='" . $id . "' AND bidang_inovasi.id_bidang_inovasi ='" . $idino . "'");

		$inovator = $this->db->select('inovator.id_inovator,instansi.id_instansi,inovasi.foto_inovator,inovator.nama_inovator,inovator.email,inovator.alamat,kategori_inovator.nama_kategori_inovator,instansi.nama_instansi')->from('inovator')->join('inovasi', 'inovator.id_inovator=inovasi.id_inovasi')->join('kategori_inovator', 'inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator', 'INNER')->join('instansi', 'inovator.id_instansi=instansi.id_instansi', 'LEFT')->get();


		$data['inovasi'] = $inovasi->result();
		$data['inovator'] = $inovator->result();
		$data['kecamatan'] = $this->peta->namaKecamatan($where, 'tb_kecamatan')->result();
		$this->load->view('templates/header_peta.php');
		$this->load->view('petasebaran/detail', $data);
	}
	public function detailInovatorTahun($id_kecamatan)
	{
		$where = ['id_kecamatan' => $id_kecamatan];
		$id = implode("','", $where);
		$idi = $this->input->get('kategoriinovator');
		$tahun = $this->input->get('tahun');

		$inovasi = $this->db->query("SELECT inovasi.deskripsi,inovasi.manfaat_inovasi,inovasi.foto_inovasi,inovasi.foto_inovator,inovator.tgl_lahir,inovator.id_inovator,inovasi.id_inovasi,inovasi.nama_inovasi, bidang_inovasi.nama_bidang_inovasi,tb_kecamatan.nama_kecamatan, inovator.nama_inovator,kategori_inovator.nama_kategori_inovator,inovasi.created_at FROM inovasi JOIN inovator ON inovasi.id_inovator=inovator.id_inovator INNER JOIN kategori_inovator ON inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator JOIN bidang_inovasi ON inovasi.id_bidang_inovasi=bidang_inovasi.id_bidang_inovasi INNER JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan=inovasi.id_kecamatan WHERE DATE_FORMAT(inovasi.created_at,'%Y')='" . $tahun . "'AND inovasi.id_kecamatan='" . $id . "' AND kategori_inovator.id_kategori_inovator= '" . $idi . "'");

		$inovator = $this->db->select('inovator.id_inovator,instansi.id_instansi,inovasi.foto_inovator,inovator.nama_inovator,inovator.email,inovator.alamat,kategori_inovator.nama_kategori_inovator,instansi.nama_instansi')->from('inovator')->join('inovasi', 'inovator.id_inovator=inovasi.id_inovasi')->join('kategori_inovator', 'inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator', 'INNER')->join('instansi', 'inovator.id_instansi=instansi.id_instansi', 'LEFT')->get();


		$data['inovasi'] = $inovasi->result();
		$data['inovator'] = $inovator->result();
		$data['kecamatan'] = $this->peta->namaKecamatan($where, 'tb_kecamatan')->result();
		$this->load->view('templates/header_peta.php');
		$this->load->view('petasebaran/detail', $data);
	}
	public function detailTahun($id_kecamatan)
	{
		$where = ['id_kecamatan' => $id_kecamatan];
		$id = implode("','", $where);
		$tahun = $this->input->get('tahun');

		$inovasi = $this->db->query("SELECT inovasi.deskripsi,inovasi.manfaat_inovasi,inovasi.foto_inovasi,inovasi.foto_inovator,inovator.tgl_lahir,inovator.id_inovator,inovasi.id_inovasi,inovasi.nama_inovasi, bidang_inovasi.nama_bidang_inovasi,tb_kecamatan.nama_kecamatan, inovator.nama_inovator,kategori_inovator.nama_kategori_inovator,inovasi.created_at FROM inovasi JOIN inovator ON inovasi.id_inovator=inovator.id_inovator INNER JOIN kategori_inovator ON inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator JOIN bidang_inovasi ON inovasi.id_bidang_inovasi=bidang_inovasi.id_bidang_inovasi INNER JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan=inovasi.id_kecamatan WHERE DATE_FORMAT(inovasi.created_at,'%Y')='" . $tahun . "'AND inovasi.id_kecamatan='" . $id . "'");


		$inovator = $this->db->select('inovator.id_inovator,instansi.id_instansi,inovasi.foto_inovator,inovator.nama_inovator,inovator.email,inovator.alamat,kategori_inovator.nama_kategori_inovator,instansi.nama_instansi')->from('inovator')->join('inovasi', 'inovator.id_inovator=inovasi.id_inovasi')->join('kategori_inovator', 'inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator', 'INNER')->join('instansi', 'inovator.id_instansi=instansi.id_instansi', 'LEFT')->get();


		$data['inovasi'] = $inovasi->result();
		$data['inovator'] = $inovator->result();
		$data['kecamatan'] = $this->peta->namaKecamatan($where, 'tb_kecamatan')->result();
		$this->load->view('templates/header_peta.php');
		$this->load->view('petasebaran/detail', $data);
	}
	public function detailSemuaTahun($id_kecamatan)
	{
		$where = ['id_kecamatan' => $id_kecamatan];
		$id = implode("','", $where);
		$idi = $this->input->get('kategoriinovator');
		$idino = $this->input->get('kategoriinovasi');

		$inovasi = $this->db->query("SELECT inovasi.deskripsi,inovasi.manfaat_inovasi,inovasi.foto_inovasi,inovasi.foto_inovator,inovator.tgl_lahir,inovator.id_inovator,inovasi.id_inovasi,inovasi.nama_inovasi, bidang_inovasi.nama_bidang_inovasi,tb_kecamatan.nama_kecamatan, inovator.nama_inovator,kategori_inovator.nama_kategori_inovator,inovasi.created_at FROM inovasi JOIN inovator ON inovasi.id_inovator=inovator.id_inovator INNER JOIN kategori_inovator ON inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator JOIN bidang_inovasi ON inovasi.id_bidang_inovasi=bidang_inovasi.id_bidang_inovasi INNER JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan=inovasi.id_kecamatan WHERE bidang_inovasi.id_bidang_inovasi ='" . $idino . "'AND inovasi.id_kecamatan='" . $id . "' AND kategori_inovator.id_kategori_inovator= '" . $idi . "'");


		$inovator = $this->db->select('inovator.id_inovator,instansi.id_instansi,inovasi.foto_inovator,inovator.nama_inovator,inovator.email,inovator.alamat,kategori_inovator.nama_kategori_inovator,instansi.nama_instansi')->from('inovator')->join('inovasi', 'inovator.id_inovator=inovasi.id_inovasi')->join('kategori_inovator', 'inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator', 'INNER')->join('instansi', 'inovator.id_instansi=instansi.id_instansi', 'LEFT')->get();


		$data['inovasi'] = $inovasi->result();
		$data['inovator'] = $inovator->result();
		$data['kecamatan'] = $this->peta->namaKecamatan($where, 'tb_kecamatan')->result();
		$this->load->view('templates/header_peta.php');
		$this->load->view('petasebaran/detail', $data);
	}

	public function detailInovator($id_kecamatan)
	{
		$where = ['id_kecamatan' => $id_kecamatan];
		$id = implode("','", $where);
		$idi = $this->input->get('kategoriinovator');



		$inovasi = $this->db->query("SELECT inovasi.deskripsi,inovasi.manfaat_inovasi,inovasi.foto_inovasi,inovasi.foto_inovator,inovator.tgl_lahir,inovator.id_inovator,inovasi.id_inovasi,inovasi.nama_inovasi, tb_kecamatan.nama_kecamatan,bidang_inovasi.nama_bidang_inovasi, inovator.nama_inovator,kategori_inovator.nama_kategori_inovator,inovasi.created_at FROM inovasi JOIN inovator ON inovasi.id_inovator=inovator.id_inovator INNER JOIN kategori_inovator ON inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator INNER JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan=inovasi.id_kecamatan INNER JOIN bidang_inovasi ON bidang_inovasi.id_bidang_inovasi=inovasi.id_bidang_inovasi WHERE inovasi.id_kecamatan='" . $id . "' AND kategori_inovator.id_kategori_inovator= '" . $idi . "'");

		$inovator = $this->db->select('inovator.id_inovator,instansi.id_instansi,inovasi.foto_inovator,inovator.nama_inovator,inovator.email,inovator.alamat,kategori_inovator.nama_kategori_inovator,instansi.nama_instansi')->from('inovator')->join('inovasi', 'inovator.id_inovator=inovasi.id_inovasi')->join('kategori_inovator', 'inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator', 'INNER')->join('instansi', 'inovator.id_instansi=instansi.id_instansi', 'LEFT')->get();

		$data['inovasi'] = $inovasi->result();
		$data['inovator'] = $inovator->result();
		$data['kecamatan'] = $this->peta->namaKecamatan($where, 'tb_kecamatan')->result();
		$this->load->view('templates/header_peta.php');
		$this->load->view('petasebaran/detail', $data);
	}
	public function detailInovasi($id_kecamatan)
	{
		$where = ['id_kecamatan' => $id_kecamatan];
		$id = implode("','", $where);
		$idino = $this->input->get('kategoriinovasi');


		$inovasi = $this->db->query("SELECT inovasi.deskripsi,inovasi.manfaat_inovasi,inovasi.foto_inovasi,inovasi.foto_inovator,inovator.tgl_lahir,inovator.id_inovator,inovasi.id_inovasi,inovasi.nama_inovasi, tb_kecamatan.nama_kecamatan,bidang_inovasi.nama_bidang_inovasi, inovator.nama_inovator,kategori_inovator.nama_kategori_inovator,inovasi.created_at FROM inovasi JOIN inovator ON inovasi.id_inovator=inovator.id_inovator INNER JOIN kategori_inovator ON inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator INNER JOIN tb_kecamatan ON tb_kecamatan.id_kecamatan=inovasi.id_kecamatan INNER JOIN bidang_inovasi ON bidang_inovasi.id_bidang_inovasi=inovasi.id_bidang_inovasi WHERE bidang_inovasi.id_bidang_inovasi ='" . $idino . "'AND inovasi.id_kecamatan='" . $id . "'");


		$inovator = $this->db->select('inovator.id_inovator,instansi.id_instansi,inovasi.foto_inovator,inovator.nama_inovator,inovator.email,inovator.alamat,kategori_inovator.nama_kategori_inovator,instansi.nama_instansi')->from('inovator')->join('inovasi', 'inovator.id_inovator=inovasi.id_inovasi')->join('kategori_inovator', 'inovator.id_kategori_inovator=kategori_inovator.id_kategori_inovator', 'INNER')->join('instansi', 'inovator.id_instansi=instansi.id_instansi', 'LEFT')->get();

		$data['inovasi'] = $inovasi->result();
		$data['inovator'] = $inovator->result();
		$data['kecamatan'] = $this->peta->namaKecamatan($where, 'tb_kecamatan')->result();
		$this->load->view('templates/header_peta.php');
		$this->load->view('petasebaran/detail', $data);
	}
}
