<style>
    .register_now {
        background-color: #fff;
        border: 1px solid #fff;
        color: #000;
        letter-spacing: 2px !important;
        font-family: 'acumin-pro-condensed', sans-serif;
        text-transform: uppercase;
        font-weight: 400;
        font-size: 20px;
        padding: 4px 30px;
        border-radius: 25px !important;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'acumin-pro-condensed', sans-serif;
        height: 50px !important;
        text-align: right;
        line-height: 0.5;
    }
</style>
<div class="container-fluid " style="margin-top:3% ;padding: 0px 0px !important ">
    <div class="row">


        <!-- row for md  -->
        <div class="d-sm-none d-md-block  d-none d-sm-block">
            <div class="row " style="background-image: url('website_assets/images/lash-lifts-bg/Web_Banner_Mega_Volume.png');height:100vh ;background-position :center; background-size:cover;">
                <div class="col-md-6  text-white h1 bold_text  ">
                    <style>
                        .bold_text h1 {
                            font-weight: bolder;

                        }
                    </style>
                    <?php echo get_content('MEGA_VOLUME_HAS_ARRIVED', true); ?>
                </div>

                <div class=" col-md-auto align-self-end  ml-auto    pb-5">
                    <a class="register_now" href="#">

                        REGISTER NOW
                    </a>

                </div>
            </div>
        </div>

        <!-- row for sm  -->
        <div class=" d-block d-sm-none">
            <div class="row " style="background-image:url('website_assets/images/lash-lifts-bg/Mobile_banner_mega_volume.png');height:100vh ; width:auto; background-size:cover;">


                <div class="col-md-6  text-white h1 ">
                    <?php echo get_content('MEGA_VOLUME_HAS_ARRIVED', true); ?>
                </div>


            </div>
        </div>



        <!--  row for LASHPRO PROFESSIONAL -->
        <div class="row" style="
            background-image: url('website_assets/images/lash-lifts-bg/lpmiddle.jpg') ; height  :100vh ;background-position :center; background-size:cover;">

            <!-- <div class="col-md-6 text-white h1 mt-5 " style="font-size :50px; font-weight:900">
                LASHPRO PROFESSIONAL EYELASH EXTENSION CLASSES AND COURSES
            </div>
            <div class="row">
                <div class="p col-md-5 text-white" style="font-size:14px; ">
                    NO OTHER FOCUS BUT YOU. LASHPRO ACADEMY’S PRIVATE TRAINING OPPORTUNITIES GIVE YOU THE CHANCE TO WORK DIRECTLY WITH AN INDUSTRY PRO TO TWEAK AND CORRECT EACH FAN CREATION OR PLACEMENT, ENSURE YOU GRASP STYLE THEORY, OR TO ROUND OUT YOUR LASH BUSINESS PLAN.
    
    
                </div>
            </div> -->
            <div class="d-flex flex-column">
                <div class=" col-md-4 text-white h2 ">LASHPRO PROFESSIONAL EYELASH EXTENSION CLASSES AND COURSES</div>
                <div class=" col-md-4 text-white p  mt-5  "> NO OTHER FOCUS BUT YOU. LASHPRO ACADEMY’S PRIVATE TRAINING OPPORTUNITIES GIVE YOU THE CHANCE TO WORK DIRECTLY WITH AN INDUSTRY PRO TO TWEAK AND CORRECT EACH FAN CREATION OR PLACEMENT, ENSURE YOU GRASP STYLE THEORY, OR TO ROUND OUT YOUR LASH BUSINESS PLAN.</div>
            </div>

        </div>



        <!--  row for ONLINE COURSES -->
        <div class="row" style=" background-image: url('website_assets/images/lash-lifts-bg/lpvelvetimg.jpg') ; height  :100vh ;background-size :cover">
            <div class="col-md-6 col-sm-8  ml-5 mt-5 ">
                <img src="<?php echo  base_url(); ?>website_assets/images/lash-lifts-bg/modal.jpg" alt="" class="img-fluid">


            </div>
            <div class="col-md-4 col-sm-8 text-white mt-5 ml-5 ">
                <div class="h1">
                    ONLINE COURSES

                </div>
                <div class="p">
                    LASHPRO ACADEMY’S ONLINE CLASSIC COURSE WAS DEVELOPED TO ACCOMMODATE WORKING STUDENTS, STUDENTS WITH BUSY SCHEDULES, AND THOSE WHO LEARN BETTER IN A SELF-PACED ENVIRONMENT. OUR VIDEO MODULES FOLLOW THE SAME METICULOUSLY DEVELOPED CURRICULUM AND MANUAL THAT OUR PRIVATE AND SALON TRAINING DOES, WITH THE ADDED CONVENIENCE OF SELF-PACED STUDY.
                </div>
            </div>
        </div>
    </div>
</div>