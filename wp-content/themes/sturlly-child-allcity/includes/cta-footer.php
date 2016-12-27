<section id="contact" class="page-section cta-contact">
   <div class="content-section pt-0-pb-65">
      <div class="container">
         <div class="row contact-us">
            <div class="col-xs-10 col-md-8 margin-auto-center">
               <img src="http://allcity.com.au/wp-content/uploads/2015/10/NEW_white-300x72.png" alt="All City Logo" class="margin-auto-center margin-top contact-logo" />
               <div class="margin-top title-text">
                  <h2 class="text-center">Book your free consultation today</h2>
               </div>
               <div class="text-center title-style2 clear-both">
                  <div class="col-xs-10 title-style2 col-md-6 col-sm-8 text-center description margin-top margin-bottom margin-auto-center gray-text">Arrange an appointment at the showroom to make your dream home a reality.</div>
               </div>
               <div class="content-section no-padding">
                  <div class="container">
                    <div class="row">
                      <h1>OLD FORM</h1>
                      <?php mailchimpSF_signup_form(); ?>
                    </div>
                    <div class="row">
                      <h1>NEW FORM</h1>
                      <?php echo do_shortcode( '[wpforms id="554"]' ); ?>
                    </div>
                     <div class="row contact-row">
                         <div class="contact-style1">
                            <ul class="icon-list">
                              <li class="mailchimp-popup" id="cta-arrange-consultation"><button class="lead button">Arrange a Consultation</button></li>
                              <li class="divider"></li>
                               <li class="phone">
                                  <button id ="cta-call-main" data-clipboard-text="03 9571 7000" class="copy-to-clipboard" title="Click to copy"><i class="fa fa-phone"></i>03 9571 7000</button>
                                  <a id ="cta-call-main-mob" href="tel:0395717000" class="cta-contact-call" title="Call the All City showroom"><i class="fa fa-phone"></i>03 9571 7000</a>
                                  <div class="success callout hidden" data-closable>
                                    <p>Copied to clipboard <i class="fa fa-check"></i></p>
                                    <!-- <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                                      <span aria-hidden="true">&times;</span>
                                    </button> -->
                                  </div>
                               </li>
                               <li class="divider"></li>
                               <li><a href="mailto:info@allcity.com.au"><i class="fa fa-envelope-o"></i>info@allcity.com.au</a></li>
                               <li class="divider"></li>
                               <li>
                                 <a href="https://goo.gl/maps/arnNrUny3dq" target="_blank">
                                   <i class="fa fa-map-marker"></i>
                                   <span class="cta-address">516 Waverley Road,<br>
                                   Malvern East, VIC 3145</span>
                                 </a>
                               </li>
                            </ul>
                         </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
