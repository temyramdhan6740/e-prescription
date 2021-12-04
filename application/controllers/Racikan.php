<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Racikan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_model');
		$this->load->model('Signa_model');
		$this->load->model('Racikan_model');
	}

	public function index()
	{
		$data = array(
			'page' => 'racikan',
			'title' => 'Buat Racikan',
			'list_obat' => $this->Obat_model->getAll(),
			'list_signa' => $this->Signa_model->getAll(),
			'list_lbl_racikan' => $this->Racikan_model->getAll_label()
		);
		$this->load->view('layouts/user', $data);
	}

	public function BuatLabelRacikan()
	{
		$this->Racikan_model->SaveLabel($this->input->post());
		$this->session->set_flashdata('act', Action('success', 'Label racikan berhasil disimpan.'));
		redirect('user/racikan');
		//echo json_encode($this->input->post());
	}

	public function BuatRacikan()
	{
		$this->Racikan_model->Save($this->input->post());
		//$this->Obat_model->StokKurang($this->input->post('racikan_obatalkes_kode'), $this->input->post('racikan_qty'));
		$this->session->set_flashdata('act', Action('success', 'Racikan berhasil disimpan.'));
		redirect('user/racikan');
		//echo $this->Obat_model->StokKurang($this->input->post('racikan_obatalkes_kode'), $this->input->post('racikan_qty'));
		//echo json_encode($this->input->post());
	}

	public function GetStok($where)
	{
		$stok = (int)$this->Obat_model->getStok($where);
		echo 'Sisa stok tersedia : <b>' . $stok . '</b>';
	}
}
