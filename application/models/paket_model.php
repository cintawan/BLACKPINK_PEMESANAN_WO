<?php defined('BASEPATH') OR exit('No direct script access allowed');

class paket_model extends CI_Model
{
	private $_table = "paket";

	public $KodePaket;
	public $NamaPaket;
	public $rincian;
	public $harga;
	
	public function rules()
	{
		return [
			['field' => 'KodePaket',
			'label' => 'KodePaket',
			'rules' => 'required'],

			['field' => 'NamaPaket',
			'label' => 'NamaPaket',
			'rules' => 'required'],

			['field' => 'rincian',
			'label' => 'Rincian',
			'rules' => 'required'],

			['field' => 'harga',
			'label' => 'Harga',
			'rules' => 'numeric']

					];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["KodePaket" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->KodePaket = $post["KodePaket"];
		$this->NamaPaket = $post["NamaPaket"];
		$this->rincian = $post["rincian"];
		$this->harga = $post["harga"];
		

		//sctipt insert data ke database
		$this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->KodePaket = $post["id"];
		$this->NamaPaket = $post["NamaPaket"];
		$this->rincian = $post["rincian"];
		$this->harga = $post["harga"];
		
		$this->db->update($this->_table, $this, array('KodePaket' => $post['id']));
	}

	public function delete($id)
	{
		// $this->_deleteImage($id);
		return $this->db->delete($this->_table, array('KodePaket' => $id));
	}

	

}