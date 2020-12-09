<?php
class Antelope extends CI_Model {
  public function __construct()
  {
    parent::__construct();
  }
        //Antelope functions start ----------
  public function user_management($xcrud){
    $xcrud->table('antelope_users');
    $xcrud->unset_remove(true,'username','=','superadmin');
    $xcrud->change_type('password', 'password', 'md5', 16);
          $xcrud->change_type('avatar','image','',array('width'=>200, 'height'=>200,'ratio'=>1.0, 'manual_crop'=>true)); // auto-crop
          //$xcrud->set_attr('permissions',array('class'=>'permissions_list'));
          $xcrud->change_type('permissions','multiselect','',get_menus_for_user_management());


          return $xcrud->render();
    }

        public function my_profile($xcrud){
          $xcrud->table('antelope_users');
          $xcrud->where('id =', get_user()["id"]);
          $xcrud->unset_remove();
          $xcrud->unset_add();
          $xcrud->unset_print();
          $xcrud->unset_csv();
          $xcrud->unset_search();
          $xcrud->unset_pagination();
          $xcrud->unset_limitlist();
          $xcrud->unset_sortable();
          $xcrud->unset_list();
          $xcrud->columns('user_type,permissions', true);
          $xcrud->fields('user_type,permissions', true);
          $xcrud->change_type('password', 'password', 'md5', 16);
          $xcrud->change_type('avatar','image','',array('width'=>400, 'height'=>400,'ratio'=>1.0, 'manual_crop'=>true)); // auto-crop
          return $xcrud->render('edit', get_user()["id"]);
        }
        //Antelope functions end ------------


//****************************************************************************************************************

        public function home_content($xcrud){
          $xcrud->table('page_content');
          $xcrud->where('page_id =',1);
          $xcrud->order_by('content_order');
          $xcrud->unset_remove();
          $xcrud->unset_add();
          $xcrud->unset_print();
          $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
          
          $xcrud->readonly('content_title');

          if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('content_title,content_value,content_value_cn');
            $xcrud->fields('content_title,content_value,content_value_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("content_title,content_value$lang ");
            $xcrud->fields("content_title,content_value$lang");
           
          }

          
          return $xcrud->render();
        }

        public function shop_content($xcrud){
          $xcrud->table('page_content');
          $xcrud->where('page_id =',9);
          // $xcrud->order_by('content_order');
          $xcrud->unset_remove();
          $xcrud->unset_add();
          $xcrud->unset_print();
          $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
          
          $xcrud->readonly('content_title');

          if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('content_title,content_value,content_value_cn');
            $xcrud->fields('content_title,content_value,content_value_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("content_title,content_value$lang ");
            $xcrud->fields("content_title,content_value$lang");
           
          }

          
          return $xcrud->render();
        }

        public function subscribers($xcrud){
          $xcrud->table('subscribers');
          
          $xcrud->unset_remove();
          $xcrud->unset_add();
          $xcrud->unset_edit();
          $xcrud->unset_print();
          //$xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
          $xcrud->columns('email');
          $xcrud->fields('email');
          $xcrud->readonly('email');
          return $xcrud->render();
        }

        public function emails($xcrud){
          $xcrud->table('emails');
          
          $xcrud->unset_remove();
          $xcrud->unset_add();
          $xcrud->unset_edit();
          $xcrud->unset_print();
          $xcrud->order_by('send_status','asc');
          $xcrud->order_by('id','desc');


          return "<a class='btn btn-default btn-sm' href='http://xtremelashes.com.hk/aboutus/retry_emails/navlashes' target='_blank'>Re-send failed emails</a>" . $xcrud->render();
        }

        public function terms($xcrud){
          $xcrud->table('page_content');
          $xcrud->where('page_id',11);
          
          $xcrud->unset_remove();
          $xcrud->unset_add();
          $xcrud->unset_print();
          $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();

          if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('content_title,content_value,content_value_cn');
            $xcrud->fields('content_title,content_value,content_value_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("content_title,content_value$lang ");
            $xcrud->fields("content_title,content_value$lang");
           
          }


          $xcrud->readonly('content_title');
          return $xcrud->render();
        }

