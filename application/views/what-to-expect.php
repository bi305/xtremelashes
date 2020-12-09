<?php include(APPPATH.'views/website_header.php'); ?>

<!-- Page Content -->

<section >


 <div class="row mymargin2  " >
  <div class="col-md-12 d-none d-md-block text-center"><h1 class="h1hrg"><?php echo lang('procedure') ?></h1></div> 

  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('procedure') ?></h1></div> 

</div>

<div class="container-fluid mymargin-b">
  <p class="Asec2-text" style="margin-bottom: 0 !important">
    {procedure}
  </p>
</div>
</section>
<?php if($video!=''){ ?>
<section class="my-video">
  <div class="col-md-8 offset-md-2">



    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="{video}" allowfullscreen></iframe>
    </div>
  </div>
</section> 
<?php } ?>  

<section >
  <div class="container steps">
   <?php echo lang('step_1') ?>

 </div>
 <div class="row " >

    <div class="col-md-12 d-none d-md-block text-center"><h2 class="h1hrh"><?php echo lang('fit') ?></h2></div> 
    
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h2 class="Aha"><?php echo lang('fit') ?></h2></div> 

</div>

<div class="container">
  {step_1}

</div>
</section>

<section >
  <div class="container steps">
   <?php echo lang('step_2') ?>

 </div>

 <div class="row">
  <div class="col-md-12 d-none d-md-block text-center"><h2 class="h1hrd"><?php echo lang('genius') ?></h2></div> 
    
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h2 class="Aha"><?php echo lang('genius') ?></h2></div>
</div>
<div class="container-fluid wte-brush2"> <div class="container  ">
  {step_2}
</div></div>
</section>


<div class="row wte-img" >
  <div class="col-md-6"></div>

  <div class="col-md-6 mycol" >
    <center><h1 class="wte-h1" ><?php echo lang('safe') ?></h1>
     <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>eyelash_extensions"><button class="btn btna btn-outline-white" style="letter-spacing: 1px"><?php echo lang('read') ?></button></a>
   </center>

 </div>
</div>

<section >
  <div class="container-fluid wte-brush3">
    <div class="container steps">
     <?php echo lang('step_3') ?>

   </div>
   <div class="row " >

    
  <div class="col-md-12 d-none d-md-block text-center"><h2 class="h1hre"><?php echo lang('sleep') ?></h2></div> 
    
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h2 class="Aha"><?php echo lang('sleep') ?></h2></div> 

  </div>

  <div class="container">

    {step_3}

  </div></div>
</section>

<section class="Asec4 mymargin">
  <div class="container-fluid">
   <center><div class="col-md-10"><span class="Asec4h1"><?php echo lang('small_big') ?></span></div>
     <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us"><button class="btn btna btn-outline-white"><?php echo lang('book') ?></button></a></center>
   </div>

 </section>


 <section >
  <div class="container-fluid wte-brush4">
    <div class="container steps">
     <?php echo lang('step_4') ?>

   </div>
   <div class="row " >

   <div class="col-md-12 d-none d-md-block text-center"><h2 class="h1hrc"><?php echo lang('progress') ?></h2></div> 
    
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h2 class="Aha"><?php echo lang('progress') ?></h2></div> 

  </div>

  <div class="container">

    {step_4}
    <center><a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us"><button class="btn btna btn-outline-black"><?php echo lang('book') ?></button></a></center>

  </div></div>
</section>



<?php include(APPPATH.'views/website_footer.php'); ?>
