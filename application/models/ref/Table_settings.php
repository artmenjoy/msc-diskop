<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table_settings extends CI_Model
{
    private $table="ref_settings";

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
		$result = array();
        $data = $this->db->get($this->table)->result();

		if($data){
			foreach ($data as $d) {
				$result[$d->slug] = $d;
			}
		}

		return $result;

    }

    public function add($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->row();
    }

    public function result($id)
    {
        $this->db->where($id);
        return $this->db->get($this->table)->result();
    }

    public function update($id, $data)
    {
        $this->db->where($id);
        $this->db->update($this->table,$data);
    }

    public function delete($id)
    {
        $this->db->where($id);
        $this->db->delete($this->table);
    }
    
}
