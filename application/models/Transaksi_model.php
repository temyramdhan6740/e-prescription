<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	public $table = 'transaksi_m';

	function __construct()
	{
		parent::__construct();
	}

	public function getAll()
	{
		$this->db->order_by('created_date', 'DESC');
		return $this->db->get($this->table)->result();
	}

	public function Save($data)
	{
		return $this->db->insert($this->table, $data);
	}
}
