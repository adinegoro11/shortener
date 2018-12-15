<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
    	parent::__construct();
    }

	public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE){
			$this->load->view('login/v_index');
		}
		else{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
			$this->check($data);
		}
	}

	private function check(array $data)
	{
		$query = $this->Common_model->get_where('users', $data);
		if($query->num_rows() >= 1){

			foreach ($query->result() as $row){
				$user_id = $row->id;
				$username = $row->username;
			}
			$data = array('user_id' => $user_id, 'username' => $username);
			$this->session->set_userdata($data);
			redirect('link/index','refresh');	
		} 
		else{
			$this->session->set_flashdata('login', 1);
			redirect('login/index','refresh');
		} 
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login/index','refresh');
	}
	

}
