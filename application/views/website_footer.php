
<section class="sec7" >
  <div class="mymargin"></div>
  <div class="container">
    <center>  
      <a target="_blank" href="<?php echo $facebook; ?>"> <img src="<?php echo base_url() ?>website_assets/images/home/ff.png" class="img-responsive img-icon" ></a>
      <a target="_blank" href="<?php echo $instagram; ?>"> <img src="<?php echo base_url() ?>website_assets/images/home/i.png"  class="img-responsive img-icon" ></a>
      <a target="_blank" href="<?php echo $youtube; ?>"> <img src="<?php echo base_url() ?>website_assets/images/home/y.png"  class="img-responsive img-icon" ></a>

    </center>
    <center style="margin-top:50px"><button id="scroll-top" class="btn btn-dark"><?php echo lang('back_to_top') ?></button></center>
  </div>

</section>

<section >
 <div class="container-fluid sec8" style="background-color: #000;"> 
  <div class="container">
    <div class="row">

      <div class="col-md-6">
        <center><h2 class="newsh  d-block" ><?php echo lang('news') ?></h2>
          <hr class="hr-light">

          <p class="newsp d-block">
            <?php echo lang('sign-up') ?>
          </p>

        </center> 

      </div>
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <input type="Email" name="email" placeholder="<?php echo lang('email_address') ?>" class="email" id="email_field">
        <br>
        <button class="btn btna btn-outline-white" id="subscribe"><?php echo lang('subscribe') ?></button>


      </div>


    </div>
  </div>
</div>
</section>

<script>
  $(function () {

    $('#subscribe').on('click', function (e) {

      if(!validateEmail($('#email_field').val())){
        alert('<?php echo lang("valid") ?>');
      }else{

        $.ajax({
          type: 'post',
          url: '<?php echo base_url() ?>'+ 'main/submit',
          data: {email : $('#email_field').val()},
          success: function () {
            $('#email_field').val('');
            alert('<?php echo lang("subscribed") ?>');

          }
        });
      }

      function validateEmail(email) 
      {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
      }



    });

  });
</script>


<!-- Footer -->
<footer class="py-5 bg-light">



  <div class="container d-none d-md-block">
    <center>
      <a class="footer1" href="mailto:pr@xtremelashes.com.hk"> <?php echo lang('press') ?> </a>         
      <a class="footer1" href="<?php echo base_url() ?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?><?php echo get_page_slug(3) ?>"><?php echo lang('about_us') ?></a>       
      <a class="footer1" href="<?php echo base_url() ?><?php if($this->session->userdata('site_lang')=='cn'){ echo 'cn/';} ?><?php echo get_page_slug(11) ?>"><?php echo lang('terms') ?></a>
      <p class="footer2"><?php echo lang('copy') ?></p>
    </center></div>

    <div class="container d-md-none ">
      <center>
        <a class="footer1" href="mailto:pr@xtremelashes.com.hk"> <?php echo lang('press') ?> </a>  <br>       
        <a class="footer1" href="<?php echo base_url() ?>aboutus"><?php echo lang('about_us') ?></a>       
        <a class="footer1" href="<?php echo base_url() ?>terms"><?php echo lang('terms') ?></a>
        <p class="footer2"><?php echo lang('copy') ?></p>
      </center>


    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->

  <script src="<?php echo base_url() ?>website_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?php echo base_url() ?>website_assets/vendor/jquery/jquery.event.move.js"></script>
  <script src="<?php echo base_url() ?>website_assets/vendor/jquery/jquery.twentytwenty.js"></script>
  <script>
    $(function(){
      $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({default_offset_pct: 0.5});
      $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({default_offset_pct: 0.5, orientation: 'vertical'});
    });
  </script>

  <script>
    $( document ).ready(function() {

      $("#scroll-top").click(function(){
        $('html,body').animate({ scrollTop: 0 }, 'slow');
      });
                    // Handler for .ready() called.
                    $(".custom-map iframe").width('100%');
                    $(".custom-map iframe").height('100%');
                    $(".elfsight-app-76ab7f2b-60d3-433d-aca2-136d079f51e5").next().remove();


                    function initSlider(){
                      var windowheight = $( window ).height();
                      var navbarheight = $(".navbar").innerHeight();

                      var h = windowheight - navbarheight
                      // console.log(h);
                      // console.log(navbarheight);

                      $(".carousel-item").css("max-height", h +"px");
                      $(".slidecontainer").css("max-height", h +"px");
                    }

                    initSlider();

                    

                    $( window ).resize(function() {

                      initSlider();
                    });

                    //console.log(height);

                      // .carousel-item {
                      //     height: 50%;
                      // }

                      // .slidecontainer {
                      //     height: 50%;
                      // }
                    });

                  //eapps-instagram-feed-1
                </script>

                <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
                <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

                <script>
                  var allowedDates = ["10-11-2018", "11-11-2018", "12-12-2018", "13-12-2018"];


                  function DisableSpecificDates(date) {
                    var string = jQuery.datepicker.formatDate('dd-mm-yy', date);
                    if(date.getDay() == 0){
                      //return [false, ''];
                    }


                    return [true, ''];//[disableddates.indexOf(string) == -1];
                  }

  $(function(){
    var dateToday = new Date();

    $( ".datepicker" ).datepicker({ 
      dateFormat: 'dd/mm/yy',
      altFormat: "yy-mm-dd",
      altField: "#date",
      minDate: dateToday,
      beforeShowDay: DisableSpecificDates

    });

  });
</script>


<script type="text/javascript">
  $("#contact_form").submit(function(event){


    // if(grecaptcha && grecaptcha.getResponse().length == 0){
    //   event.preventDefault();
    //   $('.g-recaptcha').css('border','2px red solid');
    //   setTimeout(function(){           
    //    $('.g-recaptcha').css('border','');
    //  }, 600);
    // }else{
      $("#contact_form input[name=fphone]").val($("#hp").intlTelInput("getNumber"));
      $('#submit_button').prop('disabled', true);

    //}
  });  




  $('#hp').intlTelInput(
    {initialCountry: "auto",
    utilsScript: '<?php echo base_url() ?>website_assets/tel/js/utils.js',
    geoIpLookup: function(success, failure) {
      $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        success(countryCode);
      });
    }
  });





</script>

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js" type="text/javascript"></script>

<?php
echo get_content('google_analytics');

echo get_content('fb_pixel');
?>
<script type="text/javascript">

  var getHours = function(){
    var newdate = $('#date_app').val();
    var newloc = $('#loc_app').val();
    var select = $('.myselect');
    select.find("option:gt(0)").remove();
    if(newdate.length>0 && newloc.length>0){

      $("#select1").LoadingOverlay("show");
      $("#select2").LoadingOverlay("show");


      $.get('<?php echo base_url() ?>contact_us/getHours/',
      {
        date: newdate,
        loc: newloc
      },
      function(data, status){
        var hours = JSON.parse(data);
        if(hours.length>0){



          

          $.each(hours, function(key, value) {   
           select.append($("<option></option>")
            .attr("value",value)
            .text(value)); 
         });


        }
        else{
          alert("Please select a different date");
        }

        $("#select1").LoadingOverlay("hide");
        $("#select2").LoadingOverlay("hide");



      });
    }
  }

</script>
</body>

</html>
