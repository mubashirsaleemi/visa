<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hildes extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	**/

	public function __construct()
	{
	        parent::__construct();
	        error_reporting(0);
	        $this->load->database();
	        $this->load->model('Model_functions','model');
	        $this->load->helper(array('form', 'url'));
	        $this->load->library('session');
	}

	/**
	*

		@HATH NA LAIE

	*
	*/
	public function template($page = '', $data = '')
	{
		$data['services'] = $this->model->services('active');
		$data['setting'] = $this->model->setting(1);
		$data['blog'] = $this->model->blog();
		$data['page_setting'] = $this->model->get_page_setting_byid(1);
		$this->load->view('header',$data);
		$this->load->view($page,$data);
		$this->load->view('footer',$data);
	}
	/**
	*

		@START

	*
	*/
	public function index()
	{

		$data['slider'] = $this->model->slider();
		$data['about'] = $this->model->get_page_byid(2);
		$data['page'] = $this->model->get_page_byid(1);
		$data['about'] = $this->model->get_page_byid(2);
		$data['portfolio'] = $this->model->portfolio('all');
		$data['gallery'] = $this->model->gallery();
		$data['type'] = $this->model->service_type();
		$data['reviews'] = $this->model->reviews('all');
		$data['team'] = $this->model->team();
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('index', $data);
	}
	/**
	*
	*
	*	@PAGEs
	*
	*/
	public function about_us()
	{
		$data['page'] = $this->model->get_page_byid(2);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('page', $data);
	}
	public function privacy_policy()
	{
		$data['page'] = $this->model->get_page_byid(3);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('page', $data);
	}
	public function terms()
	{
		$data['page'] = $this->model->get_page_byid(4);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('page', $data);
	}
	public function contact_us()
	{
		$data['page'] = $this->model->get_page_byid(5);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('contact_us', $data);
	}
	public function team()
	{
		$data['team'] = $this->model->team();
		$data['page'] = $this->model->get_page_byid(10);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page']['meta_desc'];
		$this->template('team', $data);
	}
	/**
	*
	*
	*	@PRODUCT/LISTING
	*
	*/
	public function portfolio()
	{
		$data['portfolio'] = $this->model->portfolio('all');
		$data['page'] = $this->model->get_page_byid(12);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page ']['meta_desc'];
		$this->template('portfolio', $data);
	}
	public function services()
	{
		$data['page'] = $this->model->get_page_byid(9);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page ']['meta_desc'];
		$this->template('services', $data);
	}
	public function service($slug = '')
	{
		$data['service'] = $this->model->get_service_byslug($slug);
		$data['meta_title'] = $data['service']['meta_title'];
		$data['meta_key'] = $data['service']['meta_key'];
		$data['meta_desc'] = $data['service ']['meta_desc'];
		$this->template('service', $data);
	}
	public function blogs()
	{
		$data['page'] = $this->model->get_page_byid(11);
		$data['meta_title'] = $data['page']['meta_title'];
		$data['meta_key'] = $data['page']['meta_key'];
		$data['meta_desc'] = $data['page ']['meta_desc'];
		$this->template('blogs', $data);
	}
	public function blog($slug)
	{
		$data['page'] = $this->model->get_page_byid(11);
		$data['q'] = $this->model->get_blog_by_slug($slug);
		$data['meta_title'] = $data['q']['meta_title'];
		$data['meta_key'] = $data['q']['meta_key'];
		$data['meta_desc'] = $data['q']['meta_desc'];
		$this->template('blog', $data);
	}
	/**
	*

		@AJAX

	*
	*/
	public function submit_newsletter()
	{
		parse_str($_POST['data'],$post);
		$this->db->insert('newsletter',$post);
		echo json_encode(array("stats"=>true,"msg"=>"Thank you for Subscription :)"));
	}
	public function submit_contact_form()
	{

		parse_str($_POST['data'],$post);
		$this->db->insert('contact_form',$post);
		$setting = $this->model->setting(1);
		$to = $setting['email'];
		$subject = $post['type'];
		$message = '<h1>Name: '.$post['name'].'</h1>';
		$message .= '<h1>Phone: '.$post['phone'].'</h1>';
		$message .= '<h1>Email: '.$post['email'].'</h1>';
		$from = $setting['email'];
		$headers = ''; 
	    $headers .= "From: ".$from."" ."\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "X-Priority: 3\r\n";
		$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
		mail($to, $subject, $message, $headers);
		echo json_encode(array("status"=>true,"msg"=>"Thank you for contact us :) we'll contact back you very soon."));
	}
	
	/**
	*

		@TEST

	*
	*/
	public function test()
	{
		die;
		$query = $this->db->query('UPDATE `phase` SET `count`=`count`+1 WHERE `phase_id` = 1');
	}

}
