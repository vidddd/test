<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Util_model extends CI_Model {

	public function select_where($table,$wheres=array()){
		$this->db->select('*');
		$this->db->from($table);
		foreach ($wheres as $key => $value) {
			$this->db->where($key, $value);
		}
		$q=$this->db->get();
		return $q->result();
	}

	public function select_field($table,$id,$field_name){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id', $id);
		$row=$this->db->get()->row();
		return $row->$field_name;
	}
	public function select_row($table,$id){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('id', $id);
		return  $this->db->get()->row();	
	}
	public function save_table($fields,$table,$return=true) {
        $data=new stdClass();
        foreach ($fields as $key => $value) {
            $data->$key=$value;
        }
        if($this->db->insert($table,$data)){
            if($return){
                return $this->db->insert_id();
            }else{
              return true;  
            }
            
        }else{
            return false; 
        } 
    }
	public function edit_table($fields,$id,$table) {
        $data=new stdClass();
        foreach ($fields as $key => $value) {
            $data->$key=$value;
        }
        $this->db->where('id',$id);
        if($this->db->update($table,$data)){
            return $id;  
        }else{
            return false; 
        } 
    }

    public function edit_where($fields,$wheres,$table) {
        $data=new stdClass();
        foreach ($fields as $key => $value) {
            $data->$key=$value;
        }
        foreach ($wheres as $key => $value) {
            $this->db->where($key, $value);
        }
        if($this->db->update($table,$data)){
            return true;  
        }else{
            return false; 
        } 
    }

    public function delete_table($id,$table) {
        $this->db->where('site',$id);
        if($this->db->delete($table)){
            return $id;  
        }else{
            return false; 
        } 
    }
}