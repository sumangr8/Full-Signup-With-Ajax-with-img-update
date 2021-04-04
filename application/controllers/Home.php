<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function index()
	{
		$this->load->view('home');
	}

	function insert()
	{
		$this->load->library('upload');
		$name=$this->input->post("name");
		$email=$this->input->post("email");
		$password=$this->input->post("password");
		$mobile=$this->input->post("mobile");
		$gender=$this->input->post("gender");
		$date=$this->input->post("date");
		$qualification=implode(",",$this->input->post("qualification"));

		$config['upload_path'] = './img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->upload->initialize($config);
        $this->upload->do_upload('pic');
        $data=$this->upload->data();
        $pic=$data["file_name"];
        $data=array(
        	"name"=>$name,
        	"email"=>$email,
        	"password"=>$password,
        	"mobile"=>$mobile,
        	"gender"=>$gender,
        	"pic"=>$pic,
        	"date"=>$date,
        	"qualification"=>$qualification
        );
        $this->Model1->insert_model($data);

	}


	function show()
	{
		$qry=$this->Model1->show_model();
		echo json_encode($qry);
	}

	function edit()
	{
		$id=$this->input->post("id");
		$qry=$this->Model1->edit_model($id);
		echo json_encode($qry);
	}

	function update()
	{
		$id=$this->input->post("id");
		$name=$this->input->post("name");
		$email=$this->input->post("email");
		$old_pic=$this->input->post("old_pic");

        if(empty($_FILES["new_pic"]["name"]))
        {
        	$pic=$old_pic;
        }
        else
        {
        	$this->load->library('upload');
			$config['upload_path'] = './img/';
	        $config['allowed_types'] = 'gif|jpg|png';
	        $this->upload->initialize($config);
	        $this->upload->do_upload('new_pic');
	        $data=$this->upload->data();
	        echo $pic=$data["file_name"];
        }
        $this->Model1->update_model($id,$name,$email,$pic);

	}

	
}
