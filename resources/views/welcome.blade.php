<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{ __('landing.title') }}</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

  <!-- Libraries CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Zirak
    Author: Ahmad Zaki Wahedy
  ======================================================= -->
  <style>
    .menu-has-children ul li :hover {
      background-color: grey;
      font-weight: bolder;
    }
    .popup {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
    border-radius: 50px;
    z-index: 9999;
    transition: opacity 0.3s ease;
}

.popup.show {
    display: flex;
}

.popup-content {
    background-color: white;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    opacity: 0;
    transform: translateY(-20px);
    transition: opacity 0.3s ease, transform 0.3s ease;
}

.popup.show .popup-content {
    opacity: 1;
    transform: translateY(0);
}
#popupMessage {
  font-weight: bolder;
  color: rgba(0, 204, 255, 0.864);
}

.fa-check {
  margin-left: 12px;
  color: rgba(0, 204, 255, 0.94);
  font-weight: bolder;
  font-size: 24px;
  margin-top: 4px;
}
  </style>
</head>

<body>
  <div id="popup" class="popup">
      <div class="popup-content">
        <i class="fa fa-check" aria-hidden="true"></i> <span id="popupMessage"></span>
      </div>
  </div>
  
  @if(session('send'))
      <script>
          // Function to show the success message popup
          function showSuccessMessage(message) {
              var popup = document.getElementById('popup');
              var popupMessage = document.getElementById('popupMessage');
              popupMessage.textContent = message;
              popup.classList.add('show');
  
              setTimeout(function() {
                  popup.classList.remove('show');
              }, 5000); // Hide the popup after 2 seconds
          }
  
          // Call the showSuccessMessage function with the session success message
          showSuccessMessage("{{ session('send') }}");
      </script>
  @endif

  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">{{ __('landing.logo_text') }}</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">{{ __('landing.Home') }}</a></li>
          <li><a href="#about">{{ __('landing.About_Us') }}</a></li>
          <li><a href="#features">{{ __('landing.Features') }}</a></li>
          <li><a href="#team">{{ __('landing.Team') }}</a></li>
          <li><a href="#gallery">{{ __('landing.G') }}</a></li>
          <li><a href="{{route('projects',[app()->getLocale()])}}">{{ __('landing.Our_Projects') }}</a></li>
          <li class="menu-has-children"><a href="">{{ __('landing.language') }}</a>
            <ul>
              <li><a class="dropdown-item" href="{{ route('landing', ['lang' => 'fa']) }}">{{ __('landing.dari') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('landing', ['lang' => 'ps']) }}">{{ __('landing.pashto') }}</a></li>
              <li><a class="dropdown-item" href="{{ route('landing', ['lang' => 'en']) }}">{{ __('landing.english') }}</a></li>
            </ul>
          </li>
          <li><a href="#contact">{{ __('landing.Contact_Us') }}</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-text">
      <h2>{{ __('landing.welcome') }}</h2>
      <p>{{ __('landing.intro_text') }}</p>
      <a href="#about" class="btn-get-started scrollto">{{ __('landing.intro_btn_text') }}</a>
    </div>

    <div class="product-screens">

      <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
        <img src="img/product-screen-1.png" alt="">
      </div>

      <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
        <img src="img/product-screen-2.png" alt="">
      </div>

      <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
        <img src="img/product-screen-3.png" alt="">
      </div>

    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about" class="section-bg">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">{{ __('landing.About_Us') }}</h3>
          <span class="section-divider"></span>
          <p class="section-description left">
            {{ __('landing.About_Us_text') }}
          </p>
        </div>

        <div class="row">
          <div class="col-lg-6 about-img wow fadeInLeft">
            <img src="img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content wow fadeInRight">
            <h2>{{ __('landing.Our_Goals') }}</h2>
            <p>{{ __('landing.Our_Goals_p1') }}</p>
            <p>{{ __('landing.Our_Goals_p2') }}</p>
          </div>
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Product Featuress Section
    ============================-->
    <section id="features">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 offset-lg-4">
            <div class="section-header wow fadeIn" data-wow-duration="1s">
              <h3 class="section-title">{{ __('landing.Product Features') }}</h3>
              <span class="section-divider"></span>
            </div>
          </div>

          <div class="col-lg-4 col-md-5 features-img">
            <img src="img/product-features.png" alt="" class="wow fadeInLeft">
          </div>

          <div class="col-lg-8 col-md-7 ">

            <div class="row">

              <div class="col-lg-6 col-md-6 box wow fadeInRight">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                <h4 class="title"><a href="">{{ __('landing.High security') }}</a></h4>
                <p class="description">{{ __('landing.High security desc') }}</p>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
                <div class="icon"><i class="ion-ios-flask-outline"></i></div>
                <h4 class="title"><a href="">{{ __('landing.Unique speed') }} </a></h4>
                <p class="description">{{ __('landing.Unique speed desc') }}</p>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.2s">
                <div class="icon"><i class="ion-social-buffer-outline"></i></div>
                <h4 class="title"><a href="">{{ __('landing.Advanced data processing') }}</a></h4>
                <p class="description">{{ __('landing.Advanced data processing desc') }}</p>
              </div>
              <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                <h4 class="title"><a href="">{{ __('landing.Community engagement') }}</a></h4>
                <p class="description">{{ __('landing.Community engagement desc') }}</p>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- #features -->

    <!--==========================
      Product Advanced Featuress Section
    ============================-->
    <section id="advanced-features">

      <div class="features-row section-bg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-right wow fadeInRight" src="img/advanced-feature-1.jpg" alt="">
              <div class="wow fadeInLeft content">
                <h2>{{ __('landing.Our Product & Services') }}</h2>
                <h3>{{ __('landing.Our Product & Services desc') }}</h3>
                <ul>
                  <li><i class="ion-android-checkmark-circle"></i>{{ __('landing.Our Product & Services li1') }}</li>
                  <li><i class="ion-android-checkmark-circle"></i>{{ __('landing.Our Product & Services li2') }}</li>
                  <li><i class="ion-android-checkmark-circle"></i>{{ __('landing.Our Product & Services li3') }}</li>
                  <li><i class="ion-android-checkmark-circle"></i>{{ __('landing.Our Product & Services li4') }}</li>
                  <li><i class="ion-android-checkmark-circle"></i>{{ __('landing.Our Product & Services li5') }}</li>
                  <li><i class="ion-android-checkmark-circle"></i>{{ __('landing.Our Product & Services li6') }}</li> 
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="features-row">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-left" src="img/advanced-feature-2.jpg" alt="">
              <div class="wow fadeInRight">
                <h2>{{ __('landing.Our Successes') }}</h2>
                <p class="wow fadeInRight" data-wow-duration="0.5s">
                  {{ __('landing.Our Successes text') }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="features-row section-bg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-right wow fadeInRight" src="img/advanced-feature-3.jpg" alt="">
              <div class="wow fadeInLeft">
                <h2>{{ __('landing.Our Customers') }}</h2>
                <h3>{{ __('landing.Our Customers text') }}</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #advanced-features -->

    <!--==========================
      Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">{{ __('landing.Call To Action') }}</h3>
            <p class="cta-text">{{ __('landing.Call To Action text') }} </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">{{ __('landing.Call To Action btn') }}</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      More Features Section
    ============================-->
    <section id="more-features" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">{{ __('landing.What Makes Us Different') }}</h3>
          <span class="section-divider"></span>
          <p class="section-description">{{ __('landing.What Makes Us Different text') }}</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="ion-ios-stopwatch-outline"></i></div>
              <h4 class="title"><a href="">{{ __('landing.What Makes Us Different div1 h') }}</a></h4>
              <p class="description">{{ __('landing.What Makes Us Different div1 text') }}</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
              <h4 class="title"><a href="">{{ __('landing.What Makes Us Different div2 h') }}</a></h4>
              <p class="description">{{ __('landing.What Makes Us Different div2 text') }}</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="ion-ios-heart-outline"></i></div>
              <h4 class="title"><a href="">{{ __('landing.What Makes Us Different div3 h') }}</a></h4>
              <p class="description">{{ __('landing.What Makes Us Different div3 text') }}</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="ion-ios-stopwatch-outline"></i></div>
              <h4 class="title"><a href="">{{ __('landing.What Makes Us Different div4 h') }}</a></h4>
              <p class="description">{{ __('landing.What Makes Us Different div4 text') }}</p>
            </div>
          </div>
          
        </div>
      </div>
    </section><!-- #more-features -->

    <!--==========================
      Clients
    ============================-->
    <section id="clients">
      <div class="container">

        <div class="row wow fadeInUp">

          <div class="col-md-2">
            <img src="img/clients/client-1.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-2.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-3.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-4.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-5.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-6.png" alt="">
          </div>

        </div>
      </div>
    </section><!-- #more-features -->
    <!--==========================
      Frequently Asked Questions Section
    ============================-->
    <section id="faq">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">{{ __('landing.Frequently Asked Questions') }}</h3>
          <span class="section-divider"></span>
          <p class="section-description">{{ __('landing.Frequently Asked Questions text') }}</p>
        </div>

        <ul id="faq-list" class="wow fadeInUp">
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq1">{{ __('landing.question1') }}<i class="ion-android-remove"></i></a>
            <div id="faq1" class="collapse" data-parent="#faq-list">
              <p>
                {{ __('landing.Answer1') }}
              </p>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq2">{{ __('landing.question2') }}<i class="ion-android-remove"></i></a>
            <div id="faq2" class="collapse" data-parent="#faq-list">
              <p>
                {{ __('landing.Answer2') }}
              </p>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq3">{{ __('landing.question3') }}<i class="ion-android-remove"></i></a>
            <div id="faq3" class="collapse" data-parent="#faq-list">
              <p>
                {{ __('landing.Answer3') }}
              </p>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq4">{{ __('landing.question4') }}<i class="ion-android-remove"></i></a>
            <div id="faq4" class="collapse" data-parent="#faq-list">
              <p>
                {{ __('landing.Answer4') }}
              </p>
            </div>
          </li>
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq5">{{ __('landing.question5') }}<i class="ion-android-remove"></i></a>
            <div id="faq5" class="collapse" data-parent="#faq-list">
              <p>
                {{ __('landing.Answer5') }}
              </p>
            </div>
          </li>
          
        </ul>

      </div>
    </section><!-- #faq -->

    <!--==========================
      Our Team Section
    ============================-->
    <section id="team" class="section-bg">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">{{ __('landing.Our Team') }}</h3>
          <span class="section-divider"></span>
          <p class="section-description">{{ __('landing.Our Team text') }} </p>
        </div>
        <div class="row wow fadeInUp">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-1.jpg" alt=""></div>
              <h4>{{ __('landing.Name2') }}</h4>
              <span>{{ __('landing.Position2') }}</span>
              <span>{{ __('landing.Degree2') }}</span>
              <span>{{ __('landing.Experience2') }}</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-1.jpg" alt=""></div>
              <h4>{{ __('landing.Name1') }}</h4>
              <span>{{ __('landing.Position1') }}</span>
              <span>{{ __('landing.Degree1') }}</span>
              <span>{{ __('landing.Experience1') }}</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-1.jpg" alt=""></div>
              <h4>{{ __('landing.Name3') }}</h4>
              <span>{{ __('landing.Position3') }}</span>
              <span>{{ __('landing.Degree3') }}</span>
              <span>{{ __('landing.Experience3') }}</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-1.jpg" alt=""></div>
              <h4>{{ __('landing.Name4') }}</h4>
              <span>{{ __('landing.Position4') }}</span>
              <span>{{ __('landing.Degree4') }}</span>
              <span>{{ __('landing.Experience4') }}</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-1.jpg" alt=""></div>
              <h4>{{ __('landing.Name5') }}</h4>
              <span>{{ __('landing.Position5') }}</span>
              <span>{{ __('landing.Degree5') }}</span>
              <span>{{ __('landing.Experience5') }}</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-1.jpg" alt=""></div>
              <h4>{{ __('landing.Name6') }}</h4>
              <span>{{ __('landing.Position6') }}</span>
              <span>{{ __('landing.Degree6') }}</span>
              <span>{{ __('landing.Experience6') }}</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-1.jpg" alt=""></div>
              <h4>{{ __('landing.Name7') }}</h4>
              <span>{{ __('landing.Position7') }}</span>
              <span>{{ __('landing.Degree7') }}</span>
              <span>{{ __('landing.Experience7') }}</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team/team-1.jpg" alt=""></div>
              <h4>{{ __('landing.Name8') }}</h4>
              <span>{{ __('landing.Position8') }}</span>
              <span>{{ __('landing.Degree8') }}</span>
              <span>{{ __('landing.Experience8') }}</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">{{ __('landing.Gallery') }}</h3>
          <span class="section-divider"></span>
          <p class="section-description">{{ __('landing.Gallery text') }}</p>
        </div>

        <div class="row no-gutters">
          @foreach ($images as $image)
            <div class="col-lg-4 col-md-6">
              <div class="gallery-item wow fadeInUp">
                <a href="img/gallery/gallery-1.jpg" class="gallery-popup">
                  <img src="{{asset($image->path)}}" alt="">
                </a>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </section><!-- #gallery -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container">
        <div class="row wow fadeInUp">
          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>{{ __('landing.logo_text') }}</h3>
              <p>{{ __('landing.footer text') }}</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="ion-ios-location-outline"></i>
                <p>{{ __('landing.Address line1') }}{{ __('landing.Address line2') }}</p>
                
              </div>

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>{{ __('landing.email') }}</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p>{{ __('landing.phone') }}</p>
              </div>

            </div>
          </div>
          <div class="col-lg-5 col-md-8">
            <div class="form">
              <form action="{{route('contact')}}" method="POST" role="form" class="contactForm">
                @csrf
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" style="border-radius: 30px;" class="form-control" id="name" placeholder="{{ __('landing.Your Name') }}" required/>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" style="border-radius: 30px;" name="email" id="email" placeholder="{{ __('landing.Your Email') }}" data-rule="email" required/>
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" style="border-radius: 30px;" name="subject" id="subject" placeholder="{{ __('landing.Subject') }}" required/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" style="border-radius: 20px;"  data-rule="required" placeholder="{{ __('landing.Message') }}" required></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">{{ __('landing.Send Message') }}</button></div>
              </form>
            </div>
          </div>
          <div class="col-lg-7 col-md-4 mt-3">
            <style>
              .golden {
                color: gold;
              }
            </style>
                    @php
                      use App\Models\Comments;
                      $comments = Comments::orderBy('rating', 'desc')->take(6)->get();
                    @endphp

                    
              <div style="display: flex;
              flex-direction: column; gap: 5px;">
                @foreach ($comments as $comment)
                <div class="card" style="padding: 15px; border-radius: 10px; background-color: whitesmoke;" > 
                  <p class="card-text">
                   
                  <b style="color: rgba(0, 0, 255, 0.614);" style="margin-right: 8px;">{{ __('landing.Name') }}:</b> {{$comment->name}}<b style="margin-left: 24px;">{{ __('landing.Comment') }}:</b> {{$comment->content}}
                  <span class="stars-p" style="float: right;">
                    @if ($comment->rating==1)
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @elseif ($comment->rating==2)
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @elseif ($comment->rating==3)
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    @elseif ($comment->rating==4)
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star"></i>
                    @elseif ($comment->rating==5)
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star golden"></i>
                    <i class="fas fa-star golden"></i>
                    </span>
                    @endif</p>
                  
                </div>
                @endforeach
              </div>
          </div>
            <div class="col-lg-5 col-md-8 mt-3">
              <form action="{{route('comment')}}" method="POST" role="form" class="contactForm">
                @csrf
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('landing.Your Name') }}" data-rule="minlen:4" data-msg="Please enter at least 4 chars"
                    style="border-radius: 30px;" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <select class="form-control stars-feedback" style="border-radius: 30px;"  name="rating" required>
                      <option value="" disabled selected>{{ __('landing.Please Rate Us') }}</option>
                      <option  rating="1" value="1">
                        ★☆☆☆☆
                      </option>
                      <option  rating="2" value="2">★★☆☆☆</option>
                      <option  rating="3"  value="3">★★★☆☆</option>
                      <option  rating="4" value="4">★★★★☆</option>
                      <option  rating="5" value="5">★★★★★</option>
                    </select>
                  </div>
                <div class="form-group col-lg-12">
                  <textarea class="form-control" style="border-radius: 20px;" name="message" rows="5" data-rule="required" placeholder="{{ __('landing.Comment text') }}"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" class="send_comment" title="Send Message">{{ __('landing.Send Comment') }}</button></div>
              </form>
            </div>
        </div>
      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Zirak</strong>. All Rights Reserved
          </div>
          <div class="credits">
            Designed by <a href="">Ahmad Zaki Wahedy</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto m-2" >{{__('landing.Home')}}</a>
            <a href="#about" class="scrollto m-2">{{__('landing.About_Us')}}</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript File -->

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
