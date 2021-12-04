<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Racikan_model extends CI_Model
{
	public $table = 'racikan_m';
	public $table2 = 'label_racikan_m';

	function __construct()
	{
		parent::__construct();
	}

	public function getAll_label()
	{
		$this->db->order_by('label_racikan_nama', 'ASC');
		return $this->db->get($this->table2)->result();
	}

	public function getAll()
	{
		$this->db->join($this->table2, 'label_racikan_m.label_racikan_kode = racikan_m.racikan_label_kode');
		$this->db->join('obatalkes_m', 'obatalkes_m.obatalkes_kode = racikan_m.racikan_obatalkes_kode');
		$this->db->join('signa_m', 'signa_m.signa_kode = racikan_m.racikan_signa_kode');
		$this->db->group_by('label_racikan_kode');
		$this->db->order_by('label_racikan_nama', 'ASC');
		return $this->db->get($this->table)->result();
	}

	public function getWhereLabel($where)
	{
		$this->db->join($this->table2, 'label_racikan_m.label_racikan_kode = racikan_m.racikan_label_kode');
		$this->db->join('obatalkes_m', 'obatalkes_m.obatalkes_kode = racikan_m.racikan_obatalkes_kode');
		$this->db->join('signa_m', 'signa_m.signa_kode = racikan_m.racikan_signa_kode');
		//$this->db->group_by('label_racikan_kode');
		$this->db->order_by('label_racikan_nama', 'ASC');
		$this->db->where('racikan_label_kode', $where);
		return $this->db->get($this->table)->result();
	}

	public function SaveLabel($data)
	{
		return $this->db->insert($this->table2, $data);
	}

	public function Save($data)
	{
		return $this->db->insert($this->table, $data);
	}
}
