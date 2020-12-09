<?php include(APPPATH.'views/website_header.php'); ?>

<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

    </ol>
     <div class="carousel-inner">
      <?php $count = 1; ?>
   <?php foreach($slides as $slide){
		$alt = '';
		if($slide['id'] == 1){
			$alt = 'Eyelash Extensions in HK – Xtreme Lashes HK';
		}elseif($slide['id'] == 2){
			$alt = 'Lash Extensions in HK – Xtreme Lashes HK';
		}else{
			$alt = 'Los Angeles';
		}
   ?>
     <div class="carousel-item <?php if($count == 1){ echo 'active'; }  ?>">
      <div class="slidecontainer">
       
       <img src="<?php echo base_url();?>uploads/<?php echo $slide["image"]?>" alt="<?php echo $alt ?>" width="100%" >
      <div class="<?php if($slide['position'] == 'RIGHT'){ echo 'slideright'; } else { echo "slideleft";} ?>" >
        <center>
          <?php if($this->session->userdata('site_lang')=='cn'){?>
          <?php echo $slide['text_html_cn'] ?>
        <?php }else{ ?>
          <?php echo $slide['text_html'] ?>
        <?php } ?>
          <div class="myspace d-none d-md-block"><a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us"><button class="btn btn-dark"><?php echo lang('book'); ?></button></a></div>
        

        </center>
      </div>
    </div>
  </div>

  <?php $count++;}  ?>

    


    </div>
     
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only"><?php echo lang('previous'); ?></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only"><?php echo lang('next'); ?></span>
    </a>
  </div>
</header>

<!-- Page Content -->
<section class="sec1">
  <div class="container-fluid">
   <center><div class="col-md-10">{content_below_slider}</div></center>
 </div>

</section>
<section>

<div class="col-md-12 d-none d-md-block text-center "><h1 class="h1hre removehr"><?php echo lang('natural_looking_lext'); ?></h1></div> 
   
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('natural_looking_lext'); ?></h1></div> 
  <center><div class="col-md-7 sec3-text">
  <?php echo lang('natural_looking_lext_content'); ?></div>
 
</center> 
</section>
<section>

 <div class="row sec2">
  <div class="col-md-6 left">
    <div class="mycontainer">
      <img src="<?php echo base_url();?>website_assets/images/home/leftblock.jpg" alt="Shop Products – Xtreme Lashes HK" style="width:100%;">
      <div class="centered d-block">
        <center><a href="<?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>accessories/all" class="mylink"><h2 class="block1h1"><?php echo lang('shop'); ?><br>   > </h2></a></center> 
      </div>



    </div>
  </div>
  <div class="col-md-6 right">
    <div class="mycontainer home-academy-training-mycontainer">
      <img src="<?php echo base_url();?>website_assets/images/home/black.png" style="width:100%;">
      <div class="centered home-academy-training-centered">
        <center><h2 class="block2h2  d-block" ><?php echo lang('academy'); ?><br></h2>
          <hr class="hr-light hrb">


          <p class="block2pa d-block">
            {academy_training}
          </p>

          <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>training"><button class="btn btna btn-outline-white"><?php echo lang('learn'); ?></button></a>

        </center> 

      </div>
    </div>
  </div>
</div>

</section>

<section>

<div class="col-md-12 d-none d-md-block text-center "><h1 class="h1hre"><?php echo lang('result'); ?></h1></div> 
   
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('result'); ?></h1></div> 
  <center><div class="col-md-7 sec3-text">
  {result_you_love} </div>
  <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>eyelash_extensions"><button class="btn btna btn-outline-black"><?php echo lang('read'); ?></button></a>

</center> 
<div class="col-md-12 d-none d-md-block text-center " style="margin-top: 10px"><?php echo $content_area; ?></div> 

</section>


<section class="">
 <div class="container-fluid sec4 sec4pad" >
   <center> 
    <div class="twentytwenty-container">
      <img src="<?php echo base_url();?>website_assets/images/home/before.jpg" alt="Eyelash Extensions Before – Xtreme Lashes HK" class="img-responsive" style="width: 100%">   
      <img src="<?php echo base_url();?>website_assets/images/home/after.jpg" alt="Eyelash Extensions After – Xtreme Lashes HK" class="img-responsive" style="width: 100%"></div>
    </center>
  </div>
</section>

<section>

<div class="col-md-12 d-none d-md-block text-center "><h1 class="h1hre removehr"><?php echo lang('get_eyelash_ext'); ?></h1></div> 
   
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('get_eyelash_ext'); ?></h1></div> 
  <center><div class="col-md-7 sec3-text">
  <?php echo lang('get_eyelash_ext_content'); ?></div>
 
</center> 
</section>
<section>

 <div class="row sec5">
  <div class="custom-map col-md-6 left">
  <div style="height:49%">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1845.7442723302386!2d114.173542!3d22.297356!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x45ab02cfb68a4415!2sK11!5e0!3m2!1sen!2sus!4v1575630479106!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
  <div style="height:49%; margin-top:10px;">
   <?php echo $map; ?>
   </div>
 </div>
 <div class="col-md-6 right">
  <div class="mycontainer">
    <img src="<?php echo base_url();?>website_assets/images/home/getdirection.jpg" alt="Get Directions – Xtreme Lashes HK" style="width:100%;">
    <div class="centered">
     <center><a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us/" class="hover-color"><h2  class="block1h1"><?php echo lang('get_direction'); ?><br>   > </h2></a></center>

   </div>
 </div>
</div>
</div>
</section>

<section class="sec6">
<div class="container-fluid text-bg contactme">
                
                                    
                                    <center>    <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us/" style="color:white"><h2  class="block2h2 "><?php echo lang('contact'); ?></h2></a>
                                            <hr class="hr-light">

                                            <p class="block2pa">
                                                <?php echo lang('phone'); ?>: <a href="tel:<?php echo $tel ?>"><?php echo strip_tags($phone);?></a><br>
                                                <?php echo lang('email'); ?>: <a href="mailto:<?php echo strip_tags($email) ?>"><?php echo strip_tags($email); ?></a><br>
                                                <?php echo strip_tags($address); ?>
                                            </p></center>
        </div></div>
</section>

<div class="row">

  <div class="col-md-12 d-none d-md-block text-center mt-5"><h1 class="h1hrc"><?php echo lang('instagram'); ?></h1></div> 
   
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('instagram'); ?></h1></div> 

</div>

<div class="container-fluid" style="color: white !important;">

 <!--  <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/79a1e5692ed851e69288aafbb8a6316a.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe> -->

  <!-- <iframe src="https://www.powr.io/plugins/instagram-feed/view?unique_label=8daf4eed_1541046945&external_type=iframe" width="100%" height="600" frameborder="0"></iframe> -->

  <!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
  <div class="elfsight-app-76ab7f2b-60d3-433d-aca2-136d079f51e5"></div> -->

 <!-- LightWidget WIDGET --><script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/e21a00623cb6549ca13c35f417fde686.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>


</div>

</section>






<?php include(APPPATH.'views/website_footer.php'); ?>
