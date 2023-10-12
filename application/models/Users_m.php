<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_m extends CI_Model{
    public $table = 'users';
    public $id = 'userid';
    public $order = 'DESC';

    function __construct(){
        parent::__construct();
    }

    // get all
    function get_all(){
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id){
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('userid', $q);
	$this->db->or_like('pengadilan_id', $q);
	$this->db->or_like('fullname', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('has_change_password', $q);
	$this->db->or_like('group', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('block', $q);
	$this->db->or_like('diinput_oleh', $q);
	$this->db->or_like('diinput_tanggal', $q);
	$this->db->or_like('diedit_oleh', $q);
	$this->db->or_like('diedit_tanggal', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('userid', $q);
	$this->db->or_like('pengadilan_id', $q);
	$this->db->or_like('fullname', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('nip', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('has_change_password', $q);
	$this->db->or_like('group', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('block', $q);
	$this->db->or_like('diinput_oleh', $q);
	$this->db->or_like('diinput_tanggal', $q);
	$this->db->or_like('diedit_oleh', $q);
	$this->db->or_like('diedit_tanggal', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table, $data);
    }

}

