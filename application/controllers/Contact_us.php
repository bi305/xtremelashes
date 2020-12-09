<?php
class Contact_us extends CI_Controller {

	function index(){
		$data['map1_heading'] = get_content('map1_heading');
		$data['phone1'] = get_content('map1_phone');
		$data['tel1'] = str_replace(array('(',')','-'," "),"",strip_tags(get_content('map1_phone')));
		$data['email1'] = get_content('map1_email');
		$data['address1'] = get_content('map1_address',true);
		$data['map2_heading'] = get_content('map2_heading');
		$data['phone2'] = get_content('map2_phone');
		$data['tel2'] = str_replace(array('(',')','-'," "),"",strip_tags(get_content('map2_phone')));
		$data['email2'] = get_content('map2_email');
		$data['address2'] = get_content('map2_address',true);
		
		$data['locations_dropdown'] = $this->db->select('*')->from('locations')->get()->result_array();
		$data['locations_footer'] = $this->db->select('*')->from('locations')->where('show_in_footer','Y')->get()->result_array();
		$data['youtube'] = get_content('youtube');
		$data['facebook'] = get_content('facebook');
		$data['instagram'] = get_content('instagram');
		$data['meta_tags'] = $this->product_model->get_meta_pages(7)->tags;
		$data['title'] = $this->product_model->get_meta_pages(7)->title;
		$data['map1'] = get_content('map1');
		$data['map2'] = get_content('map2');
		
		
		//$this->load->view('index',$data);

		$this->parser->parse('contactus',$data);
	}

	function appoint(){



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

			//var_dump(empty($fone));

			 //die();
		
		// $cap = $this->input->post('g-recaptcha-response');
		// $url = "https://www.google.com/recaptcha/api/siteverify";
		// $site_key = "6Lcg9nQUAAAAABORyiVQsQuCBZBSr93krmENfdxB";
		// $response = file_get_contents($url."?secret=".$site_key."&response=".$cap."&remoteip=".$_SERVER['REMOTE_ADDR']);
		// $response = json_decode($response);
		// if(isset($response->success) && $response->success=="true"){
			$data = array(
				'name' => $this->input->post('name'),
				'phone' => $this->input->post('fphone'),
				'email' => $this->input->post('xmail'),
				'date' => $this->input->post('date'),
				'location_id' => $this->input->post('location'),
				'time1' => $this->input->post('time1'),
				'time2' => $this->input->post('time2'),
				'message' => $this->input->post('message')
			);

			// if(isset($this->input->post('fphone'))){
			// //die("form submitted :P");
			// }







			$l_name = $this->db->select('location_name')->from('locations')->where('id',$this->input->post('location'))->get();
			if(count($l_name) > 0){
				$l_name = $l_name->row()->location_name;
			}else{
				$l_name = "";
			}

			$subject = "Appointment request from ".$this->input->post('name');
			$content = "<b>Appointment details:</b>
			<br>Name: ".$this->input->post('name')."
			<br>Phone: ".$this->input->post('fphone')."
			<br>Email: ".$this->input->post('xmail')."
			<br>Message: ".$this->input->post('message')."
			<br>Date: ".$this->input->post('date')."
			<br>Booking Location: ".$l_name."
			<br>Booking Time Option 1: ".$this->input->post('time1')."
			<br>Booking Time Option 2: ".$this->input->post('time2');

			$to = "info@xtremelashes.com.hk";
			send_email($subject, $content, $to);
			//send_email($subject, $content, 'naveedgeek@gmail.com');

			if($this->db->insert('appointments',$data)){
				$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable"><button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>'.lang('thank').' </div>');
				if($this->session->userdata('site_lang')=='cn'){
					redirect('cn/contact_us/');
				}else{
					redirect('contact_us/');
				}

			}
		// }else{
		// 	$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissable"><button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>'.'There was some error.'.' </div>');
		// 	if($this->session->userdata('site_lang')=='cn'){
		// 		redirect('cn/contact_us');
		// 	}else{
		// 		redirect('contact_us');
		// 	}
		// }

		
	}

	function getHours(){
		$date = $this->input->get('date');
		$loc = $this->input->get('loc');
		$date = DateTime::createFromFormat('d/m/Y', $date);
		$unixTimestamp = strtotime($date->format('Y-m-d'));
		$dayOfWeek = date("l", $unixTimestamp);
		$query = $this->db->select('open_at,close_at')->from('working_hours')->where('weekday',$dayOfWeek)->where('location_id',$loc)->get();
		if($query->num_rows() > 0){
			$data = $query->row_array();
			$arr = array('09:00 AM','10:00 AM','11:00 AM','12:00 PM','01:00 PM','02:00 PM','03:00 PM','04:00 PM','05:00 PM','06:00 PM','07:00 PM','08:00 PM','09:00 PM');
			$open = array_search($data['open_at'], $arr);
			$close = array_search($data['close_at'], $arr);

			$arr = array_slice($arr, $open, ($close - $open) + 1, TRUE);
		}
		else{
			$arr = array();
		}

		//print_r($arr);
		echo json_encode(array_values($arr));
	}

}