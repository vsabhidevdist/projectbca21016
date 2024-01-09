
<?php require('../../config/autoload.php');


$dao=new DataAccess;
$data=$dao->getDataJoin(array('count(id) as sum'),'doctor',1,1);
$docsum=$data[0]['sum'];
$data=$dao->getDataJoin(array('count(id) as sum'),'department',1,1);
$depsum=$data[0]['sum'];

include('header.php');
?>


  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to OneCare</h1>
      <h2>We are team of talented designers making websites with Bootstrap</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose OneCare?</h3>
              <p>
              At OneCare HealthHub, we understand the importance of efficient and compassionate outpatient care. Our commitment to excellence sets us apart, ensuring you receive the best possible care for your healthcare needs. Here's why you should choose OneCare HealthHub for your outpatient management:
              </p>
              <div class="text-center">
                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Explore Our Outpatient Services</h4>
                    <p>Discover a comprehensive range of outpatient services designed to cater to your individual needs. Our dedicated team of healthcare professionals is here to guide you through every step of your journey towards wellness.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Patient-Centric Approach</h4>
                    <p>At OneCare HealthHub, you are at the center of our focus. We believe in a patient-centric approach that emphasizes communication, collaboration, and respect. Your comfort and satisfaction are our top priorities.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Learn More About Our Outpatient Services</h4>
                    <p>Explore our diverse outpatient services designed to meet your healthcare requirements. Whether it's routine check-ups or specialized treatments, OneCare HealthHub is your partner in wellness.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">
          <div  class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
       
          </div>

          <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
            <h3>Experience Superior Outpatient Care

</h3>
            <p>At OneCare HealthHub, we prioritize your well-being, providing exceptional outpatient services with a commitment to excellence. Discover the reasons that make OneCare HealthHub stand out.</p>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-fingerprint"></i></div>
              <h4 class="title"><a href="">State-of-the-Art Facilities
.</a></h4>
              <p class="description">Experience healthcare in a modern and comfortable environment. Our state-of-the-art facilities are equipped with the latest technology to ensure you receive the best outpatient care possible.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-gift"></i></div>
              <h4 class="title"><a href="">Compassionate and Skilled Team</a></h4>
              <p class="description">Our healthcare professionals are not only highly skilled but also compassionate. From physicians to support staff, everyone at OneCare HealthHub is dedicated to making your outpatient experience as stress-free as possible.</p>
            </div>

            <div class="icon-box">
              <div class="icon"><i class="bx bx-atom"></i></div>
              <h4 class="title"><a href="">Embark on Your Journey to Better Health</a></h4>
              <p class="description">Choose OneCare HealthHub for your outpatient needs and take the first step towards better health. We are here to support you at every stage of your wellness journey.</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="fas fa-user-md"></i>
              <span data-purecounter-start="0" data-purecounter-end=<?=$docsum?> data-purecounter-duration="1" class="purecounter">5</span>
              <p>Doctors</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="far fa-hospital"></i>
              <span data-purecounter-start="0" data-purecounter-end=<?=$depsum?> data-purecounter-duration="1" class="purecounter"></span>
              <p>Departments</p>
            </div>
          </div>

          <!-- <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-flask"></i>
              <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1" class="purecounter"></span>
              <p>Research Labs</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
              <p>Awards</p>
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->


  </main><!-- End #main -->

  <?php include('footer.php'); ?>