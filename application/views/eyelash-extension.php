
<?php include(APPPATH.'views/website_header.php'); ?>


<!-- Page Content -->

<section >

  <div class="row mymargin2" >

    <div class="col-md-12 d-none d-md-block text-center"><h1 class="h1hra"><?php echo lang('classic'); ?></h1></div> 

    <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('classic'); ?></h1></div> 

  </div>

  <div class="container-fluid Esec1bg mymargin-b">
  <div class="Asec2-text">
    <p>
      {classic_lashes}
      

    </p></div></div>
  </section>


  <section >

    <div class="row Asec3" >

      <div class="col-md-12 d-none d-md-block text-center"><h1 class="h1hre"><?php echo lang('volumation'); ?></h1></div> 

      <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('volumation'); ?></h1></div>


    </div>

    <div class="container-fluid Asec3bg">

      <p class="Asec2-text">
        {volumation_eyelash}
        
      </p>
    </div>
  </section>
    <section class="Asec4 mt-5">
      <div class="container-fluid">
               <center><div class="col-md-10"><span class="Esec3h1"><?php echo lang('stay_fresh'); ?></span></div>
               
          </center>
      </div>

    </section>
 <!--<section class="Esec3 mymargin">
    <div class="container-fluid">
     <center><div class="col-md-10"><span class="Esec3h1"><?php echo lang('stay_fresh'); ?></span></div></center>
   </div>
 </section>-->

 <section >

  <div class="row mymargin " >

    <div class="col-md-12 d-none d-md-block text-center"><h1 class="h1hra"><?php echo lang('bridal'); ?></h1></div> 
   
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('bridal'); ?></h1></div> 


 </div>

 <div class="container-fluid Esec4">

  <div class="Asec4-text">
    <h2><?php echo lang('x_bridal'); ?></h2><br>
    {bridal_section_1}
  <br>

    {bridal_section_2}
      <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us"><button class="btn btna btn-outline-black"><?php echo lang('book'); ?></button></a><br><br>
  </div>
</div></section>



<?php if($video!=''){ ?>
<section class="my-video">


<div class="col-md-8 offset-md-2">
  
<div class=" embed-responsive embed-responsive-16by9">

  <iframe class="embed-responsive-item" src="{video}" allowfullscreen></iframe>

</div>
</div>


</section>
<?php } ?>


   <section class="Asec4 mt-5">
      <div class="container-fluid">
               <center><div class="col-md-10"><span class="Esec3h1"><?php echo lang('result'); ?></span></div>
                <p class="Esec6p" style="margin-bottom: 0 !important; "><?php echo lang('customer'); ?></p>
          </center>
      </div>

    </section>


<section>
  <div class="row blocks mt-5" >
    <div class="col-md-6 a-f-px" >
      <img src="<?php echo base_url();?>website_assets/images/eyelash-extension/leftblock.jpg" alt="Eyelash Extension Services – Xtreme Lashes HK" class="img-responsive" width="100%"> 
    </div>
    <div class="col-md-6 testimon">
      <p class="testimonial">
        {reviews_section_1}
      </p>

    </div>
  </div>
</section>
<section>
  <div class="row blocks brush3">

    <div class="col-md-6 testimon">
      <p class="testimonial">
        {reviews_section_2}
      </p>


    </div>
    <div class="col-md-6 a-f-px" >
      <img src="<?php echo base_url();?>website_assets/images/eyelash-extension/rightblock.jpg" alt="Xtreme Lashes Bridal – Xtreme Lashes HK" class="img-responsive" width="100%"> 
    </div>
  </div>
</section>


<?php include(APPPATH.'views/website_footer.php'); ?>