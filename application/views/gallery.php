<?php include(APPPATH.'views/website_header.php'); ?>

<!-- Page Content -->

<section >

 <?php $count = 0 ; foreach($albums as $album){ ?>
   <div class="row" style="margin:3%" > 
    <?php if($this->session->userdata('site_lang')=='cn'){?>
          <div class="col-md-12 d-none d-md-block text-center"><h1 class="h1hra"><?php echo $album['album_name_cn']; ?></h1></div> 

    <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo $album['album_name_cn']; ?></h1></div> 
        <?php }else{ ?>
          <div class="col-md-12 d-none d-md-block text-center"><h1 class="h1hra"><?php echo $album['album_name']; ?></h1></div> 

    <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo $album['album_name']; ?></h1></div> 
        <?php } ?>
    
  </div>
  <div class="row gallery <?php switch($count%5){case 0:echo "gallery-brush1";break;
  case 1:echo "gallery-brush2";break;
  case 2:echo "gallery-brush3";break;
  case 3:echo "gallery-brush4";break;
  case 4:echo "gallery-brush5";break;} ?>">
<?php if(count($album['images'])>0){ $countimg = 1;?>
  <div class="wrapper">
  <div data-carousel-3d>
   <?php foreach($album['images'] as $image){ ?>
   
    <img src="<?php echo base_url();?>uploads/<?php echo $image['image']; ?>" <?php if($countimg==1){echo "selected";} ?>>
  
<?php $countimg++;} }?>
  </div>
</div>
  
</div> 

<?php $count++; } ?>

</section>      



<!-- footer -->
<?php include(APPPATH.'views/website_footer.php'); ?>
