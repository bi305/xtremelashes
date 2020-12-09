<?php

function antelope_config(){
  $ci=& get_instance();
  return $ci->config->item("antelope_config");
}

function get_content($key, $checkLang = false){
  $ci=& get_instance();
  if( $checkLang && $ci->session->userdata('site_lang')=='cn'){
   
      return $ci->db->select('content_value_cn')->from('page_content')->where('content_key',$key)->get()->row()->content_value_cn;
  }else{
  return $ci->db->select('content_value')->from('page_content')->where('content_key',$key)->get()->row()->content_value;
}
}

function get_user(){
  $ci=& get_instance();
  $user = $ci->session->userdata('antelope_user');

  //var_dump($_SESSION);


  // $query = $ci->db->get_where('antelope_users', array('id' => $user["id"]));
  // $row = $query->row_array();

  if(isset($user)){
    $user = $ci->db->get_where('antelope_users', array('id' => $user["id"]))->row_array();
  }

  if(isset($user)){
    $user["avatar"] = base_url() . "uploads/" . $user["avatar"];
  }


  return $user;
}


function get_menus(){

  

  $permissions = explode(',',get_user()["permissions"]);


  $ci=& get_instance();
  $all_menus = $ci->config->item("antelope_config")["antelope_sidebar_menus"];

  if (in_array('everything', $permissions)) {

      return $all_menus;
  }

  foreach ($all_menus as $menukey => &$menu) {

    $menu_url_array = explode('/', $menu["url"]);
    $menu_url = end($menu_url_array);

    if(isset($menu["sub_menus"])){
      foreach ($menu["sub_menus"] as $submenukey => &$submenu) {

        $submenu_url_array = explode('/', $submenu["url"]);
        $submenu_url = end($submenu_url_array);

        if (!in_array($submenu_url, $permissions)) {
            unset($menu["sub_menus"][$submenukey]);
        }
      }
      if(count($menu["sub_menus"]) == 0){
          unset($all_menus[$menukey]);
      }

    }
    else{
        if (!in_array($menu_url, $permissions)) {
            unset($all_menus[$menukey]);
        }
    }
  }


  return $all_menus;

}

function get_menus_for_user_management(){

  $permissions = explode(',',get_user()["permissions"]);


  $ci=& get_instance();
  $all_menus = $ci->config->item("antelope_config")["antelope_sidebar_menus"];

  $menus_to_return = array();

  $menus_to_return["everything"] = "Everything";

$menus_to_return["my_profile"] = "My Profile";


  foreach ($all_menus as $menukey => &$menu) {

    $menu_url_array = explode('/', $menu["url"]);
    $menu_url = end($menu_url_array);


    if(isset($menu["sub_menus"])){
      foreach ($menu["sub_menus"] as $submenukey => &$submenu) {

        $submenu_url_array = explode('/', $submenu["url"]);
        $submenu_url = end($submenu_url_array);
        $menus_to_return[$menu["title"]][$submenu_url] = $submenu["title"];

      }
    }
    else{
      $menus_to_return[$menu_url] = $menu["title"];

    }
  }


  return $menus_to_return;

}


function is_page_permitted($page){

  $permissions = explode(',',get_user()["permissions"]);

  if (in_array('everything', $permissions)) {
      return true;
  }
  else{
    if (in_array($page, $permissions)) {
        return true;
    }
  }

  return false;
}


function send_email($subject, $content, $to, $update_email_id = 0){
  $ci=& get_instance();

  $ci->load->library('email');
  

  $config = array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ud.1025.hk',
    'smtp_port' => 25,
    'smtp_user' => 'website@xtremelashes.com.hk',
    'smtp_pass' => 'xtremeW3bsmtp',
    'mailtype'  => 'html',
    'charset'   => 'utf-8'

  );

  $ci->email->initialize($config);
  $ci->email->set_mailtype("html");
  $ci->email->set_newline("\r\n");


  $ci->email->from('website@xtremelashes.com.hk', 'Xtreme Website');
  $ci->email->to($to);
  $ci->email->subject($subject);
  $ci->email->message($content);


  $status = $ci->email->send(FALSE);
  $error = "";

  if(!$status){ 
      $error = $ci->email->print_debugger();
  }


  $data = array(
          'subject' => $subject,
          'content' => $content,
          'mail_to' => $to,
          'send_status' => $status,
          'error' => $error,
          'lang' => $ci->session->userdata('site_lang')

  );

  if($update_email_id > 0){
    $ci->db->where('id', $update_email_id);
    $ci->db->update('emails', $data);
  }else{
    $ci->db->insert('emails', $data);
  }
  
  return $status;


}


function get_page_slug($page_id){
  $ci=& get_instance();
  $row =  $ci->db->get_where('pages', array('id' => $page_id))->row();

  return $row->slug;
}

function get_website_menus(){
  $ci=& get_instance();
  $query = $ci->db->get( 'menus' );
  $result = $query->result();

  foreach ($result as $row)
  {
      if(empty($row->slug)){

        $row->slug = $row->url;
      }
  }
  return $result;
}

