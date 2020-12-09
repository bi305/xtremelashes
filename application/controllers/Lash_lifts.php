<?php
class Lash_lifts extends CI_Controller {

	function index(){
		
		 $data['youtube'] = get_content('youtube');
		 $data['facebook'] = get_content('facebook');
		 $data['instagram'] = get_content('instagram');
        
		$data['meta_tags'] = $this->product_model->get_meta_pages(12)->tags;
		$data['title'] = $this->product_model->get_meta_pages(12)->title;
		
		$this->load->view('lash_lifts',$data);
		
	}

	

}