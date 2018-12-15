<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller {

	function __construct()
    {
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
    }

	function getLocationData($url) {
		$ch = curl_init();
		$timeout = 5;
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}

	function getLocation($ipOfUser)
	{
		$res = file_get_contents('https://www.iplocate.io/api/lookup/'.$ipOfUser);
		$res = json_decode($res);
		var_dump($res);
	}

	public function go($hash = '')
    {
		$url_hash = $this->url_hash($hash);
		$query = $this->Common_model->get_where('links', array('output_url' => $url_hash));
		if($query->num_rows() == 0) $status = 404;
		else{
			$sql = $query->result();
			$data = array(
				'link_id' => $sql[0]->id,
				'ip_address' => $this->input->ip_address(),
				'country' => 'tes country',
				'click_at' => date("Y-m-d H:i:s")
			);

			$insert_id = $this->Common_model->insert('log_click', $data);
			redirect($sql[0]->input_url, 'refresh');
		}
	}

	private function auth(array $data)
	{
		$query = $this->Common_model->get_where('users', $data);
		$data = $query->result();
		if($query->num_rows() >= 1) {
			$this->session->set_userdata('user_id', $data[0]->id);
			$data = array(
				'status' => 200,
				'user_id' => $data[0]->id,
				'username' => $data[0]->username,
				'passhash' => $data[0]->passhash
			);
			return $data;
		}
		else {
			$this->generate_json(401, array('content' => 'unauthorized'));
		}
	}

	public function getpasshash()
	{
		$_POST = json_decode(file_get_contents("php://input"), true);
		$data = array(
			'username' => $_POST['username'],
			'password' => md5($_POST['password']));
		$data = $this->auth($data);
		
		$response = array(
			'status' => 'verified',
			'username' => $data['username'],
			'passhash' => $data['passhash'],
			'user_id' => $data['user_id']
		);
		$this->generate_json(200, $response);
	}

	public function store(array $data)
	{
		$insert_id = $this->Common_model->insert('links', $data);

		$hash = $this->get_hash($data['user_id'], $insert_id);
		$output_url = $this->url_hash($hash);

		$data = array(
			'output_url' => $output_url,
			'last_update' => date("Y-m-d H:i:s")
		);
		$this->Common_model->update('links', $data, $insert_id);
	}

	public function delete()
	{
		$_POST = json_decode(file_get_contents("php://input"), true);
		$data = array('username' => $_POST['username'],'passhash' => $_POST['passhash']);
		$data = $this->auth($data);

		$param = array('id' => $_POST['link_id'], 'user_id' => $data['user_id']);
		$this->Common_model->delete('links', $param);
		$this->generate_json(200, array('content' => 'data has been deleted'));
	}

	public function check_insert()
	{
		$query = $this->Common_model->cek_insert();
		$this->form_validation->set_message('check_insert', 'The {field} has taken');
		if ($query->num_rows() > 0) return FALSE;
		else return TRUE;
    }

	public function add()
	{
		$_POST = json_decode(file_get_contents("php://input"), true);
		$data = array('username' => $_POST['username'],'passhash' => $_POST['passhash']);
		$data = $this->auth($data);

		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('url', 'Long URL', 'required|valid_url|callback_check_insert');
		
		if($this->form_validation->run() == FALSE) { 
			$error = $this->output->set_output(validation_errors());
			$response = array('error' => $error);
			$this->generate_json(500, $response);
		}
		else{
			$data = array(
				'title' => $_POST['title'],
				'input_url' => $_POST['url'],
				'user_id' => $data['user_id'],
				'last_update' => date("Y-m-d H:i:s")
			);
			$this->store($data);
			
			$response = array('content' => 'data has been added');
			$this->generate_json(200, $response);
		}
	}

	public function check_update()
	{
		$query = $this->Common_model->check_update();
		$this->form_validation->set_message('check_update', 'The {field} has taken');
		if ($query->num_rows() > 0) return FALSE;
		else return TRUE;
    }

	public function set()
	{
		$_POST = json_decode(file_get_contents("php://input"), true);
		$data = array('username' => $_POST['username'],'passhash' => $_POST['passhash']);
		$data = $this->auth($data);

		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('url', 'Long URL', 'required|valid_url|callback_check_update');
		
		if($this->form_validation->run() == FALSE) { 
			$error = $this->output->set_output(validation_errors());
			$response = array('error' => $error);
			$this->generate_json(500, $response);
		}
		else{
			$hash = $this->get_hash($data['user_id'], $_POST['link_id']);
			$output_url = $this->url_hash($hash);
			$data = array(
				'input_url' => $_POST['url'],
				'output_url' => $output_url,
	            'title' => $this->input->post('title'),	            
	            'last_update' => date("Y-m-d H:i:s")
        	);
			$this->Common_model->update('links', $data, $_POST['link_id']);
			
			$response = array('content' => 'Data has been updated');
			$this->generate_json(200, $response);
		}
	}

	public function get()
	{
		$_POST = json_decode(file_get_contents("php://input"), true);
		$data = array('username' => $_POST['username'],'passhash' => $_POST['passhash']);
		$data = $this->auth($data);

		$param = array('user_id' => $data['user_id']);
		$total_rows = $this->Common_model->get_where('links', $param);

		$config['base_url'] = base_url().'/api/get';
		$config['total_rows'] = $total_rows->num_rows();
		$config['per_page'] = 2;
		$this->pagination->initialize($config);
		$pagination = $this->pagination->create_links();

		$query = $this->Common_model->get_limit('links', $param, $config['per_page'],$this->uri->segment(3));
		if($query->num_rows()==0){
			$response = array('content' => 'Data not found');
			$this->generate_json(500, $response);
		}
		else{
			$data = $query->result();
			$response = array(
				'input_url' => $data[0]->input_url,
				'output_url' => $data[0]->output_url,
				'title' => $data[0]->title,
				'link_id' => $data[0]->id,          
				'last_update' => date("d F Y H:i", strtotime($data[0]->last_update)),
				'pagination' => $pagination
			);
			$this->generate_json(200, $response);
		}
	}


}
