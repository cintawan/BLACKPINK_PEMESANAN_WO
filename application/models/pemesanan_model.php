<?php defined('BASEPATH') OR exit('No direct script access allowed');

class pemesanan_model extends CI_Model
{
	private $_table = "pemesanan";

	public $kode;
	public $nama;
	public $alamat;
	public $nohp;
	public $paket;
	public $adat;
	public $tglacara;
	public $status;

	public function rules()
	{
		return [
			['field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'],

			['field' => 'alamat',
			'label' => 'Alamat',
			'rules' => 'required'],

			['field' => 'nohp',
			'label' => 'Nohp',
			'rules' => 'numeric'],

			['field' => 'paket',
			'label' => 'Paket',
			'rules' => 'required'],

			['field' => 'adat',
			'label' => 'Adat',
			'rules' => 'required'],

			['field' => 'tglacara',
			'label' => 'Tglacara',
			'rules' => 'required'],

			['field' => 'status',
			'label' => 'Status',
			'rules' => 'required']


		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["kode" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->kode = $post["kode"];
		$this->nama = $post["nama"];
		$this->alamat = $post["alamat"];
		$this->nohp = $post["nohp"];
		$this->paket = $post["paket"];
		$this->adat = $post["adat"];
		$this->tglacara = $post["tglacara"];
		$this->status = $post["status"];

		//sctipt insert data ke database
		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->kode = $post["id"];
		$this->nama = $post["nama"];
		$this->alamat = $post["alamat"];
		$this->nohp = $post["nohp"];
		$this->paket = $post["paket"];
		$this->adat = $post["adat"];
		$this->tglacara = $post["tglacara"];
		$this->status = $post["status"];
		$this->db->update($this->_table, $this, array('kode' => $post['id']));
	}

	public function delete($id)
	{
		// $this->_deleteImage($id);
		return $this->db->delete($this->_table, array('kode' => $id));
	}

	

}