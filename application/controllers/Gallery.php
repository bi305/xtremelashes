<?php
class Gallery extends CI_Controller {

	function index(){
		
		$albums = $this->db->select('id,album_name,album_name_cn')->from('albums')->get()->result_array();

		$data = array();
		foreach ($albums as $album) {
			$temp = array();
			$temp =  $album;
			$temp["images"] = $this->db->select('id,image')->from('album_images')->where('album_id',$album['id'])->get()->result_array();

			

			$data["albums"][] =  $temp;


		}
		$data['youtube'] = get_content('youtube');
		$data['facebook'] = get_content('facebook');
		$data['instagram'] = get_content('instagram');
		$data['meta_tags'] = $this->product_model->get_meta_pages(10)->tags;
		$data['title'] = $this->product_model->get_meta_pages(10)->title;
		//print_r($data);
		//die();

		//$this->load->view('gallery',$data);

		$this->parser->parse('gallery', $data);


		// $this->parser->parse('training',$data);
	}

}