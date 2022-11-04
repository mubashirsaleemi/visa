<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	 */

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
		if (isset($_SESSION['admin']))
		{
			$data['admin'] = unserialize($_SESSION['admin']);
			$data['login'] = true;
		}
		else
		{
			$data['login'] = false;
		}
		$this->load->view('admin/header',$data);
		$this->load->view($page,$data);
		$this->load->view('admin/footer',$data);
	}
	public function login_template($page = '', $data = '')
	{
		if (isset($_SESSION['admin']))
		{
			$data['admin'] = unserialize($_SESSION['admin']);
			$data['login'] = true;
		}
		else
		{
			$data['login'] = false;
		}
		$this->load->view('admin/new_login_header',$data);
		$this->load->view($page,$data);
		$this->load->view('admin/new_login_footer',$data);

	}




	/**
	
	@Login Randi-Rona

	*/
	
	public function login()
	{
		if (isset($_SESSION['admin']))
		{
			redirect('admin/index');
			return;
		}
		$data['title'] = 'Login';
		$this->login_template('admin/signin', $data);
	}
	public function check_login()
	{
		if(isset($_SESSION['admin']) && $_SESSION['admin']!= "")
		{
			$user = unserialize($_SESSION['admin']);
			$username = $user['username'];
			$password = $user['password'];
			$resp = $this->model->get_row("SELECT * FROM `admin` WHERE `username` = '$username'  AND `password` =  '$password'");
			if ($resp)
			{
				return $user;
			}
			else
			{
				redirect('admin/login');
			}
		}
		else 
		{
			redirect('admin/login');
		}
	}
	public function change_password()
	{
		$user = $this->check_login();
		$data['signin'] = FALSE;
		$username = $user['username'];
		if (isset($_POST['password']) && strlen($_POST['password']) > 0 && isset($_POST['re_password']) && strlen($_POST['re_password']) > 0) 
		{
			$password = md5($_POST['password']);
			$re_password = md5($_POST['re_password']);
			if ($password === $re_password) 
			{
				if ($this->db->update('admin', array("password"=>$password), array("username"=>$username))) 
				{
					redirect("admin/logout");
				}
			}
			else
			{
				redirect("admin/change_password?error=1&msg='Your Provided Passwords are not matched, please try with correct password'");
			}
		}
		$data['username'] = $username;
		$this->template("admin/change_password", $data);
	}

	public function logout()
	{
		unset($_SESSION['admin']);
		redirect("admin/login");
	}
	/**
	@Login Ajax
	*/
	public function process_login()
	{
		if ($_POST)
		{
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$resp = $this->model->get_row("SELECT * FROM `admin` WHERE `username` = '$username'  AND `password` =  '$password';");
			if ($resp)
			{
				$_SESSION['admin'] = serialize($resp);
				redirect('admin/index');
				return;
			}
			else
			{
				redirect('admin/login');
				return;
			}
		}
		else
		{
			redirect('admin');
		}
	}
	

	/***************************************
	*	callling main index function here 
	****************************************/
	public function services($status='all')
	{
		$this->index($status);
	}
	public function index($status='all')
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['signin'] = FALSE;
		$data['page_title'] = $status.' services';
		$data['menu'] = $status.'_services';
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];
		$data['services'] = $this->model->services($status);
		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('admin/services', $data);
	}

	public function gallery()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['signin'] = FALSE;
		$data['page_title'] = 'Gallery';
		$data['menu'] = 'gallery';
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];
		$data['gallery'] = $this->model->gallery();
		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('admin/gallery', $data);
	}
	public function service_type()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['signin'] = FALSE;
		$data['page_title'] = 'Service Type';
		$data['menu'] = 'service-type';
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];
		$data['type'] = $this->model->service_type();
		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('admin/service_types', $data);
	}
	public function portfolio($category = 'all')
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['signin'] = FALSE;
		$data['page_title'] = 'Visa Categories';
		$data['menu'] = 'portfolio';
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];
		$data['portfolio'] = $this->model->portfolio($category);
		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('admin/portfolio', $data);
	}
	public function sliders()
	{
		$user = $this->check_login();
		$data['page_title'] = "Slider";
		$data['photos'] = $this->model->slider();
		$data['menu'] = 'sliders';
		$this->template('admin/sliders',$data);
	}

	public function pages()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['signin'] = FALSE;
		$data['page_title'] = 'All Pages';
		$data['menu'] = 'pages';
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];
		$data['pages'] = $this->model->pages();
		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('admin/pages', $data);
	}
	
	public function setting()
	{
		$user = $this->check_login();
		$data['q'] = $this->model->setting(1);
		$data['page_title'] = "Edit: Setting";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'setting';
		$this->template('admin/setting', $data);
	}
	public function blog()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = 'All Posts';
		$data['menu'] = 'blog';
		$data['blog'] = $this->model->blog();
		$this->template('admin/blog', $data);
	}
	public function contact_forms($status = 'all')
	{
		$user = $this->check_login();
		$data['data'] = $this->model->contact_form($status);
		$data['page_title'] = $status." contact forms";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = $status.'_form';
		$this->template('admin/contact_forms', $data);
	}
	public function newsletters()
	{
		$user = $this->check_login();
		$data['data'] = $this->model->newsletters();
		$data['page_title'] = "Newsletters";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'newsletters';
		$this->template('admin/newsletters', $data);
	}
	public function reviews()
	{
		$user = $this->check_login();
		$data['data'] = $this->model->reviews();
		$data['page_title'] = "Testimonials";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'reviews';
		$this->template('admin/reviews', $data);
	}
	public function team()
	{
		$user = $this->check_login();
		$data['title'] = "Admin Panel";
		$data['page_title'] = 'All Team';
		$data['menu'] = 'team';
		$data['team'] = $this->model->team();
		$this->template('admin/team', $data);
	}
	/**********************************************
	*	starting Add functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo 	************************************************/

	public function add_service()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Service';
		$data['menu'] = 'add_service';
		$data['signin'] = FALSE;
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];

		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('admin/add_service', $data);
	}
	public function add_service_type()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Service Type';
		$data['menu'] = 'add_service_type';
		$data['signin'] = FALSE;
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];

		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('admin/add_service_type', $data);
	}
	public function add_gallery()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Gallery';
		$data['menu'] = 'add_gallery';
		$data['signin'] = FALSE;
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];

		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('admin/add_service_type', $data);
	}
	public function add_portfolio()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Visa Category';
		$data['menu'] = 'portfolio';
		$data['signin'] = FALSE;
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];

		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('admin/add_portfolio', $data);
	}
	public function add_shipment()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Shipment';
		$data['menu'] = 'add_shipment';
		$data['signin'] = FALSE;
		$data['username'] = $user['username'];
		$data['password'] = $user['password'];

		$data['msg_code'] = isset($_GET['msg']) && $_GET['msg'] != '' ? $_GET['msg'] : FALSE;
		$data['error'] = isset($_GET['error']) && $_GET['error'] != '' ? 'error' : 'correct';
		$this->template('admin/add_shipment', $data);
	}
	public function add_blog()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Blog Post';
		$data['menu'] = 'blog';
		$this->template('admin/add_blog', $data);
	}
	public function add_team()
	{
		$user = $this->check_login();
		$data['page_title'] = 'Add Team Post';
		$data['menu'] = 'team';
		$this->template('admin/add_team', $data);
	}
	/**********************************************
	*	starting insert functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo 	************************************************/

	public function post_service()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("service", $_POST);
		redirect("admin/services/".$_POST['status']."/?msg=Service Added!");
	}
	public function post_service_type()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("service_types", $_POST);
		redirect("admin/service_type/?msg=Service Type Added!");
	}
	public function post_gallery()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("gallery", $_POST);
		redirect("admin/gallery/?msg=Gallery Added!");
	}
	public function post_portfolio()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("portfolio", $_POST);
		redirect("admin/portfolio/all/?msg=Visa Category Added!");
	}
	public function post_shipment()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("shipment", $_POST);
		redirect("admin/shipments/".str_replace(' ', '-', $_POST['status'])."/?msg=Shipment Added!");
	}
	public function post_blog()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("blog", $_POST);
		redirect("admin/blog/?msg=Blog Post Added!");
	}
	public function post_sliders()
	{
		$user = $this->check_login();
		foreach($_FILES["image"]["tmp_name"] as $key => $img) {

			$_FILES['file']['name']       = $_FILES['image']['name'][$key];
            $_FILES['file']['type']       = $_FILES['image']['type'][$key];
            $_FILES['file']['tmp_name']   = $_FILES['image']['tmp_name'][$key];
            $_FILES['file']['error']      = $_FILES['image']['error'][$key];
            $_FILES['file']['size']       = $_FILES['image']['size'][$key];

			$config['upload_path'] = 'uploads/';
	    	$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG';
	    	$config['encrypt_name'] = TRUE;
	    	$ext = pathinfo($_FILES["file"]['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES["file"]['name']).'.'.$ext;
			$config['file_name'] = $new_name;
	    	$resp = $this->load->library('upload', $config);
	    	if ($resp) {
	        	$this->upload->do_upload('file');
				$insert['image'] = $this->upload->data()['file_name'];
				$this->db->insert("slider", $insert);
	    	}
		}
		redirect("admin/sliders/?msg=Slider Added!");
	}
	public function post_review()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("review", $_POST);
		redirect("admin/reviews/?msg=Testimonial Added!");
	}
	public function post_team()
	{
		$user = $this->check_login();
		$resp = $this->db->insert("team", $_POST);
		redirect("admin/team/?msg=Team Post Added!");
	}
	/**********************************************
	*	starting edit functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo
	************************************************/
	public function edit_service()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong service ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_service_byid($new_id);
			$data['page_title'] = "Edit: Service";
			$data['mode'] = "edit";
			$data['signin'] = FALSE;
			$data['menu'] = 'all_services';
			$this->template('admin/add_service', $data);
		}
	}
	public function page_setting()
	{
		$user = $this->check_login();
		$new_id = 1;
		$data['q'] = $this->model->get_page_setting_byid($new_id);
		$data['page_title'] = "Edit: Page Setting";
		$data['mode'] = "edit";
		$data['signin'] = FALSE;
		$data['menu'] = 'page_setting';
		$this->template('admin/page_setting', $data);
	}
	public function edit_portfolio()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong Portfolio ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_portfolio_byid($new_id);
			$data['page_title'] = "Edit: Visa Category";
			$data['mode'] = "edit";
			$data['signin'] = FALSE;
			$data['menu'] = 'portfolio';
			$this->template('admin/add_portfolio', $data);
		}
	}
	public function edit_shipment()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong shipment ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_shipment_byid($new_id);
			$data['page_title'] = "Edit: Shipment";
			$data['mode'] = "edit";
			$data['signin'] = FALSE;
			$data['menu'] = 'all_shipments';
			$this->template('admin/add_shipment', $data);
		}
	}
	public function edit_blog()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong Blog ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_blog_byid($new_id);
			$data['page_title'] = "Edit: Blog Post";
			$data['mode'] = "edit";
			$data['menu'] = 'blog';
			$this->template('admin/add_blog', $data);
		}
	}
	public function edit_page()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong Page ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_page_byid($new_id);
			$data['page_title'] = "Edit: Page";
			$data['mode'] = "edit";
			$data['signin'] = FALSE;
			$data['menu'] = 'pages';
			$this->template('admin/add_page', $data);
		}
	}
	public function edit_team()
	{
		$user = $this->check_login();
		$new_id = isset($_GET['id']) ? $_GET['id'] : 0;
		if($new_id < 1) 
		{
			echo ("Wrong team ID has been passed");
		}
		else 
		{
			$data['q'] = $this->model->get_team_byid($new_id);
			$data['page_title'] = "Edit: Team Post";
			$data['mode'] = "edit";
			$data['menu'] = 'team';
			$this->template('admin/add_team', $data);
		}
	}
	/**********************************************
	*	starting update functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo 	
	************************************************/

	public function update_service()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where("service_id",$aid);
		$data = $this->db->update("service", $_POST);
		if($data)
		{
			redirect("admin/services/".$_POST['status']."?msg=Edited Service");
		}
		else
		{
			redirect("admin/services/".$_POST['status']."?error=1&msg=Error occured while Editing Service");
		}
	}
	public function update_page_setting()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where("page_setting_id",1);
		$data = $this->db->update("page_setting", $_POST);
		if($data)
		{
			redirect("admin/page_setting?msg=Edited Page Setting");
		}
		else
		{
			redirect("admin/page_setting?error=1&msg=Error occured while Editing Page Setting");
		}
	}
	public function update_portfolio()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where("portfolio_id",$aid);
		$data = $this->db->update("portfolio", $_POST);
		if($data)
		{
			redirect("admin/portfolio/all?msg=Edited Visa Category");
		}
		else
		{
			redirect("admin/portfolio/all?error=1&msg=Error occured while Editing Visa Category");
		}
	}
	public function update_shipment()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where("shipment_id",$aid);
		$data = $this->db->update("shipment", $_POST);
		if($data)
		{
			redirect("admin/shipments/".str_replace(' ', '-', $_POST['status'])."?msg=Edited Shipment");
		}
		else
		{
			redirect("admin/shipments/".str_replace(' ', '-', $_POST['status'])."?error=1&msg=Error occured while Editing Shipment");
		}
	}
	public function update_blog()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['updated_by'] = $user['admin_id'];
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where("blog_id",$aid);
		$data = $this->db->update("blog", $_POST);
		if($data)
		{
			redirect("admin/blog/?msg=Edited Blog Post");
		}
		else
		{
			redirect("admin/blog/?error=1&msg=Error occured while Editing Blog Post");
		}
	}
	public function update_page()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where("page_id",$aid);
		$data = $this->db->update("page", $_POST);
		if($data)
		{
			redirect("admin/pages/?msg=Edited Page");
		}
		else
		{
			redirect("admin/pages/?error=1&msg=Error occured while Editing Page");
		}
	}
	public function update_setting()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$this->db->where("setting_id",1);
		$data = $this->db->update("setting", $_POST);
		if($data)
		{
			redirect("admin/setting/?msg=Edited Setting");
		}
		else
		{
			redirect("admin/setting/?error=1&msg=Error occured while Editing Setting");
		}
	}
	public function update_team()
	{
		$user = $this->check_login();
		$aid = $_POST['aid'];
		unset($_POST['aid'], $_POST['mode'], $_POST['security']);
		$_POST['updated_by'] = $user['admin_id'];
		$_POST['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where("team_id",$aid);
		$data = $this->db->update("team", $_POST);
		if($data)
		{
			redirect("admin/team/?msg=Edited Team Post");
		}
		else
		{
			redirect("admin/team/?error=1&msg=Error occured while Editing Team Post");
		}
	}

	/**********************************************
	*	starting delete functions from here for:
	*	company, News&Events, Home, Collection, Albums And Photo 	
	************************************************/
	public function delete_service()
	{
		$user = $this->check_login();
		$this->db->where('service_id', $_GET['id']);
		$resp = $this->db->delete('service');
		if($resp)
		{
			redirect("admin/services/all/?msg=Service has Deleted");
		}
		else
		{
			redirect("admin/services/all/?error=1&msg=Service has failed to delete. Try Again!");
		}
	}
	public function delete_gallery()
	{
		$user = $this->check_login();
		$this->db->where('gallery_id', $_GET['id']);
		$resp = $this->db->delete('gallery');
		if($resp)
		{
			redirect("admin/gallery/?msg=Gallery has Deleted");
		}
		else
		{
			redirect("admin/gallery/?error=1&msg=Gallery has failed to delete. Try Again!");
		}
	}
	public function delete_service_type()
	{
		$user = $this->check_login();
		$this->db->where('service_type_id', $_GET['id']);
		$resp = $this->db->delete('service_types');
		if($resp)
		{
			redirect("admin/service_type/?msg=Service type has Deleted");
		}
		else
		{
			redirect("admin/service_type/?error=1&msg=Service type has failed to delete. Try Again!");
		}
	}
	public function delete_portfolio()
	{
		$user = $this->check_login();
		$this->db->where('portfolio_id', $_GET['id']);
		$resp = $this->db->delete('portfolio');
		if($resp)
		{
			redirect("admin/portfolio/all/?msg=Visa Category has Deleted");
		}
		else
		{
			redirect("admin/portfolio/all/?error=1&msg=Portfolio has failed to delete. Try Again!");
		}
	}
	public function delete_shipment()
	{
		$user = $this->check_login();
		$this->db->where('shipment_id', $_GET['id']);
		$resp = $this->db->delete('shipment');
		if($resp)
		{
			redirect("admin/shipments/all/?msg=Shipment has Deleted");
		}
		else
		{
			redirect("admin/shipments/all/?error=1&msg=Shipment has failed to delete. Try Again!");
		}
	}
	public function delete_slider()
	{
		$user = $this->check_login();
		$slider = $this->model->get_row("SELECT `image` FROM `slider` WHERE `slider_id` = '".$_GET['id']."';");
		$this->db->where('slider_id', $_GET['id']);
		$resp = $this->db->delete('slider');
		if($resp)
		{
			unlink('uploads/'.$slider['image']);
			redirect("admin/sliders/?msg=Slider has Deleted");
		}
		else
		{
			redirect("admin/sliders/?error=1&msg=Slider has failed to delete. Try Again!");
		}
	}
	public function delete_blog()
	{
		$user = $this->check_login();
		$this->db->where('blog_id', $_GET['id']);
		$resp = $this->db->delete('blog');
		if($resp)
		{
			redirect("admin/blog/?msg=News has Deleted");
		}
		else
		{
			redirect("admin/blog/?error=1&msg=News has failed to delete. Try Again!");
		}
	}
	public function delete_review()
	{
		$user = $this->check_login();
		$this->db->where('review_id', $_GET['id']);
		$resp = $this->db->delete('review');
		if($resp)
		{
			redirect("admin/reviews/?msg=Testimonial has Deleted");
		}
		else
		{
			redirect("admin/reviews/?error=1&msg=Testimonial has failed to delete. Try Again!");
		}
	}
	public function delete_form()
	{
		$user = $this->check_login();
		$this->db->where('contact_form_id', $_GET['id']);
		$resp = $this->db->delete('contact_form');
		if($resp)
		{
			redirect("admin/contact-forms/?msg=Contact Form has Deleted");
		}
		else
		{
			redirect("admin/contact-forms/?error=1&msg=Contact Form has failed to delete. Try Again!");
		}
	}
	public function delete_newsletter()
	{
		$user = $this->check_login();
		$this->db->where('newsletter_id', $_GET['id']);
		$resp = $this->db->delete('newsletter');
		if($resp)
		{
			redirect("admin/newsletters/?msg=Email has Deleted");
		}
		else
		{
			redirect("admin/newsletters/?error=1&msg=Email has failed to delete. Try Again!");
		}
	}
	public function delete_team()
	{
		$user = $this->check_login();
		$this->db->where('team_id', $_GET['id']);
		$resp = $this->db->delete('team');
		if($resp)
		{
			redirect("admin/team/?msg=Team has Deleted");
		}
		else
		{
			redirect("admin/team/?error=1&msg=Team has failed to delete. Try Again!");
		}
	}
	/**
	*

	@AJAX PHOTO
		
	*
	*/
	public function post_photo_ajax()
	{
		$user = $this->check_login();
		if ($_FILES){
			$config['upload_path'] = 'uploads/';
        	$config['allowed_types'] = 'gif|jpeg|jpg|png|PNG|JPEG|JPG|GIF';
        	$config['encrypt_name'] = TRUE;
        	$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
			$new_name = md5(time().$_FILES['img']['name']).'.'.$ext;
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
        	if ($this->upload->do_upload('img'))
        	{
	        	$img = $this->upload->data()['file_name'];
	        	echo json_encode(array("status"=>true,"data"=>$img));
        	}
        	else{
        		#error
	        	echo json_encode(array("status"=>false));
        	}

		}
		else{
			redirect('admin/logout');
		}
	}
	/**
	*

	@AJAX
		
	*
	*/

	public function change_service_status()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('service_id',$_POST['id']);
			$resp  = $this->db->update('service',array("status"=>$_POST['status']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
	public function change_shipment_status()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('shipment_id',$_POST['id']);
			$resp  = $this->db->update('shipment',array("status"=>$_POST['status']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
	public function change_form_status()
	{
		if ($_POST) {
			$user = $this->check_login();
			$this->db->where('contact_form_id',$_POST['id']);
			$resp  = $this->db->update('contact_form',array("status"=>$_POST['status']));
			if ($resp) {
				echo json_encode(array("msg"=>"Saved"));
			}
			else{
				echo json_encode(array("msg"=>"Not Saved"));
			}
		}
	}
	public function get_timeline()
	{
		$user = $this->check_login();
		$data = $this->model->get_results("SELECT * FROM `time_line` WHERE `shipment_id` = '".$_POST['id']."';");
		if ($data) {
			$html = '';
			foreach ($data as $key => $q) {
				$html .= '<tr>
                            <td>'.date('d-m-Y',strtotime($q['date'])).'</td>
                            <td>'.$q['time'].'</td>
                            <td>'.$q['location'].'</td>
                            <td>'.$q['activity'].'</td>
                            <td><a href="javascript://" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-time-line" data-id="'.$q['time_line_id'].'"><i class="icon md-delete" aria-hidden="true"></i></a></td>
                        </tr>';
			}
		}
		echo json_encode(array("status"=>true,"html"=>$html));
	}
	public function post_timeline()
	{
		$user = $this->check_login();
		parse_str($_POST['data'],$post);
		$this->db->insert('time_line',$post);
		$data = $this->model->get_results("SELECT * FROM `time_line` WHERE `shipment_id` = '".$post['shipment_id']."';");
		if ($data) {
			$html = '';
			foreach ($data as $key => $q) {
				$html .= '<tr>
                            <td>'.date('d-m-Y',strtotime($q['date'])).'</td>
                            <td>'.$q['time'].'</td>
                            <td>'.$q['location'].'</td>
                            <td>'.$q['activity'].'</td>
                            <td><a href="javascript://" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete-time-line" data-id="'.$q['time_line_id'].'"><i class="icon md-delete" aria-hidden="true"></i></a></td>
                        </tr>';
			}
			echo json_encode(array("status"=>true,"msg"=>"time line added :)","html"=>$html));
		}
		else{
			echo json_encode(array("status"=>false,"msg"=>"time line not added :( please try again or reload your web page."));
		}
	}
	public function delete_timeline()
	{
		$user = $this->check_login();
		$this->db->where('time_line_id', $_POST['id']);
		$resp = $this->db->delete('time_line');
		if($resp)
		{
			echo json_encode(array("status"=>true));
		}
		else
		{
			echo json_encode(array("status"=>false,"msg"=>"not deleted :( please try again or reload your web page."));
		}
	}
}
