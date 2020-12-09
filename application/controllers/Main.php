<?php
class Main extends CI_Controller {

	function index(){
		$data['result_you_love'] = get_content('result_you_love',true);
		$data['content_below_slider'] = get_content('content_below_slider',true);
		$data['academy_training'] = get_content('academy_training',true);
		$data['content_area'] = get_content('content_area_home',true);
		$data['phone'] = get_content('phone') ;
		$data['tel'] = str_replace(array('(',')','-'," "),"",strip_tags(get_content('phone')));
		$data['email'] = get_content('email');
		$data['address'] = get_content('address',true);
		$data['youtube'] = get_content('youtube');
		$data['facebook'] = get_content('facebook');
		$data['instagram'] = get_content('instagram');
		$data['meta_tags'] = $this->product_model->get_meta_pages(1)->tags;
		$data['title'] = $this->product_model->get_meta_pages(1)->title;
		$data['map'] = get_content('map');
		//$this->load->view('index',$data);
		$data['slides'] = $this->db->select('*')->from('slides')->get()->result_array();

		$this->parser->parse('index',$data);
	}

	function not_found(){
		if($this->uri->segment(1) == "cn" ){
			redirect(base_url()."cn/");
		}else{
			redirect(base_url());
		}


		
	}

	function submit(){
		$email = $this->input->post('email');
		$data =  array('email' => $email );
		$this->db->insert('subscribers',$data);
		$subject = "New subscription";
		$content = "<b>Subscription details:</b>
		<br>Email: ".$email;
		$to = "info@xtremelashes.com.hk";
		send_email($subject, $content, $to);
		
	}

}