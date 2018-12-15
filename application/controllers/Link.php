<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends MY_Controller {

	function __construct()
    {
		parent::__construct();
		if($this->session->userdata('user_id')==NULL) redirect('login/index','refresh');
		date_default_timezone_set("Asia/Jakarta");
    }

	public function index()
	{
		$param = array(
			'user_id' => $this->session->userdata('user_id')
		);

		$data['query'] = $this->Common_model->get_where('links', $param);
		$data['isi'] = 'links/v_index';
		$this->load->view('layout',$data);	
	}

	public function hitung()
	{
		$data['hitung'] = $this->Common_model->hitung($this->session->userdata('user_id'));
		$data['isi'] = 'links/v_hitung';
		$this->load->view('layout',$data);	
	}

	public function add()
    {
		$user_id = $this->session->userdata('user_id');

		$this->form_validation->set_rules('input_url', 'Input URL', 'required|valid_url|callback_check_link');
		$this->form_validation->set_rules('title', 'Title', 'required|min_length[3]');
        if ($this->form_validation->run() == FALSE){
			$data['isi'] = 'links/v_add';
			$this->load->view('layout', $data);
		}
		else{
			$data = array(
				'input_url' => $this->input->post('input_url'),
				'title' => $this->input->post('title'),
				'user_id' => $user_id,
				'last_update' => date("Y-m-d H:i:s")
			);
			$insert_id = $this->Common_model->insert('links', $data);

			$hash = $this->get_hash($user_id, $insert_id);
			$output_url = $this->url_hash($hash);

			$data = array(
				'output_url' => $output_url,
				'last_update' => date("Y-m-d H:i:s")
			);
			$this->Common_model->update('links', $data, $insert_id);
			redirect('link/index','refresh');
		}
	}

	public function check_link()
	{
		$data = array(
			'user_id' => $this->session->userdata('user_id'),
			'input_url' => $this->input->post('input_url')
		);
		$query = $this->Common_model->get_where('links', $data);
		$this->form_validation->set_message('check_link', 'The {field} has taken');
		if ($query->num_rows() > 0) return FALSE;
		else return TRUE;
	}

	public function set($id = '')
	{
		$id = $this->uri->segment(3);
		$this->form_validation->set_rules('input_url', 'Input URL', 'required|valid_url');
		$this->form_validation->set_rules('title', 'Title', 'required|min_length[3]');		

		if ($this->form_validation->run() == FALSE)
		{
			if(empty($id)) $id = $this->input->post('id');
			$query = $this->Common_model->get_where('links', array('id'=> $id));
			$data['query'] = $query->result(); 
			$data['id'] = $id;
			$data['isi'] = 'links/v_set';
			$this->load->view('layout',$data);
		}
		else
		{
			$user_id = $this->session->userdata('user_id');
			$hash = $this->get_hash($user_id, $id);
			$output_url = $this->url_hash($hash);

			$data = array(
				'input_url' => $this->input->post('input_url'),
				'output_url' => $output_url,
	            'title' => $this->input->post('title'),	            
	            'last_update' => date("Y-m-d H:i:s")
        	);

			$this->Common_model->update('links', $data, $id);
			redirect('link/get/'.$id,'refresh');
		}
	}	

	public function delete($id)
	{
		$this->db->delete('links', array('id' => $id));
		redirect('link/index','refresh');
	}

	public function get($id)
	{
		$user_id = $this->session->userdata('user_id');
		$query = $this->Common_model->get_where('links', array('id' => $id, 'user_id' => $user_id));

		if($query->num_rows() == 0){
			$this->session->set_flashdata('status', 'Not Found');
			redirect('link/index','refresh');
		}

		else{
			$data['header'] = $query->result();
			$data['query'] = $this->Common_model->get_where('log_click', array('link_id' => $id));
			$data['isi'] = 'links/v_get';
			$this->load->view('layout',$data);	
		}

	}



}
