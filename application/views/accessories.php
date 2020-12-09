<?php include(APPPATH.'views/website_header.php'); ?>

<!-- top margin -->
<div style="margin: 3%"></div>
<!-- /top margin -->


<!-- Page Content -->
<section>
 <div class="row mymargin2">
 <div class="col-md-12 d-none d-md-block text-center"><h1 class="h1hrg"><?php echo lang('shop_eyelash_aac') ?></h1></div> 
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('shop_eyelash_aac') ?></h1></div> 
</div>
</section>
<div class="row acc acc-brush1">

    <div class="col-sm-6 col-md-4 product">
        <div class="mycontainer">
          <img src="<?php echo base_url() ?>website_assets/images/accessories/imga.jpg" alt="Faux Mink X-Wrap – Xtreme Lashes HK" style="width:100%;">
            <div class="centered-con">
               <center><h2  class="access"><?php echo lang('faux') ?></h2>
                   <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us"><button class="btn btna btn-outline-white"><?php echo lang('book') ?></button></a>
               </center> 
            </div>
          </div>
    </div>
<!--Product-->
<?php $count = 2; ?>
<?php foreach ($results as $result) { ?>
  <?php if($count==7){ echo "<div class='row acc acc-brush2'>"; } ?>

  <?php if($count==9) { ?>


      <div class="col-sm-6 col-md-4 product">
        <div class="mycontainer">
          <img src="<?php echo base_url() ?>website_assets/images/accessories/imgb.jpg" style="width:100%;">
            <div class="centered-con">
               <center><h2  class="access"><?php echo lang('global') ?></h2>
                   <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us"><button class="btn btna btn-outline-white"><?php echo lang('book') ?></button></a>
               </center> 
            </div>
          </div>
    </div>

  <?php $count++; }  ?>
<?php if($count==13){  ?>

      <div class="row acc acc-brush3">
    <!---------------------------------------------------------->
     <div class="col-sm-6 col-md-4 product">
        <div class="mycontainer">
          <img src="<?php echo base_url() ?>website_assets/images/accessories/imgc.jpg" style="width:100%;">
            <div class="centered-con">
               <center><h2  class="access"><?php echo lang('become') ?></h2>
                   <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us"><button class="btn btna btn-outline-white"><?php echo lang('book') ?></button></a>
               </center> 
            </div>
          </div>
    </div>
         <!--Product-->
     

<?php $count++;}  ?>

    <div class="col-sm-6 col-md-4 product">
       <center><img class="product-image img-responsive" alt="<?php echo $result->name ?> – Xtreme Lashes HK" src="<?php echo base_url() ?>uploads/<?php echo $result->thumbnail?>">
        <p class="product-title"><?php if($this->session->userdata('site_lang')=='cn'){?>
          <?php echo $result->name_cn ?>
        <?php }else{ ?>
          <?php echo $result->name ?>
        <?php } ?><br>
          <span class="product-subtitle"><?php echo $result->quantity ?></span>
        </p>
        <p class="product-price">$<?php if($result->price==0){echo "X";}else{ echo $result->price; } ?></p>
        <a href="<?php echo base_url() ?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>product/<?php echo $result->slug ?>" class="view-product"><?php echo lang('view') ?> ></a>
  </center>  </div>
  <?php if($count==6 || $count == 12 || $count ==21){ echo "</div>"; } ?>

<?php $count++; } ?>
 





</div>

<div class="col-md-12 d-none d-md-block text-center " style="margin-top: 10px"><?php echo $content_area; ?></div>

<center><?php echo $links ?></center>

<!-- footer -->
<?php include(APPPATH.'views/website_footer.php'); ?>
