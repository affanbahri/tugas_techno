<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
       $this->load->model('Obat_model');
	   $this->load->model('auth_model');
       $this->load->library('form_validation');
	   if(!$this->auth_model->current_user()){
		redirect('auth');
		}
    }
	public function index()
	{
		$this->data['jns']=$this->db->count_all_results('tb_jenis_obat');
		$this->data['obt']=$this->db->count_all_results('tb_obat');
		$this->data['expired']=$this->db->query("SELECT count(id_obat) as id  from tb_obat  where tanggal_expired < CURRENT_DATE ")->row()->id;
		$this->data['no_expired']=$this->db->query("SELECT count(id_obat) as id  from tb_obat  where tanggal_expired > CURRENT_DATE ")->row()->id;
		$this->data['user']=$this->db->count_all_results('tb_user');
		$this->data['active']=$this->db->query("SELECT count(id_user) as id  from tb_user  where is_active='Aktif' ")->row()->id;
		$this->data['no_active']=$this->db->query("SELECT count(id_user) as id  from tb_user  where is_active='Tidak aktif' ")->row()->id;
		$this->data['Obt']=$this->Obat_model->getObat();
		$this->data['fll'] = $this->auth_model->fullname();
		$this->load->view('template/header');
        $this->load->view('template/navbar',$this->data);
        $this->load->view('template/dashboard',$this->data);
        $this->load->view('template/footer');
	}
}
