<?php
class User extends CI_Controller{
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
        $this->data['usr']=$this->Obat_model->getUser();
		$this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('user/index',$this->data);
        $this->load->view('template/footer');
	}
    public function add()
	{   
        // $this->data['usr']=$this->Obat_model->getUser();
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('fullname','Fullname','required');
        $this->form_validation->set_rules('is_active','Is Active','required');
        if($this->form_validation->run() ==FALSE){

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('user/add');
            $this->load->view('template/footer');
        }else{
            $this->Obat_model->addUser();
            $this->session->set_flashdata('message',' Data User Berhasil <b>Ditambahkan</b>');
            redirect('user');
        }
    }
    public function hapus($id){
        $this->Obat_model->hapusUser($id);
        $this->session->set_flashdata('message','Data User Berhasil <b>Dihapus</b>');
        redirect('user');
    }
    public function edit($id)
	{   
        $this->data['user']=$this->Obat_model->DataUserId($id);
        // $this->data['jns']=$this->Obat_model->getJenis();
        $this->form_validation->set_rules('username','Username','required');
        // $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('fullname','Fullname','required');
        $this->form_validation->set_rules('is_active','Is Active','required');
        if($this->form_validation->run() ==FALSE){

            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('user/edit',$this->data);
            $this->load->view('template/footer');
        }else{
            $this->Obat_model->editUser();
            $this->session->set_flashdata('message','Data User Berhasil <b>Diubah</b>');
            redirect('user');
        }
    }
}