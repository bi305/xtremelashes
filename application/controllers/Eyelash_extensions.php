<?php
class Eyelash_extensions extends CI_Controller {

	function index(){
		$data['classic_lashes'] = get_content('classic_lashes',true);
		$data['volumation_eyelash'] = get_content('volumation_eyelash',true);
		$data['bridal_section_1'] = get_content('bridal_section_1',true);
		$data['bridal_section_2'] = get_content('bridal_section_2',true);
		$data['video'] = get_content('video',true);
		$data['reviews_section_1'] = get_content('reviews_section_1',true);
		$data['reviews_section_2'] = get_content('reviews_section_2',true);
		$data['youtube'] = get_content('youtube');
		$data['facebook'] = get_content('facebook');
		$data['instagram'] = get_content('instagram');
		$data['meta_tags'] = $this->product_model->get_meta_pages(4)->tags;
		$data['title'] = $this->product_model->get_meta_pages(4)->title;
		// $this->load->view('eyelash-extension');

		$this->parser->parse('eyelash-extension',$data);
	}

}