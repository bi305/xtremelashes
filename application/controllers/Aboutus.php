<?php
class Aboutus extends CI_Controller {

	

	function index(){
		$segment = $this->uri->segment(1);
		if(!empty($segment) && $segment == "about-us-3-2"){
			header("Location: https://www.xtremelashes.com.hk/about-us/", true, 301);
			exit();
		}
		// die();
		$data['why_xtreme_lashes'] = get_content('why_xtreme_lashes',true);
		$data['our_mission'] = get_content('our_mission',true);
		$data['our_mission_2'] = get_content('our_mission_2',true);
		$data['about_founder_1'] = get_content('about_founder_1',true);
		$data['about_founder_2'] = get_content('about_founder_2',true);
		$data['youtube'] = get_content('youtube');
		$data['facebook'] = get_content('facebook');
		$data['instagram'] = get_content('instagram');
		$data['meta_tags'] = $this->product_model->get_meta_pages(3)->tags;
		$data['title'] = $this->product_model->get_meta_pages(3)->title;

		//$this->load->view('index',$data);

		$this->parser->parse('aboutus',$data);
	}

	function test_email(){
		var_dump(send_email('test', 'test', 'naveedgeek@gmail.com'));
		//var_dump(send_email('test', 'test', 'info@xtremelashes.com.hk'));
	}

	function retry_emails($code){

		if($code == "navlashes"){

			$query = $this->db->get_where('emails', array('send_status' => 0));

			foreach ($query->result() as $row)
			{
				//var_dump($row->id);
				send_email($row->subject, $row->content, $row->mail_to,$row->id);
			}

			//if($query->num_rows() == 0){
				echo $query->num_rows() ." failed emails to re-send.";
			//}
		}
		
	}

}