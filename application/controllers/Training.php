<?php
class Training extends CI_Controller {

	function index(){
		$data['training_section'] = get_content('training_section',true);
		$data['video'] = get_content('video_training',true);
		$data['signup'] = get_content('signup',true);
		$data['youtube'] = get_content('youtube');
		$data['facebook'] = get_content('facebook');
		$data['instagram'] = get_content('instagram');
		$data['meta_tags'] = $this->product_model->get_meta_pages(5)->tags;
		$data['title'] = $this->product_model->get_meta_pages(5)->title;

		// $this->load->view('training');

		$this->parser->parse('training',$data);
	}

}