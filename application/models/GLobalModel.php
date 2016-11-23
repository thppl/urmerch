<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GlobalModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
	private $table_prefix = "";

	public function get($table){
		$this->load->database();
		$result = $this->db->get($this->table_prefix."".$table);
		$this->db->close();
		return $result;
	}
	public function select($condition, $table){
		$this->load->database();
		$this->db->where($condition);
		$result = $this->db->get($this->table_prefix."".$table);
		$this->db->close();
		return $result;
	}
	public function insert($data, $table){
		$this->load->database();
		$result = $this->db->insert($this->table_prefix."".$table, $data);
		$this->db->close();
		return $result;
	}
	public function update($condition, $data, $table){
		$this->load->database();
		$this->db->where($condition);
		$result = $this->db->update($this->table_prefix."".$table, $data);
		$this->db->close();
		return $result;
	}
	public function delete($condition, $table){
		$this->load->database();
		$this->db->where($condition);
		$result = $this->db->delete($this->table_prefix."".$table);
		$this->db->close();
		return $result;
	}
	public function rawQuery($query){
		$this->load->database();
		$result = $this->db->query($query);
		$this->db->close();
		return $result;
	}
}