        public function pages_seo($xcrud){
          $xcrud->table('pages');
          $xcrud->where('id !',array(2,8));
          
          $xcrud->unset_remove();
          $xcrud->unset_add();
          $xcrud->unset_print();
          $xcrud->unset_csv();
          

          if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('page_name,page_title,page_title_cn,meta_tags,meta_tags_cn');
            $xcrud->fields('page_name,page_title,page_title_cn,meta_tags,meta_tags_cn,slug,url');
            $xcrud->no_editor('meta_tags');
            $xcrud->no_editor('meta_tags_cn');
            $xcrud->column_callback('meta_tags','my_meta_tags');
            $xcrud->column_callback('meta_tags_cn','my_meta_tags');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("page_name,page_title$lang,meta_tags$lang");
            $xcrud->fields("page_name,page_title$lang,meta_tags$lang,slug,url");
            $xcrud->no_editor("meta_tags$lang");
            $xcrud->column_callback("meta_tags$lang","my_meta_tags");
          }

          $xcrud->readonly('page_name,url');
          $xcrud->disabled('page_name,url');
         

          

          return $xcrud->render();
        }

        public function extra_routes($xcrud){
          $xcrud->table('app_routes');
          $xcrud->unset_remove();
          $xcrud->unset_print();
          $xcrud->unset_csv();

          return $xcrud->render();

        }

        public function menus($xcrud){
          $xcrud->table('menus');


          $xcrud->relation('page_id','pages','id','page_name');

          if(get_user()['user_type'] == 'superadmin'){
              $xcrud->columns('menu_title,menu_title_cn,page_id');
              $xcrud->fields('menu_title,menu_title_cn,page_id');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }

            $xcrud->columns("menu_title$lang,page_id");
            $xcrud->fields("menu_title$lang,page_id");
           
          }


          $xcrud->unset_remove();
          $xcrud->unset_add();
          $xcrud->unset_print();
          $xcrud->unset_csv();
          $xcrud->readonly('url,page_id');
          $xcrud->disabled('url,page_id');
          $xcrud->disabled('url');


          return $xcrud->render();

        }

        public function products_seo($xcrud){
          $xcrud->table('products');
          
          
          $xcrud->unset_remove();
          $xcrud->unset_add();
          $xcrud->unset_print();
          $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();

         


          if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('name,name_cn,meta_tags,meta_tags_cn');
            $xcrud->fields('name,name_cn,meta_tags,meta_tags_cn');
            $xcrud->column_callback('meta_tags','my_meta_tags');
            $xcrud->column_callback('meta_tags_cn','my_meta_tags');
            $xcrud->no_editor('meta_tags');
            $xcrud->no_editor('meta_tags_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("name$lang,meta_tags$lang");
            $xcrud->fields("name$lang,meta_tags$lang");
            $xcrud->column_callback("meta_tags$lang","my_meta_tags");
            $xcrud->no_editor("meta_tags$lang");
          }

          
          
          return $xcrud->render();
        }

        public function home_slider($xcrud){
         $xcrud->table('slides');
         

         if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('image,text_html,text_html_cn,position');
            $xcrud->fields('image,text_html,text_html_cn,position');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
           $xcrud->columns("image,text_html$lang,position");
            $xcrud->fields("image,text_html$lang,position");
          }


         $xcrud->change_type('image','image','',array()); // auto-crop
         return $xcrud->render();
       }

       public function aboutus_content($xcrud){
        $xcrud->table('page_content');
        $xcrud->where('page_id =',3);
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
        


        if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('content_title,content_value,content_value_cn');
            $xcrud->fields('content_title,content_value,content_value_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("content_title,content_value$lang ");
            $xcrud->fields("content_title,content_value$lang");
           
          }

        $xcrud->readonly('content_title');
        return $xcrud->render();
      }

      public function product_view($xcrud){
        $xcrud->table('page_content');
        $xcrud->where('page_id =',8);
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
       


 if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('content_title,content_value,content_value_cn');
            $xcrud->fields('content_title,content_value,content_value_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("content_title,content_value$lang ");
            $xcrud->fields("content_title,content_value$lang");
           
          }

        $xcrud->readonly('content_title');
        return $xcrud->render();
      }

      public function extensions_content($xcrud){
        $xcrud->table('page_content');
        $xcrud->where('page_id =',4);
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
        


 if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('content_title,content_value,content_value_cn');
            $xcrud->fields('content_title,content_value,content_value_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("content_title,content_value$lang ");
            $xcrud->fields("content_title,content_value$lang");
           
          }

        $xcrud->readonly('content_title');
        return $xcrud->render();
      }

      public function training_content($xcrud){
        $xcrud->table('page_content');
        $xcrud->where('page_id =',5);
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
        
 if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('content_title,content_value,content_value_cn');
            $xcrud->fields('content_title,content_value,content_value_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("content_title,content_value$lang ");
            $xcrud->fields("content_title,content_value$lang");
           
          }
        $xcrud->readonly('content_title');
        return $xcrud->render();
      }

      public function contact_us($xcrud){
        $xcrud->table('page_content');
        $xcrud->where('page_id =',7);
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
        
 if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('content_title,content_value,content_value_cn');
            $xcrud->fields('content_title,content_value,content_value_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("content_title,content_value$lang ");
            $xcrud->fields("content_title,content_value$lang");
           
          }
        $xcrud->readonly('content_title');
        return $xcrud->render();
      }
      public function what_to_expect($xcrud){
        $xcrud->table('page_content');
        $xcrud->where('page_id =',6);
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
        
 if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('content_title,content_value,content_value_cn');
            $xcrud->fields('content_title,content_value,content_value_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("content_title,content_value$lang ");
            $xcrud->fields("content_title,content_value$lang");
           
          }
        $xcrud->readonly('content_title');
        return $xcrud->render();
      }

      public function gallery($xcrud){


        $xcrud->table('albums');
        

        if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('album_name,album_name_cn');
        $xcrud->fields('album_name,album_name_cn');
        }
        else{
          $lang = '';
          if(get_user()['user_type'] == 'cn'){
            $lang = '_cn';
          }

          $xcrud->columns("album_name$lang");
          $xcrud->fields("album_name$lang");
         
        }

        $xcrud->default_tab('Albums');

        $nodes = $xcrud->nested_table('Album Images','id','album_images','album_id'); 
        $nodes->columns('image');
        $nodes->fields('image');
        $nodes->change_type('image','image','',array('width'=>600, 'height'=>600,'ratio'=>1.0, 'manual_crop'=>true)); // auto-crop
          // $xcrud->unset_remove();
          //$xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
        return $xcrud->render();
      }

      public function products($xcrud){


        $xcrud->table('products');

        if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('name,name_cn,quantity,price,description,description_cn,details,details_cn,thumbnail');
        $xcrud->fields('name,name_cn,quantity,price,description,description_cn,details,details_cn,video,video_cn,thumbnail,slug',false,false,'edit');
        $xcrud->fields('name,name_cn,quantity,price,description,description_cn,details,details_cn,video,video_cn,thumbnail');
        }
        else{
          $lang = '';
          if(get_user()['user_type'] == 'cn'){
            $lang = '_cn';
          }

          $xcrud->columns("name$lang,quantity,price,description$lang,details$lang,thumbnail");
        $xcrud->fields("name$lang,quantity,price,description$lang,details$lang,video$lang,thumbnail,slug",false,false,'edit');
        $xcrud->fields("name$lang,quantity,price,description$lang,details$lang,video$lang,thumbnail");
         
        }

         $xcrud->field_tooltip('video','Youtube video embed format. e.g. https://www.youtube.com/embed/4jIh1cRwPBM. Multiple videos can be added with comma separation');
          $xcrud->field_tooltip('video_cn','Youtube video embed format. e.g. https://www.youtube.com/embed/4jIh1cRwPBM. Multiple videos can be added with comma separation');

      
         //$xcrud->fields('meta_tags,meta_tags_cn', false, 'Meta Tags');

         //$xcrud->no_editor('meta_tags,meta_tags_cn');

        $xcrud->default_tab('Products');

        $xcrud->change_type('thumbnail','image','',array('width'=>500, 'height'=>500,'ratio'=>1.0, 'quality'=>100, 'crop'=>true));

        $nodes = $xcrud->nested_table('Product Images','id','product_images','product_id'); 
        $nodes->columns('image');
        $nodes->fields('image');
        $nodes->change_type('image','image','',array('width'=>500, 'height'=>500,'ratio'=>1.0, 'quality'=>100, 'crop'=>true)); // auto-crop
        //$xcrud->unset_remove();
        $xcrud->validation_required('name');
        $xcrud->validation_required('name_cn');
        $xcrud->validation_required('thumbnail');
        $xcrud->replace_insert('product_insert');
          //$xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();

        //$xcrud->pass_var('meta_tags', '<title></title>');
        $xcrud->order_by('id','desc');



         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
        return $xcrud->render();
      }

      public function inquiries($xcrud){


        $xcrud->table('inquiries')->columns('product_id,name,phone,email,message,created_at')->fields('product_id,name,phone,email,message');

        $xcrud->label('product_id','Product');

        $xcrud->relation('product_id','products','id','name');
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->order_by('id','desc');
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
        return $xcrud->render();
      }

      public function appointments($xcrud){


        $xcrud->table('appointments')->columns('name,phone,email,message,date,time1,time2,location_id,created_at')->fields('name,phone,email,message,date,time1,time2,location_id');

        $xcrud->label('location_id','Location');

        $xcrud->relation('location_id','locations','id','location_name');
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();
        $xcrud->order_by('id','desc');
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();
        return $xcrud->render();
      }

      public function locations($xcrud){


      if(get_user()['user_type'] == 'superadmin'){
          $xcrud->table('locations')->columns('location_name,person_name,certificate,address_line_1,address_line_2,contact_no,location_name_cn,person_name_cn,certificate_cn,address_line_1_cn,address_line_2_cn')->fields('location_name,person_name,certificate,address_line_1,address_line_2,contact_no,location_name_cn,person_name_cn,certificate_cn,address_line_1_cn,address_line_2_cn');
          $xcrud->default_tab('Location');
        $hours = $xcrud->nested_table('Working Hours','id','working_hours','location_id');
        $hours->fields('weekday,open_at,close_at');
        $hours->columns('weekday,open_at,close_at');
        $hours->before_insert('check_hours');
        $hours->before_update('check_hours_update');
        $xcrud->unset_remove(true,'id','=','1');
      }
      else{
        $lang = '';
        if(get_user()['user_type'] == 'cn'){
          $lang = '_cn';
        }

        $xcrud->table('locations')->columns("location_name$lang,person_name$lang,certificate$lang,address_line_1$lang,address_line_2$lang,contact_no")->fields("location_name$lang,person_name$lang,certificate$lang,address_line_1$lang,address_line_2$lang,contact_no");
        $xcrud->default_tab('Location');
        $hours = $xcrud->nested_table('Working Hours','id','working_hours','location_id');
        $hours->fields('weekday,open_at,close_at');
        $hours->columns('weekday,open_at,close_at');
        $hours->before_insert('check_hours');
        $hours->before_update('check_hours_update');
        $xcrud->unset_remove(true,'id','=','1');
      }

        $xcrud->unset_print();
        $xcrud->unset_csv();
        return $xcrud->render();
      }

      

      public function setting($xcrud){
        $xcrud->table('page_content');
        $xcrud->where('page_id =',2);
        $xcrud->unset_remove();
        $xcrud->unset_add();
        $xcrud->unset_print();
        $xcrud->unset_csv();
         // $xcrud->unset_search();
          //$xcrud->unset_pagination();
          //$xcrud->unset_limitlist();
          //$xcrud->unset_sortable();
          //$xcrud->unset_list();

       


 if(get_user()['user_type'] == 'superadmin'){
            $xcrud->columns('content_title,content_value,content_value_cn');
            $xcrud->fields('content_title,content_value,content_value_cn');
          }
          else{
            $lang = '';
            if(get_user()['user_type'] == 'cn'){
              $lang = '_cn';
            }
            $xcrud->columns("content_title,content_value$lang ");
            $xcrud->fields("content_title,content_value$lang");
           
          }


        $xcrud->readonly('content_title');
       




          //$xcrud->condition('is_html','=','0','no_editor','content_value','edit');

          //$xcrud->no_editor('content_value');

          //$xcrud->condition('is_html','=','0','readonly','content_value');

          //$xcrud->condition('is_html','=','0','change_type','content_value,is_html');




        return $xcrud->render();
      }



    }
    ?>
