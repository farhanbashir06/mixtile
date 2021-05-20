<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <link rel="stylesheet" href="{{asset('front/css/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <script src="https://kit.fontawesome.com/24f1b87198.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saychizz</title>
</head>
<body>
    <div class="container-fluid">
        <!--header startsssd-->
      <div class="container">
          <div class="row">
              <div class="col-12 ">
                <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid mycontainer">
                        <div class="row">
                            <div class="col-8">
                                <a class="navbar-brand" href="{{url('/')}}"><h4 class="myheading">Saychizz</h4></a>
                            </div>
                            <div class="col-4" >
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                  </button>
                                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                          <li class="nav-item">
                                              <a class="nav-link active" aria-current="page" href="{{url('/')}}">HOME</a>
                                          </li>

                                          <li class="nav-item">
                                              <a class="nav-link" href="{{route('giftcard')}}">GIFT CARD</a>
                                          </li>
                                          <li class="nav-item mx-3">
                                              <a class="nav-link" href="{{route('contact')}}">CONTACT</a>
                                          </li>


                                      </ul>

                                  </div>
                            </div>
                        </div>



                    </div>
                  </nav>
              </div>
          </div>
      </div>
      <!--header ends-->
      <!--slider area starts-->
      <div class="container">
        <h1>Accessibility Statement</h1>
        <p>
            We are committed to ensuring that persons with disabilities have access to our goods and services, including those
            offered through our website, <a class="a" href="http://www.saychizz.com/">www.saychizz.com</a> and mobile application. As
            such, we strive to adhere to the Web Content Accessibility Guidelines (“WCAG”) 2.0 Levels A and AA, a set of guidelines developed by the World Wide Web Consortium and used to ensure that
            digital content is accessible to everyone. We also work with advocacy groups, accessibility and usability
            consultants, and persons with disabilities to make sure that our website and mobile applications function properly.
            We are always learning and looking for ways to improve accessibility. Here are some steps we’ve taken to improve
            access to our website and mobile applications:
        </p>
        <ul id="l1">
            <li>
                <p>
                    Text Equivalents: We provide alternative text detail for appropriate images and other non-text elements.
                </p>
            </li>
            <li>
                <p>
                    Full Keyboard Access: Our website is built so that it can be accessed using a keyboard.
                </p>
            </li>

            <li>
                <p>
                    Site Consistency: We are consistent in the way we build our website and mobile applications so that they
                    function the same way every time you interact with them.
                </p>
            </li>

            <li>
                <p>
                    Site Structure: We use appropriate headings, lists, paragraphs, style sheets and other formatting features
                    so
                    that guests can easily use the website with assistive technology.
                </p>
            </li>

            <li>
                <p>
                    Links: Many links have title attributes which describe the link in greater detail, unless the text of the
                    link
                    already fully describes the target.
                </p>
            </li>
        </ul>
        <h1>
            Contact Us
        </h1>
        <p>
            If you have any feedback or questions regarding our website, please email us at <a class="a" href="#">hi@saychizz.com</a>.
        </p>
      </div>
       <!--slider area ends-->




        <!--footer starts-->
        <div class="row mt-5">
            <div class="HomeBottomMenu-desktop col-12">

                <div class="MenuItem">
                    <a href="{{route('terms')}}" target="_blank">TERMS OF USE</a>
                </div>
                <div class="MenuItem">
                    <a href="{{route('access')}}" target="_blank">ACCESSIBILITY STATEMENT</a>
                </div>
                <div class="MenuItem">
                    <a href="{{route('privacy')}}" target="_blank">PRIVACY POLICY</a>
                </div>
                <div class="MenuItem">
                    <a href="{{route('impressum')}}" >IMPRESSUM</a>
                </div>
                <div class="MenuItem">
                    <a href="{{route('contact')}}">CONTACT</a>
                </div>
            </div>
        </div>

        <!--footer endss-->

    </div>








    <script src="{{asset('front/js/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src='https://raw.github.com/brandonaaron/jquery-mousewheel/master/jquery.mousewheel.js'></script>
 <script src="{{asset('front/js/node_modules/jquery/dist/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('front/js/app.js')}}"></script>






</body>
</html>
