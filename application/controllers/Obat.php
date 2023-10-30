<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Obat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
       $this->load->model('Obat_model');
       $this->load->library('form_validation');
       $this->load->model('auth_model');
	   if(!$this->auth_model->current_user()){
		redirect('auth');
		}
    }

	public function index()
	{
        $this->data['Obt']=$this->Obat_model->getObat();
		$this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('obat/index',$this->data);
        $this->load->view('template/footer');
	}
    public function add()
	{   
        $this->data['jns']=$this->Obat_model->getJenis();
        $this->form_validation->set_rules('id_jenis_obat','Jenis Obat','required');
        $this->form_validation->set_rules('nama_obat','Nama Obat','required');
        $this->form_validation->set_rules('harga','Harga Obat','required');
        $this->form_validation->set_rules('stok','Stok Obat','required');
        $this->form_validation->set_rules('tanggal_expired','Tanggal Expired','required');
        if($this->form_validation->run() ==FALSE){

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('obat/add',$this->data);
            $this->load->view('template/footer');
        }else{
            $this->Obat_model->addObat();
            $this->session->set_flashdata('message',' Data Obat Berhasil <b>Ditambahkan</b>');
            redirect('obat');
        }
    }
    public function hapus($id)
    {
        $this->Obat_model->hapusObat($id);
        $this->session->set_flashdata('message','Data Obat Berhasil <b>Dihapus</b>');
        redirect('obat');
    }
    public function edit($id)
	{   
        $this->data['obt']=$this->Obat_model->DataObatId($id);
        $this->data['jns']=$this->Obat_model->getJenis();
        $this->form_validation->set_rules('id_jenis_obat','Jenis Obat','required');
        $this->form_validation->set_rules('nama_obat','Nama Obat','required');
        $this->form_validation->set_rules('harga','Harga Obat','required');
        $this->form_validation->set_rules('stok','Stok Obat','required');
        $this->form_validation->set_rules('tanggal_expired','Tanggal Expired','required');
        if($this->form_validation->run() ==FALSE){

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('obat/edit',$this->data);
            $this->load->view('template/footer');
        }else{
            $this->Obat_model->editObat();
            $this->session->set_flashdata('message','Data Obat Berhasil <b>Diubah</b>');
            redirect('obat');
        }
    }
}