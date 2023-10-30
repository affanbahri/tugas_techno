<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('auth_model');
    }

	public function index()
	{
		$this->load->library('form_validation');

		$rules = $this->auth_model->rules();
		$this->form_validation->set_rules($rules);

		if($this->form_validation->run() == FALSE){
			return $this->load->view('auth/login_form');
		}

		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if($this->auth_model->login($username, $password))
        {
            $fullname_data = $this->auth_model->fullname(); // Mendapatkan fullname dari model

            if (!empty($fullname_data)) {
                $fullname = $fullname_data['nama'];
            } else {
                $fullname = 'Tidak Ditemukan';
            }
            // echo "<pre>";
            // print_r($fullname);
            // die;
            $this->session->set_flashdata('message', "<div class='alert alert-info'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4 style='margin-top: 5px; text-align: center;'> <i class='icon fa fa-user'></i> SELAMAT DATANG <b>$fullname</b></h4>
            </div>");

			redirect('dashboard/index');
		} else {
			$this->session->set_flashdata('message_login_error', 'Login Gagal, pastikan username password benar dan akun anda sudah aktif!');
		}

		$this->load->view('auth/login_form');
	}
    public function register()
    {
        
        $this->load->view('auth/register');
    }
    public function processRegistration() {
        // Ambil data dari formulir pendaftaran
        $data = array(
            'username' => $this->input->post('username'),
            'fullname' => $this->input->post('fullname'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Simpan password yang di-hash
            'is_active' => 'Tidak Aktif' 
        );

        // Panggil model untuk menyimpan data pengguna
        $userId = $this->auth_model->registerUser($data);

        if ($userId) {
            // Registrasi berhasil
            // Anda dapat melakukan pengalihan ke halaman lain atau menampilkan pesan sukses di sini
            redirect('auth'); 
        } else {
            $this->session->set_flashdata('message_login_error', 'Register Gagal!');
            $this->load->view('auth/register');

        }
    }
    // public function store()
    // {
    //     $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[1]|max_length[255]');
    //     $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]|max_length[255]');
    //     $this->form_validation->set_rules('fullname', 'fullname', 'trim|required|min_length[1]|max_length[255]');
    //     if ($this->form_validation->run() == true) {
    //         $username = $this->input->post('username');
    //         $password = $this->input->post('password');
    //         $fullname = $this->input->post('fullname');
    //         $data_user = array(
    //             'username' => $username,
    //             'password' => password_hash($password, PASSWORD_DEFAULT),
    //             'fullname' => $fullname,
    //             'is_active' => 'NO'
    //         );
    //         $this->db->insert('tb_user', $data_user);
    //         $this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
    //         redirect('auth/login');
    //     } else {
    //         $this->session->set_flashdata('errors', validation_errors());
    //         // var_dump($_SESSION['errors']);
    //         redirect('auth/register');
    //     }
        
    // }

	public function logout()
	{
		$this->auth_model->logout();
		redirect('auth');
	}
}