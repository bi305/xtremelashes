<?php
class eye_brows extends CI_Controller
{

    function index()
    {





        $data['youtube'] = get_content('youtube');
        $data['facebook'] = get_content('facebook');
        $data['instagram'] = get_content('instagram');



        $data['meta_tags'] = $this->product_model->get_meta_pages(13)->tags;
        $data['title'] = $this->product_model->get_meta_pages(13)->title;


        $this->load->view('eye_brows', $data);
    }
}
