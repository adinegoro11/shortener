<?php
class Common_model extends CI_Model {

	public function get_where($table, $where)
	{
		$query = $this->db->get_where($table, $where);
		return $query;
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function update($table, $data, $id)
	{
		$this->db->update($table, $data, array('id' => $id));
	}

	public function delete($table, $param)
	{
		$this->db->delete($table, $param);
	}

	public function cek_insert()
	{
		$this->db->select('*');
		$this->db->from('links');
		$this->db->join('users', 'users.id = links.user_id');
		$this->db->where('users.username', $this->input->post('username'));
		$this->db->where('links.input_url', $this->input->post('link'));
		$query = $this->db->get();
		return $query;
	}

	public function check_update()
	{
		$this->db->select('*');
		$this->db->from('links');
		$this->db->join('users', 'users.id = links.user_id');
		$this->db->where('users.username', $this->input->post('username'));
		$this->db->where('links.input_url', $this->input->post('link'));
		$this->db->where_not_in('links.id', $this->input->post('link_id'));
		$query = $this->db->get();
		return $query;
	}

	public function get_limit($table, $param, $limit, $offset)
	{
		$query = $this->db->get_where($table, $param, $limit, $offset);
		return $query;
	}

	public function hitung($user_id)
	{
		$this->db->select('COUNT(link_id)AS jumlah, link_id, title, input_url, output_url');
		$this->db->from('log_click');
		$this->db->join('links', 'links.id = log_click.link_id');
		$this->db->where('links.user_id', $user_id);
		$this->db->group_by('log_click.link_id');
		$this->db->order_by('jumlah', 'DESC');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query;
	}

}