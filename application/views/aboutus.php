<?php include(APPPATH.'views/website_header.php'); ?>

  <header>

   <div class="row">
    <div class="slidecontainer col-md-12" style="padding: 0;" >
      <img src="<?php echo base_url() ?>website_assets/images/about/header.jpg" alt="Hong Kong’s Best Eyelash Extensions – Xtreme Lashes HK" style="width:100%;" width="100%" >
      <div class="slideleft  d-none d-md-block"> 

       <center> 
        <p class="p1"> <?php echo lang('hong_best');?></p>
        <h1 class="h1" ><?php echo lang('lash_extnsions');?></h1>
      </center>
    </div>


    <div class="slideleft  d-block d-block d-xs-block d-sm-block d-md-none d-lg-none ">
      <center>
        <p class="p1"> <?php echo lang('hong_best_1');?></p>
        <h1 class="h1" ><?php echo lang('lash_extnsions');?></h1>
      </center>
    </div>


  </div>
</div>
</header>

<!-- Page Content -->

<section >

  <div class="mymargin"></div>
  <div class="row" >
    <div class="col-md-12 d-none d-md-block text-center  "><h1 class="h1hre"><?php echo lang('why_lash') ?></h1></div> 
    
    <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('why_lash') ?></h1></div> 



  </div>

  <div class="container-fluid Asec2bg"> 
    <div class="Asec2-text">
      {why_xtreme_lashes}
    </div></div>
  </section>
  <section >

    <div class="mymargin"></div>
    <div class="row" >
      <div class="col-md-12 d-none d-md-block text-center"><h1 class="h1hra"><?php echo lang('our_mission') ?></h1></div> 

      <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('our_mission') ?></h1></div> 


    </div>

    <div class="container-fluid Asec3bg">
      <center>
        <div class="Asec3-text">
          {our_mission}
          <a href="<?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>eyelash_extensions"><button class="btn btna no-margin btn-outline-black"><?php echo lang('read') ?></button></a>
        </div>
      </center>
      <div class="Asec3-text">
        {our_mission_2}
      </div>
    </div>
  </section>
  <div class="mymargin"></div>
  <section class="Asec4">
    <div class="container-fluid">
     <center><div class="col-md-10"><h1 class="Asec4h1"><?php echo lang('small_big') ?></h1></div>
       <a href="<?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us"><button class="btn btna btn-outline-white"><?php echo lang('book') ?></button></a></center>
     </div>

   </section>


   <section >
    <div class="mymargin"></div>
    <div class="row" >
      <div class="col-md-12 d-none d-md-block text-center"><h1 class="h1hre"><?php echo lang('about_founder') ?></h1></div> 

      <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('about_founder') ?></h1></div> 


    </div>

    <div class="container-fluid ">

      <div class="Asec4-text">
        {about_founder_1}</div>

      </div>

      <section>
       <div class="row brushimg">
        <div class="col-md-1"></div>
        <div class="col-md-5 a-f-p">
          <img src="<?php echo base_url() ?>website_assets/images/about/founder.jpg" class="img-responsive" width="100%">

        </div>
        <div class="col-md-6" >
          <center>

            <div class="Asec4p1">
              <?php echo lang('with_edu') ?></div>
            <img src="<?php echo base_url() ?>website_assets/images/about/sign.png" style="width: 50%; margin: 2%" class="img-responsive">
            <div class="Asec4p2">
             <?php echo lang('jo') ?><br>
             <?php echo lang('co') ?><br></div></center>
           </div>
         </div>
       </section>

       <div class="container-fluid Asec4bg">
        <div class="Asec4-text">
          {about_founder_2}
        </div>
      </div>
    </section>
    <?php include(APPPATH.'views/website_footer.php'); ?>