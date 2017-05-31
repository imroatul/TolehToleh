<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modelku extends CI_Model {
	public function getAdmin($table)
	{
		$data = $this->db->get($table);
		return $data->result_array();
	}
}