<?php
class Terms extends CI_Controller {

	function index(){
		
		$data['youtube'] = get_content('youtube');
		$data['facebook'] = get_content('facebook');
		$data['instagram'] = get_content('instagram');
		$data['terms'] = get_content('terms',true);
		$data['meta_tags'] = $this->product_model->get_meta_pages(11)->tags;
		$data['title'] = $this->product_model->get_meta_pages(11)->title;
		
		$this->load->view('terms',$data);
		
	}

	

}