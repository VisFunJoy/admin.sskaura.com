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

   public function __construct() 
   {
      parent:: __construct();
      $this->load->model("MainModel");
   }

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
      else if ($username == 'admin' && $password == 'sskaura@123')
      {
         $data = array();
         $session_data = array("login" => true);
         $this->session->set_userdata($session_data);

         $config = array();
         $config["base_url"] = base_url() . "index.php/Main/load_dashboard";
         $config["total_rows"] = $this->MainModel->get_total_contact_messages();
         $config["per_page"] = 5; 
   
         /* Design pagination */
         $config['full_tag_open'] = "<ul class='pagination'>";
         $config['full_tag_close'] = '</ul>';
         $config['num_tag_open'] = '<li>';
         $config['num_tag_close'] = '</li>';
         $config['cur_tag_open'] = '<li class="active"><a href="#">';
         $config['cur_tag_close'] = '</a></li>';
         $config['prev_tag_open'] = '<li>';
         $config['prev_tag_close'] = '</li>';
         $config['first_tag_open'] = '<li>';
         $config['first_tag_close'] = '</li>';
         $config['last_tag_open'] = '<li>';
         $config['last_tag_close'] = '</li>';
   
         $config['next_link'] = '<ion-icon name="fastforward"></ion-icon>';
   
         $config['prev_link'] = '<ion-icon name="rewind"></ion-icon>';
   
         $this->pagination->initialize($config);
   
         $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   
         $data = array();
         $data["all_contact_messages_for_particular_page"] = $this->MainModel->get_contact_messages_for_particular_page($config["per_page"], $page);
         $data["links"] = $this->pagination->create_links();
                  
         $this->load->view('Dashboard', $data);
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
      $config = array();
      $config["base_url"] = base_url() . "index.php/Main/load_dashboard";
      $config["total_rows"] = $this->MainModel->get_total_contact_messages();
      $config["per_page"] = 5; 

      /* Design pagination */
      $config['full_tag_open'] = "<ul class='pagination'>";
      $config['full_tag_close'] = '</ul>';
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['prev_tag_open'] = '<li>';
      $config['prev_tag_close'] = '</li>';
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li>';
      $config['last_tag_close'] = '</li>';

      $config['next_link'] = '<ion-icon name="fastforward"></ion-icon>';

      $config['prev_link'] = '<ion-icon name="rewind"></ion-icon>';

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

      $data = array();
      $data["all_contact_messages_for_particular_page"] = $this->MainModel->get_contact_messages_for_particular_page($config["per_page"], $page);
      $data["links"] = $this->pagination->create_links();
            
      $this->load->view('Dashboard', $data);
   }
   
   public function load_news_section()
	{
      $data = array();
		$this->load->view('NewsSection', $data);
   }

   public function show_add_news()
   {
      $data = array();
		$this->load->view('AddNews', $data);
   }

   public function show_all_news()
	{
      $config = array();
      $config["base_url"] = base_url() . "index.php/Main/show_all_news";
      $config["total_rows"] = $this->MainModel->get_total_news();
      $config["per_page"] = 5; 

      /* Design pagination */
      $config['full_tag_open'] = "<ul class='pagination'>";
      $config['full_tag_close'] = '</ul>';
      $config['num_tag_open'] = '<li>';
      $config['num_tag_close'] = '</li>';
      $config['cur_tag_open'] = '<li class="active"><a href="#">';
      $config['cur_tag_close'] = '</a></li>';
      $config['prev_tag_open'] = '<li>';
      $config['prev_tag_close'] = '</li>';
      $config['first_tag_open'] = '<li>';
      $config['first_tag_close'] = '</li>';
      $config['last_tag_open'] = '<li>';
      $config['last_tag_close'] = '</li>';

      $config['next_link'] = '<ion-icon name="fastforward"></ion-icon>';

      $config['prev_link'] = '<ion-icon name="rewind"></ion-icon>';

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

      $data = array();
      $data["all_news_for_particular_page"] = $this->MainModel->get_news_for_particular_page($config["per_page"], $page);
      $data["links"] = $this->pagination->create_links();

      $this->load->view('AllNews', $data);
   }
   
   public function add_news()
   {      
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
         $this->load->view('AddNews', $data);
      }
      else
      {
         $data['message'] = 'Database error while adding news, please try again.';
         $this->load->view('AddNews', $data);
      }
   }

   public function delete_news($news_id)
   {
      $delete_news = $this->MainModel->delete_news($news_id);

      if ($delete_news == true)
      {
         $config = array();
         $config["base_url"] = base_url() . "index.php/Main/show_all_news";
         $config["total_rows"] = $this->MainModel->get_total_news();
         $config["per_page"] = 5; 
   
         /* Design pagination */
         $config['full_tag_open'] = "<ul class='pagination'>";
         $config['full_tag_close'] = '</ul>';
         $config['num_tag_open'] = '<li>';
         $config['num_tag_close'] = '</li>';
         $config['cur_tag_open'] = '<li class="active"><a href="#">';
         $config['cur_tag_close'] = '</a></li>';
         $config['prev_tag_open'] = '<li>';
         $config['prev_tag_close'] = '</li>';
         $config['first_tag_open'] = '<li>';
         $config['first_tag_close'] = '</li>';
         $config['last_tag_open'] = '<li>';
         $config['last_tag_close'] = '</li>';
   
         $config['next_link'] = '<ion-icon name="fastforward"></ion-icon>';
   
         $config['prev_link'] = '<ion-icon name="rewind"></ion-icon>';
   
         $this->pagination->initialize($config);
   
         $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
   
         $data = array();
         $data["all_news_for_particular_page"] = $this->MainModel->get_news_for_particular_page($config["per_page"], $page);
         $data["links"] = $this->pagination->create_links();
         $data['message'] = 'News deleted successfully';

         $this->load->view('AllNews', $data);
      }
      else
      {
         $config = array();
         $config["base_url"] = base_url() . "index.php/Main/show_all_news";
         $config["total_rows"] = $this->MainModel->get_total_news();
         $config["per_page"] = 5; 

         /* Design pagination */
         $config['full_tag_open'] = "<ul class='pagination'>";
         $config['full_tag_close'] = '</ul>';
         $config['num_tag_open'] = '<li>';
         $config['num_tag_close'] = '</li>';
         $config['cur_tag_open'] = '<li class="active"><a href="#">';
         $config['cur_tag_close'] = '</a></li>';
         $config['prev_tag_open'] = '<li>';
         $config['prev_tag_close'] = '</li>';
         $config['first_tag_open'] = '<li>';
         $config['first_tag_close'] = '</li>';
         $config['last_tag_open'] = '<li>';
         $config['last_tag_close'] = '</li>';

         $config['next_link'] = '<ion-icon name="fastforward"></ion-icon>';

         $config['prev_link'] = '<ion-icon name="rewind"></ion-icon>';

         $this->pagination->initialize($config);

         $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

         $data = array();
         $data["all_news_for_particular_page"] = $this->MainModel->get_news_for_particular_page($config["per_page"], $page);
         $data["links"] = $this->pagination->create_links();

         $data['message'] = 'Database error while deleting news, please try again.';
         $this->load->view('AllNews', $data);
      }
   }

   public function logout()
	{
      $data = array();
      $session_data = array("login" => false);
      $this->session->set_userdata($session_data);
		$this->load->view('Login', $data);
   }

   public function load_message_from_mrkaura()
   {
      $data = array();
		$this->load->view('MessageFromMrKaura', $data);
   }

   public function add_message()
   {      
      $message = $this->input->post('message');

      $parameters = array(
         'message'          => $message
      );

      $add_message = $this->MainModel->add_message($parameters);

      if ($add_message == true)
      {
         $data['message'] = 'Message added successfully';
         $this->load->view('MessageFromMrKaura', $data);
      }
      else
      {
         $data['message'] = 'Database error while adding news, please try again.';
         $this->load->view('MessageFromMrKaura', $data);
      }
   }
}
