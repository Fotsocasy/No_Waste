
  <?php 
    $support=true;
    include_once("headers.php");
    include_once("main.php");
    $count=0;
  ?>


<div class="container" id="contact">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="contenu-contact" data-aos="fade-up"
                    data-aos-anchor-placement="center-bottom">
                        <h2 class="title-contact">Need help ? Contact us.</h2>
                        <p class="p-contact">Welcome to our "Contact Us" page. We're delighted that you've taken the time to reach out to us. Whether you have questions, suggestions, feedback, or just want to say hello, we'd love to hear from you.Welcome to our "Contact Us" page. We're delighted that you've taken the time to reach out to us. Whether you have questions, suggestions, feedback, or just want to say hello, we'd love to hear from you.Our normal operating hours are 8:00 to 19:30. We aim to respond during these hours but may respond to urgent inquiries outside these times.Thank you for considering us for your needs. We appreciate your feedback and look forward to connecting with you. Your input helps us improve and serve you better. </p>
                        <img  class="img-contact" src="img/contactus.jpg" alt="image" width="100%">
                    </div>
                </div>
                <!-- data-aos="fade-up"data-aos-anchor-placement="center-bottom" -->
                <div class="col-md-5 mx-auto">
                    <form action="#" class="form"  data-aos="zoom-in-up">
                      <div class="form-group fg">
                        <p class="p-name">Your name:</p>
                        <input  class="form-control input-name" name="name" id="name" placeholder="votre nom">
                      </div>
                      <div class="form-group fg">
                        <p class="p-email">Your email address:</p>
                        <input  class="form-control input-email" name="email" id="email" placeholder="Example: votrenom@example.com">
                      </div>
                        <div class="form-group fg">
                        <p class="p-text">Your message:</p>
                        <textarea class="form-control  input-text" name="" id="" cols="30" rows="4" placeholder="message"></textarea>
                      </div>
                      <div class="form-group fg">
                          <button type="submit" class="submit-email disabled">Send</button>
                        <p class="p-submit">We will only send you information regarding No waste.</p>
                      </div>
                    </form>
                </div>
            </div>
        </div>
</main>

<?php include_once("footer.php");?>

