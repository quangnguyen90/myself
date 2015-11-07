<!-- slide page start -->
<section id="home" class="offset">
  {include file="layout/slide_page.php"}
</section>
<!-- slide page end -->

<!-- #home/aabout -->
<section id="about" class="light-wrapper">
  {include file="myself/about.php"}
</section>
<!-- END #home/about -->
<!-- =============================================================================================================================================================== -->
<!-- #accomplishment -->
<section id="accomplishment" class="dark-wrapper">
  {include file = "myself/accomplishment.php"}
</section>
<!-- END #accomplishment -->
<!-- =============================================================================================================================================================== -->
<!-- #skills set -->
<section id="skill-set" class="light-wrapper">
  {include file = "myself/skill_set.php"}
</section>
<!-- END #skill set-->
<!-- =============================================================================================================================================================== -->  
<!--/#projects-->
<section id="projects" class="light-wrapper">
 {include file = "myself/project.php"}
</section>
<!--/#lightbox-->
<!--END /#projects-->
<!-- =============================================================================================================================================================== -->  
<!-- /.testimonials -->
<div class="parallax testimonials">
  <div class="container inner text-center">
    <h2>My favorites words</h2>
    <div class="divide10"></div>
    <div id="our-testimonials" class="testimonials-tab tab-container">
      <div class="panel-container">
        <div id="tst1" class="tab-block"> I can do it <span class="author">Nguyen Phu Quang</span> </div>
        <div id="tst2" class="tab-block"> Learn by doing <span class="author">Quang Nguyen Phu</span> </div>
        <div id="tst3" class="tab-block"> Just try me <span class="author">Phu Quang Nguyen</span> </div>
        <div id="tst4" class="tab-block"> Be a leader <span class="author"> Quang Phu Nguyen</span> </div>
        <div id="tst5" class="tab-block"> Think simply, do differently <span class="author">Nguyen Phu Quang</span> </div>
      </div>
      <!-- /.panel-container -->
      <ul class="etabs">
        <li class="tab"><a href="#tst1">1</a></li>
        <li class="tab"><a href="#tst2">2</a></li>
        <li class="tab"><a href="#tst3">3</a></li>
        <li class="tab"><a href="#tst4">4</a></li>
        <li class="tab"><a href="#tst5">5</a></li>
      </ul>
      <!-- /.etabs -->
    </div>
    <!-- /.testimonials-tab --> 
  </div>
  <!-- /.container --> 
</div>
<!-- END /.testimonials -->
<!-- =============================================================================================================================================================== -->
<!--/#blog -->
<section id="blog" class="dark-wrapper">
  {include file = "myself/blog.php"}
</section>
<!--END /#blog -->
<!-- =============================================================================================================================================================== -->
<!-- /#contact -->
<section id="contact">
  <div class="section-head">
    <div class="container">
      <h1>Get In Touch</h1>
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.section-head -->
  <div class="parallax contact">
    <div class="container inner">
      <div class="row">
        <!-- <div class="span8">
          <div class="form-container">
            <div class="response alert alert-success"></div>
            <form class="forms" action="contact/form-handler.php" method="post" />
              <fieldset>
                <ol>
                  <li class="form-row text-input-row name-field">
                    <input type="text" name="name" class="text-input defaultText required" title="Name (Required)" />
                  </li>
                  <li class="form-row text-input-row email-field">
                    <input type="text" name="email" class="text-input defaultText required email" title="Email (Required)" />
                  </li>
                  <li class="form-row text-input-row subject-field">
                    <input type="text" name="subject" class="text-input defaultText" title="Subject" />
                  </li>
                  <li class="form-row text-area-row">
                    <textarea name="message" class="text-area required"></textarea>
                  </li>
                  <li class="form-row hidden-row">
                    <input type="hidden" name="hidden" value="" />
                  </li>
                  <li class="button-row">
                    <input type="submit" value="Submit" name="submit" class="btn btn-submit bm0" />
                  </li>
                </ol>
                <input type="hidden" name="v_error" id="v-error" value="Required" />
                <input type="hidden" name="v_email" id="v-email" value="Enter a valid email" />
              </fieldset>
            </form>
          </div>
        </div> -->
        <!-- /.span8 -->
        <center class="span12 sidebar lp10">
          <div class="sidebox widget">
            <h4>Contact Details</h4>
            <p>Feel free to simply contact me and I will get in touch as soon as possible. </p>
            <ul class="contact-info">
              <!-- <li><i class="icon-location"></i> Moon St. 14/05 Light, Jupiter</li> -->
              <li><i class="icon-phone"></i>0986240402</li>
              <li><i class="icon-s-skype"></i>the.cen</li>
              <li><i class="icon-mail"></i>nguyenphuquang90@gmail.com</li>
            </ul>
          </div>
          <!-- /.widget -->
          <!-- <div class="sidebox widget">
            <h4>Custom Text</h4>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Aenean eu leo quam. Pellentesque ornare sem.</p>
          </div> -->
          <!-- /.widget --> 
        </center>
        <!-- /.span4 --> 
      </div>
      <!-- /.row -->
      <div class="clearfix"></div>
    </div>
    <!-- /.container -->
  </div>
  <!-- /.contact -->
</section>
<!-- END /#contact -->