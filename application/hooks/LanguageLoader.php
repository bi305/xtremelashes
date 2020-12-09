<?php
class LanguageLoader
{
    function initialize() {

        $ci =& get_instance();
        $lang = $ci->uri->segment(1);
        
        if($lang == 'cn'){
            $ci->session->set_userdata('site_lang', 'cn');
        }
        else{
            $ci->session->set_userdata('site_lang', 'english');
        }

        
        $ci->load->helper('language');
        $siteLang = $ci->session->userdata('site_lang');

        
        if ($siteLang) {
            $ci->lang->load('message',$siteLang);
        } else {
            $ci->lang->load('message','english');
        }
    }
} 