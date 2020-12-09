<?php include(APPPATH.'views/website_header.php'); ?>

<style type="text/css">
  #input_email{
    display:none;
  }
</style>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title"><?php echo $product['name'] ?></h4>
      </div>
      <div class="modal-body">

        <div class="col-md-12">
         <form action="<?php echo base_url() ?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>product/inquiry/" method="post" id="contact_form">
          <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
          <input id="input_email" type="email" name="email">

          
          <div class="form-group">

            <input type="text" class="form-control" name="name" placeholder="<?php echo lang('full_name') ?>" required="">
          </div>
          <input type="hidden" name="fphone">
          <div class="form-group">

            <input type="tel" id="hp" class="form-control" name="phone" placeholder="" required="">
          </div>
          <div class="form-group">

            <input type="text" name="xmail" class="form-input" placeholder="<?php echo lang('email_address') ?>*" required="" oninvalid="this.setCustomValidity('<?php echo lang('validation') ?>')"
          oninput="setCustomValidity('')">

          </div>
          <div class="form-group">
            
            <textarea placeholder="<?php echo lang('message') ?>"  class="form-control" name="message"></textarea>
          </div>
          <div class="form-group">

            <!-- <div class="g-recaptcha form-input" data-theme="dark" style="background: white" data-sitekey="6Lcg9nQUAAAAAKsbsTO6rqjBxfkgCZa4U204JK3G"></div> -->
          </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-dark" id="submit_button"><?php echo lang('submit') ?></button>
      </form>
      <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo lang('close') ?></button>
    </div>
  </div>

</div>
</div>
<!-- top margin -->
<div style="margin: 6%"></div>
<!-- /top margin -->


<!-- Page Content -->
<section>
  <div class="row pw-pad">

    <div class="col-md-6">
      
     <div id="gallery">
       <center> <div id="panel">
        <img id="largeImage" src="<?php echo base_url() ?>uploads/<?php echo $product['thumbnail'] ?>" />
      </div></center>
      <?php if(count($product['images']) > 0 ) { ?>
        <div  id="thumbs">
          <img class="img-thumbnail" src="<?php echo base_url() ?>uploads/<?php echo $product['thumbnail'] ?>"/>
          <?php foreach($product['images'] as $image){ ?>
            <img  src="<?php echo base_url() ?>uploads/<?php echo $image['image'] ?>" />
          <?php } ?>
          
        </div>
      <?php } ?>

    </div>
  </div>

  <div class="col-md-6">
    <?php echo $this->session->flashdata('success'); ?>
    
    <h1 class="product-name"><?php if($this->session->userdata('site_lang')=='cn'){?>
      <?php echo $product['name_cn']; ?>
    <?php }else{ ?>
      <?php echo $product['name']; ?>
      <?php } ?></h1>
      <p class="product-price">$<?php echo $product['price']; ?></p>
      <p class="product-description">
        <?php if($this->session->userdata('site_lang')=='cn'){?>
          <span style="color: #666666; font-family: lato, arial; font-size: 14px;"><?php echo $product['description_cn']; ?></span>
        <?php }else{ ?>
          <span style="color: #666666; font-family: lato, arial; font-size: 14px;"><?php echo $product['description']; ?></span>
        <?php } ?>
        
        
      </p>
      <button class="btn btn-inquiry" data-toggle="modal" data-target="#myModal"><?php echo lang('inquiry') ?></button>

      <hr class="hraa">
      <p class="product-description">   
        <b>  <?php echo lang('details') ?></b>
        <br>
        <?php if($this->session->userdata('site_lang')=='cn'){?>
          <span style="color: #666666; font-family: lato, arial; font-size: 14px;"><?php echo $product['details_cn']; ?></span>
        <?php }else{ ?>
          <span style="color: #666666; font-family: lato, arial; font-size: 14px;"><?php echo $product['details']; ?></span>
        <?php } ?>

      </div>
      

    </div>
  </section>

  <style>
    
    .video-full{
      width:100%;
    }
    .video-half{
      width:50%;
      float:left;
    }

    @media only screen and (max-width: 600px) {
        .video-full{
          width:100%;
        }
        .video-half{
          width:100%;
        }
    }
  </style>
  <?php if($video!=''){ ?>  
    <section style="margin-top: 30px; margin-bottom: 30px;">

      <?php
          $videos = explode(",", $video);

          foreach($videos as $key=>$v) {

            $vid_css = 'video-full';

            if(count($videos) > 0){
              $vid_css = 'video-half';
            }

            if($key==count($videos)-1){

              if(count($videos) % 2 != 0){
                  $vid_css = 'video-full';
              }
            }

        ?>  

        

        <div class="<?php echo $vid_css ?> embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="<?php echo $v ?>" allowfullscreen></iframe>
        </div>

      <?php } ?>

    </section>
  <?php } ?>
  

  <section style="clear:both">
    <div class="row Asec3" > 
     <div class="col-md-12 d-none d-md-block text-center"><h1 class="h1hrf"><?php echo lang('you_may_like') ?></h1></div> 
     <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><hr class="Ahra"></div>
     <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('you_may_like') ?></h1></div> 
     <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><hr class="Ahra"></div>
   </div>
   <div class="row mt-5 mb-5">
    <div class="col-md-1"></div>
    <?php foreach($products as $pro){ ?>
      <div class="col-md-2 col-sm-6 more-pro">
        <a href = "<?php echo base_url() ?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>product/<?php echo $pro['slug'] ?>" ><img src="<?php echo base_url() ?>uploads/<?php echo $pro['thumbnail'] ?>" title="<?php if($this->session->userdata('site_lang')=='cn'){?>
          <?php echo $pro['name_cn']; ?>
        <?php }else{ ?>
          <?php echo $pro['name']; ?>
          <?php } ?>" class="more-products"></a>
        </div>
      <?php  } ?>

      <div class="col-md-1"></div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script type="text/javascript">
      $('#thumbs img').click(function()
      {
        $('#largeImage').attr('src',$(this).attr('src').replace('thumb','large'));
        
      });

    </script>

    <!-- footer -->
    <?php include(APPPATH.'views/website_footer.php'); ?>

