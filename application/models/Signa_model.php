<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Signa_model extends CI_Model
{
	public $table = 'signa_m';
	
	function __construct()
    {
        parent::__construct();
    }

	public function getAll()
	{
		$this->db->order_by('signa_nama', 'ASC');
        return $this->db->get($this->table)->result();
	}
}
