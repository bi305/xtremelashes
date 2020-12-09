<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LanguageSwitcher extends CI_Controller
{
    public function __construct() {
        parent::__construct();     
    }
 
    function switchLang($language = "") {
        

        if($language == 'cn'){
        	$start = strlen(base_url());
        	$link = substr_replace($_SERVER['HTTP_REFERER'], 'cn/', $start, 0);
        }else{
        	$link = str_replace("/cn","",$_SERVER['HTTP_REFERER']);
        }
      
        redirect($link);
        
    }
}