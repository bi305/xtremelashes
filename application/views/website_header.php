<!DOCTYPE html>
<html lang="en">

<?php
$protocol = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
if (substr($_SERVER['HTTP_HOST'], 0, 4) !== 'www.') {
    //header('Location: '.$protocol.'www.'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
die;
  redirect($protocol.'www.'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'], 'location', 301);

  exit;
}
?>


<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-76115551-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date()); 
  gtag('config', 'UA-76115551-1');
</script>

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WV686D7');</script>
<!-- End Google Tag Manager -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<base href="<?php echo base_url(); ?>">


<?php 

if (strpos($meta_tags, '<title>') === false) {
  echo "<title>" . $title . "</title>";
}
?>

<?php echo $meta_tags ; ?>

<link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>website_assets/images/home/icon.png"/>


<!-- Bootstrap core CSS -->
<link href="<?php echo base_url() ?>website_assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">


<!-- Custom styles for this template -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>website_assets/css/style.css?v=1.0">


<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>website_assets/css/hr.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>website_assets/css/maps.css">




<link href="<?php echo base_url() ?>website_assets/css/twentytwenty.css" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url() ?>website_assets/vendor/jquery/jquery.min.js"></script>

<!-- slideshow -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/carousel-3d/dist/styles/jquery.carousel-3d.default.css">
<script src="<?php echo base_url() ?>website_assets/carousel-3d/bower_components/javascript-detect-element-resize/jquery.resize.js"></script>
<script src="<?php echo base_url() ?>website_assets/carousel-3d/bower_components/waitForImages/dist/jquery.waitforimages.js"></script>
<script src="<?php echo base_url() ?>website_assets/carousel-3d/bower_components/modernizr/modernizr.js"></script>
<script src="<?php echo base_url() ?>website_assets/carousel-3d/dist/jquery.carousel-3d.js"></script>


<style>
/* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
#thumbs { padding-top: 10px; overflow: hidden; }
#thumbs img{

  background-color: white;
  cursor: pointer;
  width: 200px;
  height: auto;
  margin: 2%;
  padding: 0.5rem;
  background-color: #fff;
  border: 1px solid #dee2e6;
  border-radius: 0.25rem;
  max-width: 100%;
}

.wrapper {
  width: 100%;
}

#thumbs img {
 float: left;
 margin-right: 6px;
}
#largeImage{
  max-width: 500px;
  width: 100%;
  height: auto;

}

#panel {
  position: relative;
  vertical-align: middle;
}


@media screen and (max-width: 900px) {

  #thumbs img{

    background-color: white;
    cursor: pointer;
    width: 150px;
    height: auto;
    margin: 2%;
    padding: 0.5rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
    max-width: 100%;
  }
}
@media screen and (max-width: 900px) {
  #largeImage{
    max-width: 500px;

    width: 100%;
    height: auto;

  }
  #thumbs img{

    width: 150px;
    
  }
}
@media screen and (max-width: 500px) {
  #largeImage{
    max-width: 500px;

    width: 100%;
    height: auto;

  }
  #thumbs img{

    width: 100px;
    
  }
}

@media screen and (max-width: 300px) {
  #largeImage{
    max-width: 500px;

    width: 100%;
    height: auto;

  }
  #thumbs img{

    width: 50px;
    
  }
}

.footlink{
  color: rgba(0, 0, 0, 0.8);
}
.footlink:hover{
  text-decoration: none;
  color:#6c757d;
}

.intl-tel-input { width: 100%; margin-top:15px;}

select:focus {outline:0;}
option:hover {color:green;}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/tel/css/intlTelInput.css">

<?php if($this->session->userdata('site_lang')=='cn'){ ?>
  <script src='https://www.google.com/recaptcha/api.js?hl=zh-HK'></script>
<?php }else{ ?>
  <script src='https://www.google.com/recaptcha/api.js'></script>
<?php } ?>
<script src="<?php echo base_url() ?>website_assets/tel/js/intlTelInput.js"></script>



</head>



<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV686D7"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-3">
      <div class="container-fluid ">
        <a href="<?php echo base_url() ?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>"><img src="<?php echo base_url() ?>website_assets/images/home/logo.png" alt="Xtreme Lashes HK Logo" class="img-responsive logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav gotham-book ml-auto">


            <?php  
            $menus = get_website_menus();

            foreach ($menus as $menu)
              { ?>

                <li class="nav-item <?php if ($this->uri->segment(1)=='aboutus'){echo 'active';} ?>">
                  <a class="nav-link " href="<?php echo base_url() ?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?><?php echo get_page_slug($menu->page_id) ?>"><?php 

                  if($this->session->userdata('site_lang')=='cn'){
                    echo $menu->menu_title_cn;
                  }
                  else{
                    echo $menu->menu_title;
                  }?></a>   
                </li>

              <?php } ?>

              

              <li class="nav-item">
                <select style="margin-top: 8px;
                border: solid 2px rgba(0, 0, 0, 0.5);" onchange="javascript:window.location.href = '<?php echo base_url(); ?>LanguageSwitcher/switchLang/' + this.value;">
                <option value="english" <?php if ($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>EN</option>
                <option value="cn" <?php if ($this->session->userdata('site_lang') == 'cn') echo 'selected="selected"'; ?>>CN</option>
              </select>
            </li>
          </ul>
        </div>
      </div>
    </nav>
