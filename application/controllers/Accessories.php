<?php
class Accessories extends CI_Controller {

	function all(){
		
		$config = array();
		if($this->session->userdata('site_lang')=='cn'){
			$config["base_url"] = base_url() . "cn/accessories/all";
		}
		else{
			$config["base_url"] = base_url() . "accessories/all";
		}
		
		$total_row = $this->product_model->record_count();
		$config["total_rows"] = $total_row;
		$config["per_page"] = 20;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $total_row;
		$config['cur_tag_open'] = '<a class="current" style="padding:4px">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['next_tag_open'] = '<span class="btn btn-lg btn-dark" style="padding:4px;">';
		$config['next_tag_close'] = '</span>';
		$config['prev_tag_open'] = '<span class="btn btn-lg btn-dark" style="padding:4px;">';
		$config['prev_tag_close'] = '</span>';
		$config['num_tag_open'] = '&nbsp;';
   		$config['num_tag_close'] = '&nbsp;';

		$this->pagination->initialize($config);
		if($this->session->userdata('site_lang')=='cn'){
			if($this->uri->segment(4)){
			$page = ($this->uri->segment(4)) ;
		}
		else{
			$page = 1;
		}
		}
		else{
			if($this->uri->segment(3)){
			$page = ($this->uri->segment(3)) ;
		}
		else{
			$page = 1;
		}
		}
		
		$data["results"] = $this->product_model->fetch_data($config["per_page"], $page);
		$data["content_area"] = get_content('content_area_product',true);
		$str_links = $this->pagination->create_links();
		$data["links"] = $str_links;
		$data['youtube'] = get_content('youtube');
		$data['facebook'] = get_content('facebook');
		$data['instagram'] = get_content('instagram');
		$data['meta_tags'] = $this->product_model->get_meta_pages(9)->tags;
		$data['title'] = $this->product_model->get_meta_pages(9)->title;


// View data according to array.
		$this->load->view("accessories", $data);

		//$this->load->view('index',$data);

		
	}

}