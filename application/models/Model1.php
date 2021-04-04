<?php
/**
 * 
 */
class Model1 extends CI_Model
{
	function insert_model($data)
	{
		return $this->db->insert("login",$data);
	}

	function show_model()
	{
		$qry=$this->db->get("login");
		return $qry->result();
	}
	
	function edit_model($id)
	{
		$qry=$this->db->get_where("login",array("id"=>$id));
		return $qry->result();
	}

	function update_model($id,$name,$email,$pic)
	{
		$this->db->where("id",$id);
		return $this->db->update("login",array("name"=>$name,"email"=>$email,"pic"=>$pic));
	}
}
?>