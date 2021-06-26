<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$data['title'] = "Home";
		$data['konten'] = "home/home";
		$this->load->view('home/header', $data);
	}

	public function about()
	{
		$data['title'] = "About PAMSIMAS";
		$data['konten'] = "home/about";
		$this->load->view('home/header', $data);
	}

	public function contact()
	{
		$data['title'] = "Contact PAMSIMAS";
		$data['konten'] = "home/contact";
		$this->load->view('home/header', $data);
	}
}
