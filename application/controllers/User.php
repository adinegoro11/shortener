<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends MY_Controller {

	function __construct()
    {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
     
    }

	public function index()
    {
		if($this->session->userdata('user_id')==NULL) redirect('login/index','refresh');
		$param = array(
			'id' => $this->session->userdata('user_id')
		);
		$query = $this->Common_model->get_where('users', $param);
		$data['query'] = $query->result();
		$data['isi'] = 'users/v_index';
		$this->load->view('layout',$data);	
	}

	public function sign_up()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('pass2', 'Password Re-type', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE){
			$this->load->view('users/v_signup');
		}
		else{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
			$user_id = $this->Common_model->insert('users', $data);
			$hash = $this->get_hash($user_id, 0);
			$output_url = $this->url_hash($hash);

			$data = array('passhash' => $output_url);
			$this->Common_model->update('users', $data, $user_id);
			redirect('login/index','refresh');
		}
	}
	
}
