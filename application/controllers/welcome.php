<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {

	public function index1()
	{
		$this->load->view('welcome_message');
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function check_login()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->load->model('user_model');
		$result=$this->user_model->get_by_name_pwd($username,$password);
		if($result){
			$this->session->set_userdata('logindata',$result);
			redirect('welcome/index');
		}else{
			echo"hahaha";
		}
	}
	public function reg()
	{
		$this->load->view('reg');
	}
	public function check_name()
	{
		$name=$this->input->get('uname');
		$this->load->model('user_model');
		$result=$this->user_model->get_by_name_name($name);
		if($result){
			echo 'fail';
		}else{
			echo 'success';
		}
	}
	public function do_reg()
	{

		$email=$this->input->post('email');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$gender=$this->input->post('gender');
		//$province=$this->input->post('province');
		//$city=$this->input->post('city');
		$this->load->model('user_model');
		$row=$this->user_model->save($email,$username,$password,$gender);
		if($row>0){
			redirect('welcome/login');

		}else{
			$this->load->view('reg');
		}
	}
	public function index()
	{
		$loginID = $this -> session -> userdata('logindata');
		$user_id = $loginID -> user_id;
		$this -> load -> model('article_model');
		$article = $this -> article_model -> get_ariticles_by_user($user_id);
		$type = $this -> article_model -> get_types_by_user($user_id);
		$this->load->view('index', array(
				'articles' => $article,
				'types' => $type,
		));

	}
	public function logout()
	{
		$this->session->unset_userdata('logindata');
		$this->load->view('login');
	}

}
