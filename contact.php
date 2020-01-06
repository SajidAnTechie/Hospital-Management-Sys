<?php include("includes/header.php")?>

  <div class="about-people-with-dogs">
            <div class="for-about-contenet">
                    <h3><font color="#192b82">Contact</font></h3>
                    <p>If you have any queries, please contact us using the following form or call us on the number provided below.</p>
            </div>
         
        </div>

        <div class="services-header">
            <h3>Our <font color="#192b82" >Contact</font><h3>
            <hr>
        </div>

        <div class="contact-back">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                            <div class="contact-email-phone-adrress">
                                <div class="for-conatact-location">
                                    <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                                    <span>Jhamsikhel-3 , Sanepa , Lalitpur</span>
                                </div>
                                <div class="for-conatact-Phone-number">
                                    <a href="#"><i class="fas fa-phone-volume"></i></a>
                                    <span>9869761751 / 9808892748</span>
                                </div>
                                <div class="for-conatact-email">
                                    <a href="#"><i class="far fa-envelope-open"></i></a>
                                    <span>info@.com</span>
                                </div>
                            </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="for-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.211873574097!2d85.30462731458255!3d27.679845733307854!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb183646c98597%3A0x9c8bf3018791037d!2sJibachha+Veterinary+Hospital+Pvt+Ltd!5e0!3m2!1sen!2snp!4v1556802857070!5m2!1sen!2snp" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- contact-form -->

        <div class="container">
            <div class="contact-form-background">
                    <form id="contact-form"  method="post">
                            
                        <div class="contact-form-containt">
                            <h3>Get In Touch</h3>

                                <div id="mail-status"></div>
                            <div class="form-group" style="display:flex;">
                                <input type="text"  id="conatct-style"class="name-input  form-control" name="name" placeholder="Your Name">
                                <span id="error-name"  ></span>
                                 <span class="empty-name"></span>
                            </div>

                            <div class="form-group" style="display:flex;">
                                <input type="text" class="email-input form-control" id="conatct-style" name="email" placeholder="Your Email">

                                <span id="error-email"></span>
                                 <span class="empty-email"></span>
                            </div>

                            <div class="form-group" style="display:flex;">
                                <input type="text" class="number-input form-control" id="conatct-style" name="number" placeholder="Your Number">
                                <span id="error-number" ></span>
                                <span class="empty-number"></span>
                            </div>

                            <div class="form-group" style="display:flex;">
                                <input type="text" class="address-input  form-control"id="conatct-style" name="address" placeholder="Your address">
                                <span id="error-address" ></span>
                                <span class="empty-address"></span>
                            </div>

                            <div class="form-group" style="display:flex;">
                                <textarea name="massage" class="massage-input form-control" id="massage-for-contact" placeholder="Massage"  cols="30" rows="10"></textarea>
                                <span class="empty-massage"></span>
                            </div>

                            <div class="form-group">
                                <p id="submit">
                                <input type="submit" id="contact-form-submit" name="submit" placeholder="Submit">
                                </p>
                            </div>
                        </div>
                    </form>
            </div>
        </div>



      

        <?php include("includes/footer.php")?>