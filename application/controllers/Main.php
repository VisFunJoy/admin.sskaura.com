<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
      $data = array();
		$this->load->view('Login', $data);
   }
   
   public function check_login()
   {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      if ($username == '' || $password == '')
      {
         $data['message'] = 'Username and password are required fields.';
         $this->load->view('Login', $data);
      }
      else if ($username == '123' && $password == '123')
      {
         $data = array();
         $session_data = array("login" => true);
         $this->session->set_userdata($session_data);
         $this->load->view('News', $data);
      }
      else
      {
         $data['message'] = 'Login Failed due to wrong credentials.';
         $this->load->view('Login', $data);
      }
   }

   public function load_dashboard()
	{
      $data = array();
		$this->load->view('Dashboard', $data);
   }
   
   public function load_news()
	{
      $data = array();
		$this->load->view('News', $data);
   }
   
   public function add_news()
   {
      $this->load->model('MainModel');
      
      $news_title = $this->input->post('news_title');
      $news_description = $this->input->post('news_description');
      $news_image = $_FILES["news_pic"]["name"];

      /* Upload image to server and get news image url. */

      $target_dir = TARGET_DIR;
      $news_image_base_url = NEWS_IMAGE_BASE_URL;
      $target_file = $target_dir.basename($news_image);
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      move_uploaded_file($_FILES["news_pic"]["tmp_name"], $target_file);

      if ($_FILES["news_pic"]["name"] != NULL)
      {
         $news_image = $news_image_base_url.$_FILES["news_pic"]["name"];
      }
      else
      {
         $news_image = null;
      }

      /* --------------------------------------------- */

      $parameters = array(
         'news_title'          => $news_title,
         'news_description'    => $news_description,
         'news_image'          => $news_image
      );

      $add_news = $this->MainModel->add_news($parameters);

      if ($add_news == true)
      {
         $data['message'] = 'News added successfully';
         $this->load->view('News', $data);
      }
      else
      {
         $data['message'] = 'Database error while adding news, please try again.';
         $this->load->view('News', $data);
      }
   }

   public function logout()
	{
      $data = array();
      $session_data = array("login" => false);
      $this->session->set_userdata($session_data);
		$this->load->view('Login', $data);
   }
}
