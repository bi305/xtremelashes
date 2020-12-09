<?php
class What_to_expect extends CI_Controller {

	function index(){
		$data['procedure'] = get_content('procedure',true);
		$data['video'] = get_content('video_expect',true);
		$data['step_1'] = get_content('step_1',true);
		$data['step_2'] = get_content('step_2',true);
		$data['step_3'] = get_content('step_3',true);
		$data['step_4'] = get_content('step_4',true);
		$data['youtube'] = get_content('youtube');
		$data['facebook'] = get_content('facebook');
		$data['instagram'] = get_content('instagram');
		$data['meta_tags'] = $this->product_model->get_meta_pages(6)->tags;
		$data['title'] = $this->product_model->get_meta_pages(6)->title;

		// $this->load->view('what-to-expect');

		$this->parser->parse('what-to-expect',$data);
	}

}