<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Obat_model');
		$this->load->model('Signa_model');
		$this->load->model('Racikan_model');
		$this->load->model('Transaksi_model');
	}

	public function index()
	{
		$data = array(
			'page' => 'dashboard',
			'title' => 'Dashboard',
			'list_obat' => $this->Obat_model->getAll(),
			'list_signa' => $this->Signa_model->getAll(),
			'list_lbl_racikan' => $this->Racikan_model->getAll_label(),
			'list_transaksi' => $this->Transaksi_model->getAll(),
			'list_racikan' => $this->Racikan_model->getAll()
		);
		$this->load->view('layouts/user', $data);
	}

	public function BuatTransaksi()
	{
		switch ($this->input->post('transaksi_jenis_racikan')) {
			case 'NON RACIKAN':
				$this->Transaksi_model->Save($this->input->post());
				$this->Obat_model->StokKurang($this->input->post('racikan_obatalkes_kode'), $this->input->post('racikan_qty'));
				$this->session->set_flashdata('act', Action('success', 'Transaksi resep obat non racikan berhasil disimpan.'));
				break;
			case 'RACIKAN':
				$this->Transaksi_model->Save($this->input->post());
				$list_racikan = $this->Racikan_model->getWhereLabel($this->input->post('transaksi_racikan_kode'));
				foreach ($list_racikan as $list) {
					$this->Obat_model->StokKurang($list->racikan_obatalkes_kode, $list->racikan_qty);
				}
				$this->session->set_flashdata('act', Action('success', 'Transaksi resep obat racikan berhasil disimpan.'));
				break;
			default:
				# code...
				break;
		}
		redirect('user/dashboard');
		//echo json_encode($this->Racikan_model->getWhereLabel($this->input->post('transaksi_racikan_kode')));
	}
}
