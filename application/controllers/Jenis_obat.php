<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_obat extends CI_Controller {
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
        $this->data['jns']=$this->Obat_model->getJenis();
		$this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('jenis_obat/index',$this->data);
        $this->load->view('template/footer');
	}
    public function add()
	{   
        
        $this->form_validation->set_rules('nama_jenis_obat','Nama Jenis Obat','required');
        if($this->form_validation->run() ==FALSE){

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('jenis_obat/add');
            $this->load->view('template/footer');
        }else{
            $this->Obat_model->addJenis();
            $this->session->set_flashdata('message',' Data Jenis Obat Berhasil <b>Ditambahkan</b>');
            redirect('jenis_obat');
        }
    }
    public function edit($id)
	{   
        $this->data['jns']=$this->Obat_model->getDataJenisId($id);
        
        $this->form_validation->set_rules('nama_jenis_obat','Nama Jenis Obat','required');
        if($this->form_validation->run() ==FALSE){

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('jenis_obat/edit',$this->data);
            $this->load->view('template/footer');
        }else{
            $this->Obat_model->editJenis();
            $this->session->set_flashdata('message','Data Jenis Obat berhasil <b>Diubah</b>');
            redirect('jenis_obat');
        }
    }
    public function hapus($id)
    {
        $this->Obat_model->hapusJenis($id);
        $this->session->set_flashdata('message','Data Jenis Obat Berhasil <b>Dihapus</b>');
        redirect('jenis_obat');
    }
    public function yt(){
        $this->load->view('yt');
    }
}