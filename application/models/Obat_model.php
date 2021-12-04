<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Obat_model extends CI_Model
{
	public $table = 'obatalkes_m';
	
	function __construct()
    {
        parent::__construct();
    }

	public function getAll()
	{
		$this->db->order_by('obatalkes_nama', 'ASC');
        return $this->db->get($this->table)->result();
	}

	public function getStok($where)
	{
		$this->db->where('obatalkes_kode', $where);
		$q = $this->db->get($this->table)->result();
		foreach ($q as $query) {
			return $query->stok;
		}
	}

	public function StokKurang($where, $qty)
	{
		$this->db->where('obatalkes_kode', $where);
		$q = $this->db->get($this->table)->result();
		foreach ($q as $query) {
			$stok_kurang = $query->stok - $qty;
			$this->db->where('obatalkes_kode', $where);
			$this->db->update($this->table, array('stok' => $stok_kurang));
		}
	}
}
