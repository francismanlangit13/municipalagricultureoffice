<?php
  include ('db_conn.php');
  include ('initialize.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Google Analytics -->
    <script>
      window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
      ga('create', 'G-LCVFDYEBW0', 'auto');
      ga('send', 'pageview');
    </script>
    <script async src='<?php echo base_url ?>assets/js/analytics.js'></script>
    <!-- End Google Analytics -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="A web-based Farmers monitoring management system" name="description">
    <meta content="Monitoring, Management, System, Notification" name="keywords">
    <meta name="google-site-verification" content="RUBWqhjH6EGoC1nXSwk_iFB6FV5WSjZ_jEn5zj3tcHU" />

    <!--Title Page-->
    <title>Municipal Agriculture Office Jimenez</title>

    <!-- Remove Banner -->
    <script src="<?php echo base_url ?>assets/js/fwhabannerfix.js"></script>
    
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url ?>assets/img/system/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url ?>assets/img/system/favicon.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url ?>assets/img/system/favicon.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url ?>assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?php echo base_url ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo base_url ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Loading CSS -->
    <link href="<?php echo base_url ?>assets/css/loader.css" rel="stylesheet">

    <!-- Cookie CSS -->
    <link href="<?php echo base_url ?>assets/css/cookie.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url ?>assets/css/style.css" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LCVFDYEBW0"></script>
    <script src="<?php echo base_url ?>assets/js/gtag.js"></script>

    <!-- Google Tag Manager -->
    <script src="<?php echo base_url ?>assets/js/gtagmanager.js"></script>

    <!-- =======================================================
    * Template Name: Lumia - v4.10.0
    * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5D46BH6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Loading Screen -->
    <div id="loading">
        <img id="loading-image" src="<?php echo base_url ?>assets/img/system/loading.gif" alt="Loading" />
    </div>
    <div id="connectionAlert" class="alert"></div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center bg-success">
      <div class="container d-flex align-items-center">

        <div class="logo me-auto">
          <h1>
            <a href="<?php echo base_url ?>"><img src="<?php echo base_url ?>assets/img/system/favicon.png" alt="MAO Jimenez" aria-label="Municipal Agriculture Office" class="img-fluid"></a>
            <a href="<?php echo base_url ?>" aria-label="Municipal Agriculture Office" data-alttext="MAO Jimenez"><b>Municipal Agriculture Office Jimenez</b></a>
          </h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!--== <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="#about">About</a></li>
            <li><a class="nav-link scrollto" href="#portfolio">Pictures</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
            <li><a class="nav-link scrollto" href="#staff">Staff</a></li>
            <li><a class="nav-link scrollto" href="#team">Team</a></li>
            <li><a class="nav-link" href="<?php echo base_url ?>login">LOGIN</a></li>
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
          <section id="about" class="what-we-do">
            <div class="container">

              <div class="section-title">
                <h2>The Role of Municipal Agriculture Office</h2>
                <p>The Office of the Municipal Agriculture is an agency of the Philippine government responsible for the promotion of the Agriculture & Fisheries development and growth. In partnership with the Department of Agriculture, provide benefits of development to the poor, especially in the rural areas.</p>
              </div>

              <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch justify-content-center">
                  <div class="icon-box">
                    <div class="icon"><i class='bx bxs-leaf'></i></div>
                    <h4>Vision</h4>
                    <p>Work towards achieving food security & sufficiency</p>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                  <div class="icon-box">
                    <div class="icon"><i class="bx bxs-leaf"></i></div>
                    <h4>Mission</h4>
                    <p>Develop rural communities into dynamic men & women entrepreneur who do profitable business out of agro-processing & eco-cultural tourism; and</p>
                  </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                  <div class="icon-box">
                    <div class="icon"><i class="bx bxs-leaf"></i></div>
                    <h4>Goal</h4>
                    <p>Strongly upholds peoples’ initiatives towards innovative and sustainable use of earth’s resources.</p>
                  </div>
                </div>

              </div>

            </div>
          </section>
        <!-- End What We Do Section -->

        <!-- ======= About Section ======= -->
          <section id="what-we-do" class="about">
            <div class="container">

              <div class="row">
                <div class="col-lg-6 text-center">
                  <img src="<?php echo base_url ?>assets/img/system/logo.png" alt="MAO Jimenez" class="img-fluid">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                  <h3>Functions of Municipal Agriculture Office</h3>
                  <p class="text-justify">
                    Formulate measures for the approval of the Sanggunian and provide technical assistance and support to the mayor, in carrying out said measures to ensure the delivery of basic services and provision of adequate facilities relative to agricultural services
                  </p>
                  <ul>
                    <li class="text-justify"><i class="bx bx-check-double"></i> Enforce rules and regulations relating to agriculture and aquaculture.</li>
                    <li class="text-justify"><i class="bx bx-check-double"></i> Recommend to the Sanggunian and advise the mayor, on all other matters related to agriculture and aqua-culture which will improve the livelihood and living conditions of the inhabitants.</li>
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
                  <a href="<?php echo base_url ?>assets/img/portfolio/1.jpg" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="Preview">
                    <figure>
                      <img src="<?php echo base_url ?>assets/img/portfolio/1.jpg" class="img-fluid" alt="portfolio_1">
                    </figure>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-wrap">
                  <a href="<?php echo base_url ?>assets/img/portfolio/2.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview">
                    <figure>
                      <img src="<?php echo base_url ?>assets/img/portfolio/2.jpg" class="img-fluid" alt="portfolio_2">
                    </figure>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                <div class="portfolio-wrap">
                  <a href="<?php echo base_url ?>assets/img/portfolio/3.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview">
                    <figure>
                      <img src="<?php echo base_url ?>assets/img/portfolio/3.jpg" class="img-fluid" alt="portfolio_3">
                    </figure>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
                <div class="portfolio-wrap">
                  <a href="<?php echo base_url ?>assets/img/portfolio/4.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview">
                    <figure>
                      <img src="<?php echo base_url ?>assets/img/portfolio/4.jpg" class="img-fluid" alt="portfolio_4">
                    </figure>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-wrap">
                  <a href="<?php echo base_url ?>assets/img/portfolio/5.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview">
                    <figure>
                      <img src="<?php echo base_url ?>assets/img/portfolio/5.jpg" class="img-fluid" alt="portfolio_5">
                    </figure>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
                <div class="portfolio-wrap">
                  <a href="<?php echo base_url ?>assets/img/portfolio/6.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview">
                    <figure>
                      <img src="<?php echo base_url ?>assets/img/portfolio/6.jpg" class="img-fluid" alt="portfolio_6">
                    </figure>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
                <div class="portfolio-wrap">
                  <a href="<?php echo base_url ?>assets/img/portfolio/7.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview">
                    <figure>
                      <img src="<?php echo base_url ?>assets/img/portfolio/7.jpg" class="img-fluid" alt="portfolio_7">
                    </figure>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp" data-wow-delay="0.1s">
                <div class="portfolio-wrap">
                  <a href="<?php echo base_url ?>assets/img/portfolio/8.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview">
                    <figure>
                      <img src="<?php echo base_url ?>assets/img/portfolio/8.jpg" class="img-fluid" alt="portfolio_8">
                    </figure>
                  </a>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.2s">
                <div class="portfolio-wrap">
                  <a href="<?php echo base_url ?>assets/img/portfolio/9.jpg" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="Preview">
                    <figure>
                      <img src="<?php echo base_url ?>assets/img/portfolio/9.jpg" class="img-fluid" alt="portfolio_9">
                    </figure>
                  </a>
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
                      <a href="https://goo.gl/maps/7eJ96JTjzgPq3AGy7" aria-label="Visit Municipal Agriculture Office on Google Maps" target="_blank">Corrales, Jimenez Misamis Occidental</a>
                    </div>

                    <div class="col-lg-4 info mt-4 mt-lg-0">
                      <i class="bi bi-envelope"></i>
                      <h4>Email:</h4>
                      <a href="mailto:aggies.jimenez2016@gmail.com">aggies.jimenez2016@gmail.com<br></a>
                    </div>

                    <div class="col-lg-4 info mt-4 mt-lg-0">
                      <i class="bi bi-phone"></i>
                      <h4>Call:</h4>
                      <a href="tel:+6399972388625">+6399972388625<br></a>
                    </div>
                  </div>
                </div>

              </div>

            </div>
            <div class="row mt-5 justify-content-center">
              <!-- to edit google map goto https://www.embed-map.com type your location, generate html code and copy the html  -->
              <div class="col-lg-6" style="max-width:100%;overflow:hidden;color:red;width:500px;height:500px;">
                <div id="embedmap-canvas" style="height:100%; width:100%;max-width:100%;">
                  <iframe style="height:100%;width:100%;border:0;" frameborder="0" title="Google Maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3947.711007559862!2d123.82512624785154!3d8.331487083362013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32550301520a09c7%3A0x97790db3e2a40a38!2sJimenez%20Municipal%20Nursery!5e0!3m2!1sen!2sph!4v1684171147442!5m2!1sen!2sph"></iframe>
                </div>
                <a class="googlemaps-html" href="https://www.embed-map.com" id="get-data-forembedmap">https://www.embed-map.com</a>
                <style>#embedmap-canvas img{max-width:none!important;background:none!important;font-size: inherit;font-weight:inherit;}</style>
              </div>
              <div class="col-lg-6">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" autocomplete="off" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                      <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="email" placeholder="Your Email" autocomplete="off" required>
                    </div>
                  </div>
                  <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  </div>
                  <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
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

        <!-- ======= Staff Section ======= -->
        <section id="staff" class="team">
          <div class="container">

            <div class="section-title">
              <h2>Staff</h2>
              <p>Introducing our municipal agriculture staff – cultivating a greener future for our community.</p>
            </div>
            <div class="row" style="justify-content:center;">
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <a href="<?php echo base_url ?>assets/img/teams/MALON_MARISSA.jpg" data-gallery="aboutGallery" class="link-preview portfolio-lightbox" title="Name: MARISSA MALON <br> Position: Municipal Agriculturist">
                    <img src="<?php echo base_url ?>assets/img/teams/MALON_MARISSA.jpg" alt="MARISSA MALON">
                  </a>
                  <h4>MARISSA MALON</h4>
                  <span>Municipal Agriculturist</span>
                </div>
              </div>
            </div>
            <div class="row" style="justify-content:center;">
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <a href="<?php echo base_url ?>assets/img/teams/PINO_CHERLIE.jpg" data-gallery="aboutGallery" class="link-preview portfolio-lightbox" title="Name: CHERLIE PINO <br> HVCC Coordinator/Fits ISS Coordinator">
                    <img class="" src="<?php echo base_url ?>assets/img/teams/PINO_CHERLIE.jpg" alt="CHERLIE PINO">
                  </a>
                  <h4>CHERLIE PINO</h4>
                  <span>HVCC Coordinator/Fits ISS Coordinator</span>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <a href="<?php echo base_url ?>assets/img/teams/GALBO_MARIEFE.jpg" data-gallery="aboutGallery" class="link-preview portfolio-lightbox" title="Name: MARIEFE GALBO <br> Position: Agricultural Technologist/Corn Coordinator">
                    <img src="<?php echo base_url ?>assets/img/teams/GALBO_MARIEFE.jpg" alt="MARIEFE GALBO">
                  </a>
                  <h4>MARIEFE GALBO</h4>
                  <span>Agricultural Technologist/Corn Coordinator</span>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <a href="<?php echo base_url ?>assets/img/teams/BARRIENTOS_LENDIE.jpg" data-gallery="aboutGallery" class="link-preview portfolio-lightbox" title="Name: LENDIE BARRIENTOS <br> Position: Agricultural Technologist/Rice Coordinator">
                    <img src="<?php echo base_url ?>assets/img/teams/BARRIENTOS_LENDIE.jpg" alt="LENDIE BARRIENTOS">
                  </a>
                  <h4>LENDIE BARRIENTOS</h4>
                  <span>Agricultural Technologist/Rice Coordinator</span>
                </div>
              </div>
            </div>
            <div class="row" style="justify-content:center;">
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <a href="<?php echo base_url ?>assets/img/teams/MALALIS_JOHN_MARK.jpg" data-gallery="aboutGallery" class="link-preview portfolio-lightbox" title="Name: JOHN MARK MALALIS <br> Position: Agricultural Technologist/Livestock Coordinator">
                    <img src="<?php echo base_url ?>assets/img/teams/MALALIS_JOHN_MARK.jpg" alt="JOHN MARK MALALIS">
                  </a>
                  <h4>JOHN MARK MALALIS</h4>
                  <span>Agricultural Technologist/Livestock Coordinator</span>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <a href="<?php echo base_url ?>assets/img/teams/TABUZO_ROSHELLE_ANN.jpg" data-gallery="aboutGallery" class="link-preview portfolio-lightbox" title="Name: ROSHELLE ANN TABUZO <br> Position: Fishery Coordinator/Agri basics Coordinator">
                    <img class="" src="<?php echo base_url ?>assets/img/teams/TABUZO_ROSHELLE_ANN.jpg" alt="ROSHELLE ANN TABUZO">
                  </a>
                  <h4>ROSHELLE ANN TABUZO</h4>
                  <span>Fishery Coordinator/Agri basics Coordinator</span>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <a href="<?php echo base_url ?>assets/img/teams/BANQUE_MARY_JOY.jpg" data-gallery="aboutGallery" class="link-preview portfolio-lightbox" title="Name: MARY JOY BANQUE <br> Position: Agricultural Technologist/Fishery Coordinator">
                    <img src="<?php echo base_url ?>assets/img/teams/BANQUE_MARY_JOY.jpg" alt="MARY JOY BANQUE">
                  </a>
                  <h4>MARY JOY BANQUE</h4>
                  <span>Agricultural Technologist/Fishery Coordinator</span>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <a href="<?php echo base_url ?>assets/img/teams/PALANAS_JUVY.jpg" data-gallery="aboutGallery" class="link-preview portfolio-lightbox" title="Name: JUVY PALANAS <br> Position: Agricultural Technologist/Livestock Coordinator">
                    <img src="<?php echo base_url ?>assets/img/teams/PALANAS_JUVY.jpg" alt="JUVY PALANAS">
                  </a>
                  <h4>JUVY PALANAS</h4>
                  <span>Agricultural Technologist/Livestock Coordinator</span>
                </div>
              </div>

            </div>

          </div>
        </section><!-- End About Us Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
          <div class="container">

            <div class="section-title">
              <h2>Team</h2>
              <p>Meet our top-notch website development team</p>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <a href="<?php echo base_url ?>assets/img/team/carlo.png" data-gallery="teamGallery" class="link-preview portfolio-lightbox" title="Name: FRANCIS CARLO MANLANGIT <br> Role: Full Stack Web Developer">
                    <img src="<?php echo base_url ?>assets/img/team/carlo.png" alt="">
                  </a>
                  <h4>FRANCIS CARLO MANLANGIT</h4>
                  <span>Full Stack Web Developer</span>
                  <p>
                  I can do all things through Christ who strengthen me.
                  </p>
                  <div class="social">
                    <a href="https://www.facebook.com/itsfanzcarl" target="_blank"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/franzcarl13" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.twitter.com/franzcarl13" target="_blank"><i class="bi bi-twitter"></i></a>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                <div class="member">
                  <a href="<?php echo base_url ?>assets/img/team/balmadres.jpg" data-gallery="teamGallery" class="link-preview portfolio-lightbox" title="Name: CHRISTINE MAE BALMADRES <br> Role: Quality Assurance">
                    <img class="" src="<?php echo base_url ?>assets/img/team/balmadres.jpg" alt="">
                  </a>
                  <h4>CHRISTINE MAE BALMADRES</h4>
                  <span>Quality Assurance</span>
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
                  <a href="<?php echo base_url ?>assets/img/team/cindy.jpg" data-gallery="teamGallery" class="link-preview portfolio-lightbox" title="Name: CINDY SAPALLEDA <br> Role: Researcher">
                    <img src="<?php echo base_url ?>assets/img/team/cindy.jpg" alt="">
                  </a>
                  <h4>CINDY SAPALLIDA</h4>
                  <span>Researcher</span>
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
                  <a href="<?php echo base_url ?>assets/img/team/yvesh.jpg" data-gallery="teamGallery" class="link-preview portfolio-lightbox" title="Name: YVESH LAURENT HEMOROZ <br> Role: System Designer">
                    <img src="<?php echo base_url ?>assets/img/team/yvesh.jpg" alt="">
                  </a>
                  <h4>YVESH LAURENT HEMOROZ</h4>
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

    <!-- Cookie Consent -->
    <div class="wrapper">
      <img src="<?php echo base_url ?>assets/img/icons/cookie.png" alt="">
      <div class="content">
        <header>Cookies Consent</header>
        <p>Cookies help us deliver our services. By using our services, you agree to our use of cookies. <a href="<?php echo base_url ?>cookie-policy">Cookie Policy</a>. For information on how we protect your privacy, please read our <a href="<?php echo base_url ?>privacy-policy">Privacy Policy</a>.</p>
        <div class="buttons">
          <button class="item">I accept</button>
        </div>
      </div>
    </div>
    <!-- End Cookie Consent -->

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
              Copyright &copy; 1996-<?php echo date('Y'); ?> <strong><span>Municipal Agriculture Office Jimenez</span></strong>. All Rights Reserved
            </div>
            <a href="cookie-policy">Cookie Policy</a>
            <a href="privacy-policy">Privacy Policy</a>
            <a href="website-terms-condition">Terms of Use</a>
            <a href="sitemap">Sitemap</a>
          </div>
          <div class="social-links text-center text-md-right pt-3 pt-md-0">
            <a href="https://www.facebook.com/municipalagriculture.jimenez" aria-label="Visit Municipal Agriculture Office on Facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
          </div>
        </div>
      </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Cookie Consent -->
    <script src="<?php echo base_url ?>assets/js/cookie.js"></script>

    <!-- Disable-key -->
    <script src="<?php echo base_url ?>assets/js/disable-key.js"></script>

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

    <!-- Serverstatus JS -->
    <script src="<?php echo base_url ?>assets/js/serverstatus.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php echo base_url ?>assets/js/main.js"></script>

    <script>
      var base_url = "<?php echo base_url ?>"; // Global base_url in javascript
    </script>

    <script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>
    <?php include ('message.php'); ?>

  </body>

</html>