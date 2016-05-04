<?php

class Pages extends CI_Controller {

	public function view($page='home') {
		if (! file_exists(APPPATH.'/views/pages/'.$page.'.php')) {
			// Opa! Não encontramos a página para isso!
			show_404();
		}	
	
		$data['title'] = ucfirst($page); // Primeira letra maiúscula
		$this->load->view('templates/header',$data);
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer',$data);
	
	}

}

?>