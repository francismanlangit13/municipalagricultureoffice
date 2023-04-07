<?php
  include ('db_conn.php');
  include ('initialize.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="A web-based Farmers monitoring management system" name="description">
    <meta content="Monitoring, Management, System, Notification" name="keywords">

    <!--Title Page-->
    <title>Municipal Agriculture Office Jimenez</title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url ?>assets/img/system/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url ?>assets/img/system/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url ?>assets/img/system/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Loading CSS -->
    <link href="<?php echo base_url ?>assets/css/loader.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Lumia - v4.10.0
    * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>
    <!-- Loading Screen -->
    <div id="loading">
        <img id="loading-image" src="<?php echo base_url ?>assets/img/system/loading.gif" alt="Loading" />
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center bg-success">
      <div class="container d-flex align-items-center">

        <div class="logo me-auto">
          <h1>
            <a href="<?php echo base_url ?>"><img src="<?php echo base_url ?>assets/img/system/favicon.png" alt="" class="img-fluid"></a>
            <a href="<?php echo base_url ?>" data-alttext="MAO Jimenez"><b>Municipal Agriculture Office Jimenez</b></a>
          </h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!--== <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto " href="#portfolio">Pictures</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="nav-link scrollto" href="#team">About Us</a></li>
            <li><a class="nav-link " href="<?php echo base_url ?>login">LOGIN</a></li>
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->



      </div>
    </header><!-- End Header -->

    <!-- ======= Home Section ======= -->
      <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="container text-center text-md-left" data-aos="fade-up">
          <h1>Welcome to Municipal Agriculture System</h1>
        </div>
      </section>
    <!-- End Home Selection -->

    <!-- Main Selection -->
      <main id="main">
        <!-- ======= What We Do Section ======= -->
          <section id="what-we-do" class="what-we-do">
            <div class="container">

              <div class="section-title">
                <h2>The Role of Municipal Agriculture Office</h2>
                <p>The Office of the Municipal Agriculture is an agency of the Philippine government responsible for the promotion of the Agriculture & Fisheries development and growth. In partnership with the Department of Agriculture, provide benefits of development to the poor, especially in the rural areas.</p>
              </div>

              <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                  <div class="icon-box">
                    <div class="icon"><i class='bx bxs-leaf'></i></div>
                    <h4><a href="">Vision</a></h4>
                    <p>Work towards achieving food security & sufficiency</p>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                  <div class="icon-box">
                    <div class="icon"><i class="bx bxs-leaf"></i></div>
                    <h4><a href="">Mission</a></h4>
                    <p>Develop rural communities into dynamic men & women entrepreneur who do profitable business out of agro-processing & eco-cultural tourism; and</p>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                  <div class="icon-box">
                    <div class="icon"><i class="bx bxs-leaf"></i></div>
                    <h4><a href="">Goal</a></h4>
                    <p>Strongly upholds peoples’ initiatives towards innovative and sustainable use of earth’s resources.</p>
                  </div>
                </div>

              </div>

            </div>
          </section>
        <!-- End What We Do Section -->

        <!-- ======= About Section ======= -->
          <section id="about" class="about">
            <div class="container">

              <div class="row">
                <div class="col-lg-6 text-center">
                  <img src="<?php echo base_url ?>assets/img/system/logo.png" class="img-fluid">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                  <h3>Functions of Municipal Agriculture Office</h3>
                  <p>
                  Formulate measures for the approval of the Sanggunian and provide technical assistance and support to the mayor, in carrying out said measures to ensure the delivery of basic services and provision of adequate facilities relative to agricultural services
                  </p>
                  <ul>
                    <li><i class="bx bx-check-double"></i> Enforce rules and regulations relating to agriculture and aquaculture.</li>
                    <li><i class="bx bx-check-double"></i> Recommend to the Sanggunian and advise the mayor, on all other matters related to agriculture and aqua-culture which will improve the livelihood and living conditions of the inhabitants.</li>
                  </ul>
                
                </div>
              </div>

            </div>
          </section>
        <!-- End About Section -->



        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
          <div class="container">

            <div class="section-title">
              <h2>Pictures</h2>
              <p>Municipal Agriculture of Jimenez, Misamis Occidental</p>
            </div>

            <div class="row">
              <div class="col-lg-12">
                <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active">All</li>
                </ul>
              </div>
            </div>

            <div class="row portfolio-container">

              <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                <div class="portfolio-wrap">
                  <figure>
                    <img src="<?php echo base_url ?>assets/img/portfolio/1.jpg" class="img-fluid" alt="">
                    <a href="<?php echo base_url ?>assets/img/portfolio/1.jpg" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="Preview"><i class="bx bx-show"></i></a>
                  
                  </figure>

                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-wrap">
                  <figure>
                    <img src="<?php echo base_url ?>assets/img/portfolio/2.jpg" class="img-fluid" alt="">
                    <a href="<?php echo base_url ?>assets/img/portfolio/2.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview"><i class="bx bx-show"></i></a>
                  
                  </figure>

                
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                <div class="portfolio-wrap">
                  <figure>
                    <img src="<?php echo base_url ?>assets/img/portfolio/3.jpg" class="img-fluid" alt="">
                    <a href="<?php echo base_url ?>assets/img/portfolio/3.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview"><i class="bx bx-show"></i></a>
                  
                  </figure>

                
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
                <div class="portfolio-wrap">
                  <figure>
                    <img src="<?php echo base_url ?>assets/img/portfolio/4.jpg" class="img-fluid" alt="">
                    <a href="<?php echo base_url ?>assets/img/portfolio/4.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview"><i class="bx bx-show"></i></a>
                  
                  </figure>

                  
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-wrap">
                  <figure>
                    <img src="<?php echo base_url ?>assets/img/portfolio/5.jpg" class="img-fluid" alt="">
                    <a href="<?php echo base_url ?>assets/img/portfolio/5.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview"><i class="bx bx-show"></i></a>
                  
                  </figure>

                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                <div class="portfolio-wrap">
                  <figure>
                    <img src="<?php echo base_url ?>assets/img/portfolio/6.jpg" class="img-fluid" alt="">
                    <a href="<?php echo base_url ?>assets/img/portfolio/6.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview"><i class="bx bx-show"></i></a>
                  
                  </figure>

                
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
                <div class="portfolio-wrap">
                  <figure>
                    <img src="<?php echo base_url ?>assets/img/portfolio/7.jpg" class="img-fluid" alt="">
                    <a href="<?php echo base_url ?>assets/img/portfolio/7.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview"><i class="bx bx-show"></i></a>
                  
                  </figure>

              
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-wrap">
                  <figure>
                    <img src="<?php echo base_url ?>assets/img/portfolio/8.jpg" class="img-fluid" alt="">
                    <a href="<?php echo base_url ?>assets/img/portfolio/8.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview"><i class="bx bx-show"></i></a>
                  
                  </figure>

                
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.2s">
                <div class="portfolio-wrap">
                  <figure>
                    <img src="<?php echo base_url ?>assets/img/portfolio/9.jpg" class="img-fluid" alt="">
                    <a href="<?php echo base_url ?>assets/img/portfolio/9.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview"><i class="bx bx-show"></i></a>
                  
                  </figure>

                
                  </div>
                </div>
              </div>

            </div>

          </div>
        </section><!-- End Portfolio Section -->

          <!-- ======= Contact Section ======= -->
          <section id="contact" class="contact section-bg">
          <div class="container">

            <div class="section-title">
              <h2>Contact Us</h2>
              <p>Municipal Agriculture Office of Jimenez is always here to help you</p>
            </div>

            <div class="row mt-5 justify-content-center">

              <div class="col-lg-10">

                <div class="info-wrap">
                  <div class="row">
                    <div class="col-lg-4 info">
                      <i class="bi bi-geo-alt"></i>
                      <h4>Location:</h4>
                      <p>Corrales, Jimenez<br>Misamis Occidental</p>
                    </div>

                    <div class="col-lg-4 info mt-4 mt-lg-0">
                      <i class="bi bi-envelope"></i>
                      <h4>Email:</h4>
                      <p>maojimenez@gmail.com<br></p>
                    </div>

                    <div class="col-lg-4 info mt-4 mt-lg-0">
                      <i class="bi bi-phone"></i>
                      <h4>Call:</h4>
                      <p>+639 9457664949<br>+639 457664949</p>
                    </div>
                  </div>
                </div>

              </div>

            </div>

            <div class="row mt-5 justify-content-center" hidden="true">
              <div class="col-lg-10">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  </div>
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                  </div>
                  <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
              </div>

            </div>

          </div>
        </section><!-- End Contact Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
          <div class="container">

            <div class="section-title">
              <h2>About Us</h2>
              <p></p>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <img src="<?php echo base_url ?>assets/img/team/carlo.png" alt="">
                  <h4>Francis Carlo Manlangit</h4>
                  <span>Full Stack Developer</span>
                  <p>
                  I can do all things through Christ who strengthen me.
                  </p>
                  <div class="social">
                    <a href="https://www.facebook.com/fanzcarl13" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/franzcarl13" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.twitter.com/franzcarl13" target="_blank"><i class="bi bi-twitter"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <img class="" src="<?php echo base_url ?>assets/img/team/balmadres.jpg" alt="">
                  <h4>Christine Mae Balmadres</h4>
                  <span>Full Stack Developer</span>
                  <p>
                    Commit to the LORD whatever you do, and your plans will succeed.
                  </p>
                  <div class="social">
                    <a href="https://www.facebook.com/chrstnmea" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/tinnnniiiiiiiii" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.twitter.com/chrstnmeyh" target="_blank"><i class="bi bi-twitter"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <img src="<?php echo base_url ?>assets/img/team/cindy.jpg" alt="">
                  <h4>Cindy Sapalleda</h4>
                  <span>Full Stack Developer</span>
                  <p>
                  Failure is not the opposite of success, it is part of success.
                  </p>
                  <div class="social">
                    <a href="https://www.facebook.com/cindy.sapallida.58" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/cindybantilansapalleda" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.twitter.com/cindy" target="_blank"><i class="bi bi-twitter"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <img src="<?php echo base_url ?>assets/img/team/yvesh.jpg" alt="">
                  <h4>Yvesh Laurent Hemororz</h4>
                  <span>System Designer</span>
                  <p>
                  The road to success and the road to failure are almost the same.
                  </p>
                  <div class="social">
                    <a href="https://www.facebook.com/yvesh211" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/yvesh_hemoroz" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.twitter.com/yvesh_21" target="_blank"><i class="bi bi-twitter"></i></a>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </section><!-- End Team Section -->



      </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
      <footer id="footer">

        <div class="footer-top">
          <div class="container">
            <div class="row">

            
            </div>
          </div>
        </div>

        <div class="container d-md-flex py-4">

          <div class="me-md-auto text-center text-md-start">
            <div class="copyright">
              &copy; Copyright <strong><span>MAO JIMENEZ</span></strong>. All Rights Reserved
            </div>
          </div>
          <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="https://www.facebook.com/municipalagriculture.jimenez" target="_blank"><i class="bx bxl-facebook"></i></a>
          </div>
        </div>
      </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php echo base_url ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Loading JS -->
    <script src="<?php echo base_url ?>assets/js/loader.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url ?>assets/js/main.js"></script>

  </body>

</html>