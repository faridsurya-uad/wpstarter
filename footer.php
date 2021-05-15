<?php
/**
 * site info
 */
$custom_logo_id = get_theme_mod( 'custom_logo' );
$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
$site_name = get_bloginfo("name");
$site_description = get_bloginfo("description");

/**
 * social media
 */
$email = get_theme_mod('email');
$address = get_theme_mod('address');
$phone = get_theme_mod('phone');

$fb = get_theme_mod('facebook');
$twitter = get_theme_mod('twitter');
$ig = get_theme_mod('instagram');
$yt = get_theme_mod('youtube');
$wa = get_theme_mod('whatsapp');


?>


<!-- Footer -->
<footer class="bg-light text-center text-lg-start border-top">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
      <img src="<?php echo $custom_logo_url;?>" style="width: 90px;">
        <h5 class="text-uppercase mt-3"><?php echo $site_name;?></h5>
        <p>
        <?php echo $site_description;?>
        </p>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Contact</h5>
        <p>
        <?php echo $address;?> <br>
        <?php echo $email;?> <br>
        <?php echo $phone;?>
        </p>
        
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Social</h5>
        <a href="<?php echo $ig;?>">Instagram</a> <br>
        <a href="<?php echo $fb;?>">Facebook</a> <br>
        <a href="<?php echo $twitter;?>">Twitter</a>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3">
    © <?php echo date("Y");?> Copyright
    <a class="text-dark" href="http://sunhouse.co.id/">SHD Template Generator</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

<script src="<?php echo get_template_directory_uri().'/vendors/jquey/jquery.js' ;?>"></script>
<script src="<?php echo get_template_directory_uri().'/vendors/bootstrap/js/bootstrap.bundle.js' ;?>"></script>

<?php wp_footer(); ?>

</body>
</html>
