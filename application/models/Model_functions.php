<?php
class Model_functions extends CI_Model {

	public function get_results($sql){
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0)
		{
			return $res->result_array();
		}
		else
		{
			return false;
		}
	}
	public function get_row($sql){
		$res = $this->db->query($sql);
		if ($res->num_rows() > 0)
		{
			$resp = $res->result_array();
			return $resp[0];
		}
		else
		{
			return false;
		}
	}
	
	public function login($username, $password, $check = FALSE)
	{
		$username = $this->db->escape(strtolower($username));
		if(!$check){$password = md5($this->db->escape($password));}
		return $this->db->get_row("SELECT * FROM `user` WHERE `username` = \"$username\" AND `password` = \"$password\";");
	}
	public function setting($id)
	{
		return $this->get_row("SELECT * FROM `setting` WHERE `setting_id` = '$id';");
	}


	public function shipments($status = 'all')
	{
		if ($status == 'all') {
			return $this->get_results("
				SELECT s.* 
				FROM `shipment` AS s 
				ORDER BY s.shipment_id DESC;
			");
		}
		else{
			return $this->get_results("
				SELECT s.* 
				FROM `shipment` AS s 
				ORDER BY s.shipment_id DESC;
			");
		}
	}
	public function get_shipment_byid($id)
	{
		return $this->get_row("SELECT * FROM `shipment` WHERE `shipment_id` = '$id';");
	}
	public function countires()
	{
		return $this->get_results("SELECT * FROM `country` ORDER BY `name` ASC;");
	}
	public function services($status = 'all')
	{
		if ($status == 'all') {
			return $this->get_results("
				SELECT p.* 
				FROM `service` AS p 
				ORDER BY p.service_id DESC;
			");
		}
		else{
			return $this->get_results("
				SELECT p.* 
				FROM `service` AS p 
				WHERE p.status = '$status' 
				ORDER BY p.service_id DESC;
			");
		}
	}
	public function get_service_byid($id)
	{
		return $this->get_row("SELECT * FROM `service` WHERE `service_id` = '$id';");
	}
	public function get_service_byslug($slug)
	{
		return $this->get_row("SELECT * FROM `service` WHERE `slug` = '$slug';");
	}
	public function gallery()
	{
		return $this->get_results("
			SELECT * 
			FROM `gallery`  
			ORDER BY `gallery_id` DESC;
		");
	}
	public function service_type()
	{
		return $this->get_results("
			SELECT * 
			FROM `service_types`  
			ORDER BY `service_type_id` DESC;
		");
	}
	public function portfolio($status = 'all')
	{
		if ($status == 'all') {
			return $this->get_results("
				SELECT p.* 
				FROM `portfolio` AS p 
				ORDER BY p.portfolio_id DESC;
			");
		}
		else{
			return $this->get_results("
				SELECT p.* 
				FROM `portfolio` AS p 
				WHERE p.status = '$status' 
				ORDER BY p.portfolio_id DESC;
			");
		}
	}
	public function get_page_setting_byid($id)
	{
		return $this->get_row("SELECT * FROM `page_setting` WHERE `page_setting_id` = '$id';");
	}
	public function get_portfolio_byid($id)
	{
		return $this->get_row("SELECT * FROM `portfolio` WHERE `portfolio_id` = '$id';");
	}
	public function get_portfolio_byslug($slug)
	{
		return $this->get_row("SELECT * FROM `portfolio` WHERE `slug` = '$slug';");
	}
	//-------------------- Services Ends
	public function pages()
	{
		return $this->get_results("SELECT * FROM `page` ORDER BY `title` ASC;");
	}
	public function get_page_byid($id)
	{
		return $this->get_row("SELECT * FROM `page` WHERE `page_id` = '$id';");
	}
	public function slider()
	{
		return $this->get_results("SELECT * FROM `slider` ORDER BY `slider_id` ASC;");
	}
	public function contact_form($status)
	{
		if ($status == 'all') {
			return $this->get_results("SELECT * FROM `contact_form` ORDER BY `at` DESC;");
		}
		else {
			return $this->get_results("SELECT * FROM `contact_form` WHERE `status` = '$status' ORDER BY `at` DESC;");
		}
	}
	public function newsletters()
	{
		return $this->get_results("SELECT * FROM `newsletter` ORDER BY `at` DESC;");
	}
	public function blog()
	{
		return $this->get_results("SELECT * FROM `blog` ORDER BY `updated_at` DESC;");
	}
	public function get_blog_byid($id)
	{
		return $this->get_row("SELECT * FROM `blog` WHERE `blog_id` = '$id';");
	}
	public function get_blog_by_slug($slug)
	{
		return $this->get_row("SELECT * FROM `blog` WHERE `slug` = '$slug';");
	}
	public function reviews()
	{
		return $this->get_results("SELECT * FROM `review` ORDER BY `name` ASC;");
	}
	public function get_review_byid($id)
	{
		return $this->get_row("SELECT * FROM `review` WHERE `review_id` = '$id';");
	}
	public function team()
	{
		return $this->get_results("SELECT * FROM `team` ORDER BY `team_id` ASC;");
	}
	public function get_team_byid($id)
	{
		return $this->get_row("SELECT * FROM `team` WHERE `team_id` = '$id';");
	}
}