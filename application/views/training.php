<?php include(APPPATH.'views/website_header.php'); ?>

<header>

 <div class="row">
  <div class="slidecontainer col-md-12" style="padding: 0;">
    <img src="<?php echo base_url() ?>website_assets/images/training/header.jpg" alt="Lash Stylist – Xtreme Lashes HK" width="100%" >
    <div class="slideleft my-padding">

      <div class="d-none d-md-block"  style=" color: #fff;">
        <center>
          <p class="t-p1"><?php echo lang('become_a') ?></p>
          <h1 class="t-h1 d-none d-sm-block"><?php echo lang('lash_stylist') ?></h1>

          
          <hr class="t-hr">
          <p class="t-p2">
            <?php echo lang('we_offer') ?></p>
          <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us"><button class="btn btna t-btn btn-outline-white" style="letter-spacing: 1px"><?php echo lang('book_now') ?></button></a>
        </center>
      </div>
       <div class="d-block d-block d-xs-block d-sm-block d-md-none d-lg-none"  style=" color: #fff;">
              <center>
                <p class="t-p1"><?php echo lang('become_a') ?></p>
                <h1 class="t-h1"><?php echo lang('lash_stylist') ?></h1>
                  <hr class="t-hr">
               
            </center>
            </div>

    </div>
  </div>
</div>
   <div class=" d-block d-block d-xs-block d-sm-block d-md-none d-lg-none"  style=" color: #000;">
              <center>
               
                <p class="t-p2 mt-4">
                    <?php echo lang('we_offer') ?></p>
              <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us"><button class="btn btna t-btn btn-outline-black" style="letter-spacing: 1px"><?php echo lang('book_now') ?></button></a>

            </center>
            </div>


</header>

<!-- Page Content -->

<section >

 <div class="container-fluid mt-5">

  <div class="col-md-12 d-none d-md-block text-center"><br><br><h1 class="h1hrd"><?php echo lang('training') ?></h1></div> 
   
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('training') ?></h1></div> 

</div>
<div class="row tra-bg1">
  <div class="container">

    {training_section}

  </div></div>
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

 <div class="row mt-5" >

   <div class="col-md-12 d-none d-md-block text-center"><br><br><h1 class="h1hrd"><?php echo lang('sign_up') ?></h1></div> 
   
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('sign_up') ?></h1></div> 

</div>

<div class="container">
 <center>
  <p class="signup-text">
    {signup}
  </p>
</center>
</div>
</section>
<?php include(APPPATH.'views/website_footer.php'); ?>

