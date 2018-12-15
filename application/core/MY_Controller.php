<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    public function get_hash($user_id, $link_id)
    {
        $hashids = new Hashids\Hashids('this is my salt', 8);
        $result = $hashids->encode($user_id, $link_id);
        // $numbers = $hashids->decode($id);
        return $result;
    }

    public function url_hash($hash)
    {
        $result = base_url().'api/go/'.$hash;
        return $result;
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
    
    public function generate_json($status, array $response)
    {
        $this->output
            ->set_status_header($status)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

}