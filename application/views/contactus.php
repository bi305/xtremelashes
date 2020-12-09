
<?php include(APPPATH.'views/website_header.php'); ?>


<!-- Page Content -->

<style type="text/css">
  #input_email{
    display:none;
  }
</style>
<section>
  <div class="container-fluid contact-form">
    <div class="container " >

      <?php echo $this->session->flashdata('success'); ?>
           <form method="post" id="contact_form" action="<?php echo base_url() ?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>contact_us/appoint/">
        <div class="row"> 
          <div class="col-md-12">
           <input type="text" name="name" class="form-input" placeholder="<?php echo lang('full_name') ?>*" required="" oninvalid="this.setCustomValidity('<?php echo lang('validation') ?>')"
           oninput="setCustomValidity('')">
         </div>
         <div class="col-md-6">
          <input type="tel" id="hp" name="phone" class="form-input" required="" oninvalid="this.setCustomValidity('<?php echo lang('validation') ?>')"
          oninput="setCustomValidity('')">
        </div>
        <input type="hidden" name="fphone">
        <div class="col-md-6">

          <input id="input_email" type="email" name="email">


          <input type="text" name="xmail" class="form-input" placeholder="<?php echo lang('email_address') ?>*" required="" oninvalid="this.setCustomValidity('<?php echo lang('validation') ?>')"
          oninput="setCustomValidity('')">
        </div>
        <div class="col-md-6">
          <input type="text" name="date_x" id="date_app" class="datepicker form-input" placeholder="<?php echo lang('booking_date') ?>" required="" onchange="getHours()" readonly> 
          <input type="hidden" id="date" name="date" > 
        </div>
        <div class="col-md-6">
          <select class="form-input" name="location" required="" onchange="getHours()" id="loc_app">
            <option value=''><?php echo lang('location') ?></option>
            <?php foreach($locations_dropdown as $loc){ ?>
              <option value='<?php echo $loc["id"] ?>'><?php if($this->session->userdata('site_lang')=='cn'){?>
                <?php echo $loc["location_name_cn"] ?>
              <?php }else{ ?>
                <?php echo $loc["location_name"] ?>
                <?php } ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-6">
            <select class="form-input myselect" id="select1" name="time1" required="">
              <option value=''><?php echo lang('option_1') ?></option>

              

            </select>
          </div>
          <div class="col-md-6">
            <select class="form-input myselect" id="select2" name="time2" required="">
              <option value=''><?php echo lang('option_2') ?></option>
              
            </select>
          </div>

          <div class="col-md-12">
            <textarea class="form-input" rows="8" placeholder="<?php echo lang('message') ?>" name="message"></textarea>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4">
           
            <!-- <div class="g-recaptcha form-input" data-theme="dark" style="background: white" data-sitekey="6Lcg9nQUAAAAAKsbsTO6rqjBxfkgCZa4U204JK3G"></div> -->
          </div>
          
          
          <div class="col-md-12">
            <center><button class="btn btn-dark book-btn" type="submit" id="submit_button"><?php echo lang('book_now') ?></button></center>
          </div>
        </form>



      </div>
    </div>


  </div>
</section>

<script>



</script>



<section >

 <div class="row mt-1" >

  <div class="col-md-12 d-none d-md-block text-center mb-5"><br><br><h1 class="h1hrd"><?php echo $map1_heading ?></h1></div> 
  
  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo $map1_heading ?></h1></div> 

</div>

<div class="row c-brush2 ">
  <div class="col-md-4 con-left">
    <div class="mycontainer contact-us-mycontainer">
      <img src="<?php echo base_url() ?>website_assets/images/contact/leftblock1.jpg" class="d-none d-sm-none d-md-block" style="width:100%;">
      <img src="<?php echo base_url() ?>website_assets/images/contact/leftblock1b.jpg" class="d-none d-sm-block d-md-none" style="width:100%;">
      <img src="<?php echo base_url() ?>website_assets/images/contact/leftblock1.jpg" class="d-block d-sm-none" style="width:100%;">
      
      <div class="centered">
       <center><h2 class="contact-ha" ><?php echo lang('get_in') ?><br></h2>
        <hr class="hr-contact">


        <p class="contact-pa" style="padding: 0;">
          <?php echo lang('phone') ?>: <a href="tel:<?php echo $tel1; ?>"><?php echo strip_tags($phone1) ?></a><br>
          <?php echo lang('email') ?>: <a href="mailto:<?php echo strip_tags($email1) ?>"><?php echo strip_tags($email1) ?></a></p>


          <p class="contact-pa">
           <?php echo strip_tags($address1) ?>
         </p>

       </center> 
     </div>



   </div>
 </div>
 <div class="custom-map col-md-8 con-right">
  <?php echo $map1; ?>
</div>



</div>


</section>

<?php if($map2!=''){ ?>
<section >

 <div class="row mt-1" >

  <div class="col-md-12 d-none d-md-block text-center mb-5"><br><br><h1 class="h1hrd"><?php echo $map2_heading ?></h1></div> 

  <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo $map2_heading ?></h1></div> 

</div>

<div class="row c-brush3 ">

 <div class="custom-map col-md-8 con-left">
  <?php echo $map2; ?>
</div>
<div class="col-md-4 con-right">
  <div class="mycontainer contact-us-mycontainer">
    <img src="<?php echo base_url() ?>website_assets/images/contact/leftblock1.jpg" class="d-none d-sm-none d-md-block" style="width:100%;">
    <img src="<?php echo base_url() ?>website_assets/images/contact/leftblock1b.jpg" class="d-none d-sm-block d-md-none" style="width:100%;">
    <img src="<?php echo base_url() ?>website_assets/images/contact/leftblock1.jpg" class="d-block d-sm-none" style="width:100%;">

    <div class="centered">
     <center><h2 class="contact-ha" ><?php echo lang('get_in') ?><br></h2>
      <hr class="hr-contact">


      <p class="contact-pa" style="padding: 0;">
        <?php echo lang('phone') ?>: <a href="tel:<?php echo $tel2; ?>"><?php echo strip_tags($phone2) ?></a><br>
        <?php echo lang('email') ?>: <a href="mailto:<?php echo strip_tags($email2) ?>"><?php echo strip_tags($email2) ?></a></p>


        <p class="contact-pa">
         <?php echo strip_tags($address2) ?>
       </p>

     </center> 
   </div>



 </div>
</div>
<div class="col-md-12 mt-5"><center>
  <h1 class="Asec4h1" style="color: #000; margin-top: 50px;"><?php echo lang('small_big') ?></h1>
  <a href="<?php echo base_url();?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?>eyelash_extensions"><button class="btn btna btn-outline-black"><?php echo lang('read') ?></button></a></center></div>


</div>


</section>
<?php } ?>






<section >

 <div class="row mt-5" >

   <div class="col-md-12 d-none d-md-block text-center"><br><br><h1 class="h1hrb"><?php echo lang('alt') ?></h1></div> 
   
   <div class="col-md-4 d-block d-xs-block d-sm-block d-md-none d-lg-none"><h1 class="Aha"><?php echo lang('alt') ?></h1></div> 

 </div>

 <div class="container">
   <center>
    <p class="Asec3-text">
      <?php echo lang('see_below') ?><br>
      <?php echo lang('service') ?>
    </p>
  </center>
  <?php if($this->session->userdata('site_lang')=='cn'){?>
    <div class="row" style="margin-bottom: 5%;">
      {locations_footer}
      <div class="col-md-4">
        <center>
         <p class="Asec3-text">
           <b>{location_name_cn}</b><br>
           <b style="color:#887711">{person_name_cn}</b><br>
           <small style="color:#887711">{certificate_cn}</small><br>
           {address_line_1_cn}<br>
           {address_line_2_cn}<br>
           <a style="text-decoration:underline;cursor:pointer; color: #000;" onclick="window.open('tel:{contact_no}','_self');">{contact_no}</a>
         </center>
       </div>
       {/locations_footer}


     </div>
   <?php }else{ ?>
    <div class="row" style="margin-bottom: 5%;">
      {locations_footer}
      <div class="col-md-4">
        <center>
         <p class="Asec3-text">
           <b>{location_name}</b><br>
           <b style="color:#887711">{person_name}</b><br>
           <small style="color:#887711">{certificate}</small><br>
           {address_line_1}<br>
           {address_line_2}<br>
           <a style="text-decoration:underline;cursor:pointer; color: #000;" onclick="window.open('tel:{contact_no}','_self');">{contact_no}</a>
         </center>
       </div>
       {/locations_footer}


     </div>
   <?php } ?>

 </section>







 <!-- footer -->
 <?php include(APPPATH.'views/website_footer.php'); ?>


