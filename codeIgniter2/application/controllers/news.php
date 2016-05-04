<?php

class News extends CI_Controller 
{

	public function __construct(){
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index(){
		$this->load->library('parser');

		$data = array(
		'news'  => $this->news_model->get_news(),
		'title' => 'News archive'
		);

		$this->parser->parse('templates/header',$data);
		$this->parser->parse('news/index',$data);
		$this->load->view('templates/footer');
	}

	public function view($slug){
		
		$this->load->library('parser');

		$data['news_item'] = $this->news_model->get_news($slug);

		if (empty($data['news_item'])) {
			show_404();
		}
		//print_r($data);
		$data['title'] = $data['news_item'][0]['title'];

		$this->parser->parse('templates/header',$data);
		$this->parser->parse('news/view',$data);
		$this->load->view('templates/footer');
		
		//$this->load->view('news/view',$data);

	}

}

?>