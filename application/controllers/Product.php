<?php
class Product extends CI_Controller {

	function index($slug){
		if($this->session->userdata('site_lang')=='cn'){
			$data['video'] = $this->db->select('video_cn')->from('products')->where('slug',$slug)->get()->row()->video_cn;
		}else{
			$data['video'] = $this->db->select('video')->from('products')->where('slug',$slug)->get()->row()->video;
		}
		

		$data['product'] = $this->product_model->getProduct($slug);
		$data['products'] = $this->product_model->similar($slug);
		$data['youtube'] = get_content('youtube');
		$data['facebook'] = get_content('facebook');
		$data['instagram'] = get_content('instagram');

		$data['meta_tags'] = $this->product_model->get_meta_products($slug)->tags;
		$data['title'] = $this->product_model->get_meta_products($slug)->title;

		

		$this->load->view('product-view',$data);

		
	}

		function inquiry(){
		// 	if(empty($this->input->post('fphone'))){
		// 	die("form submitted :P");
		// }

			 $email = $this->input->post('email');
			 if(!empty($email)){
			 	die("form submitted :P");
			 	//return;
			 }

			 $fphone = $this->input->post('fphone');
			 if(empty($fphone)){
			 	die("form submitted :P");
			 	//return;
			 }

		// 	$cap = $this->input->post('g-recaptcha-response');
		// $url = "https://www.google.com/recaptcha/api/siteverify";
		// $site_key = "6Lcg9nQUAAAAABORyiVQsQuCBZBSr93krmENfdxB";
		// $response = file_get_contents($url."?secret=".$site_key."&response=".$cap."&remoteip=".$_SERVER['REMOTE_ADDR']);
		// $response = json_decode($response);
		$slug =	$this->db->select('slug')->from('products')->where('id',$this->input->post('id'))->get()->row()->slug;
		//if(isset($response->success) && $response->success=="true"){
		
		$data = array(
        'name' => $this->input->post('name'),
        'product_id' => $this->input->post('id'),
        'email' => $this->input->post('xmail'),
        'phone' => $this->input->post('fphone'),
        'message' => $this->input->post('message')
);
		
		$p_name = $this->db->select('name')->from('products')->where('id',$this->input->post('id'))->get()->row()->name;

		$subject = "Inquiry from ".$this->input->post('name');
		$content = "<b>Inquiry details:</b>
		<br>Name: ".$this->input->post('name')."
		<br>Product: ".$p_name."
		<br>Phone: ".$this->input->post('fphone')."
		<br>Email: ".$this->input->post('xmail')."
		<br>Message: ".$this->input->post('message');
		$to = "info@xtremelashes.com.hk";
		send_email($subject, $content, $to);


		if($this->db->insert('inquiries',$data)){
			 $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable"><button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>'.lang('inquiry_submitted').'</div>');
		if($this->session->userdata('site_lang')=='cn'){
			redirect('cn/product/'.$slug);
		}else{
			redirect('product/'.$slug);
		}
        
		};
	// }

	// else{
	// 	 $this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissable"><button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>'.'There was some error'.'</div>');
	// 	if($this->session->userdata('site_lang')=='cn'){
	// 		redirect('cn/product/'.$slug);
	// 	}else{
	// 		redirect('product/'.$slug);
	// 	}
	// }
}

	

}