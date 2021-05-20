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
        <!--header starts-->
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
      <div class="container mt-5 pt-5">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 animate__animated animate__backInRight">
              <img src="{{asset('front/images/hero_image.jpg')}}" class="img1" alt="" srcset="">


            </div>
              <div class="col-lg-6 col-md-6 col-sm-12 animate__animated animate__backInLeft ">

                <h1 class="myheading animate__animated animate__backInLeft" >Saychizz Gift Cards</h1>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">For whom gift is?</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="email ">
                </div>
                <p> Please Slelect no of tiles: </p>
                <button type="button" class="btn btn-outline-danger" id="btn3"><div class="top">3 Tiles</div><div class="bottom">US$58</div></button>
                <button type="button" class="btn btn-outline-danger" id="btn6"><div class="top">6 Tiles</div><div class="bottom">US$94</div></button>
                <button type="button" class="btn btn-outline-danger" id="btn8"><div class="top">8 Tiles</div><div class="bottom">US$118</div></button>
                <br><br>
                <button type="button" class="btn btn-outline-danger" id="btn12"><div class="top">12 Tiles</div><div class="bottom">US$166</div></button>
                <button type="button" class="btn btn-outline-danger" id="btn16"><div class="top">16 Tiles</div><div class="bottom">US$214</div></button>
                <button type="button" class="btn btn-outline-danger" id="btn20"><div class="top">20 Tiles</div><div class="bottom">US$262</div></button>
                <p><i class="fas fa-check"></i> Shipping Included</p>
                <div class="displayh" id="tile3"><h5>You selected 3 tiles card your bill is 58 usd</h5></div>
                <div><h5 class="displayh" id="tile6">You selected 6 tiles card your bill is 94 usd</h5></div>
                <div><h5 class="displayh" id="tile8">You selected 8 tiles card your bill is 118 usd</h5></div>
                <div><h5 class="displayh" id="tile12">You selected 12 tiles card your bill is 166 usd</h5></div>
                <div><h5 class="displayh" id="tile16">You selected 16 tiles card your bill is 214 usd</h5></div>
                <div><h5 class="displayh" id="tile20">You selected 20 tiles card your bill is 262 usd</h5></div>
                <button class="btn btn-lg my-5 mylink" data-bs-toggle="modal" data-bs-target="#exampleModal">Buy Now</button>
                <div class="how-it-works my-5">
                  <div class="title">How does it work?</div>
                  <div class="HowItWorksItem">
                  <span class="icon"><i class="fas fa-tag"></i>
                  </span>
                  1. Buy the digital gift card</div><div class="HowItWorksItem">
                    <span class="icon"><i class="far fa-envelope"></i>
                    </span>
                    2. We send it over email to your friend or family member</div>
                    <div class="HowItWorksItem">
                      <span class="icon">
                        <i class="fas fa-gift"></i>
                      </span>
                    3. They order Saychizzs and apply the gift code at checkout!
                  </div>
                </div>
                <div class="contact-us">Any questions?<span class="contact-us-button">Contact us</span></div>
              </div>

          </div>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title myheading" id="exampleModalLabel">Check Out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nameCard" class="form-label">Your Name</label>
                  <input type="text" class="form-control" id="nameCard" placeholder="your name">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Email address</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <img src="{{asset('front/images/credit_card_PNG118.png')}}" width="100%" height="auto" alt="" srcset="">
                  </div>
                  <div class="col-md-2">
                    <img src="{{asset('front/images/master_card.png')}}" width="100%" height="auto" alt="" srcset="">
                  </div>
                  <div class="col-md-2">
                    <img src="{{asset('front/images/american-express-logo-png.png')}}" width="100%" height="auto" alt="" srcset="">
                  </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2"></div>
                </div>
                <div class="col-md-12">
                  <label for="cardno" class="form-label">Card No</label>
                  <input type="number" class="form-control" id="cardno">
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="expiry" class="form-label">Card Expiry Date</label>
                    <input type="month" class="form-control" id="expiry">
                  </div>


                  <div class="col-md-3">
                    <label for="cvc" class="form-label">CVC</label>
                    <input type="number" class="form-control" id="cvc">
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="mybtn" data-bs-dismiss="modal">Pay Now</button>

              </div>
            </div>
          </div>
        </div>
    </div>








    <script src="{{asset('front/js/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="https://raw.github.com/brandonaaron/jquery-mousewheel/master/jquery.mousewheel.js"></script>
 <script src="{{asset('front/js/node_modules/jquery/dist/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('front/js/app.js')}}"></script>
 <script>
   $("document").ready(function(){
     $("#btn3").click(function(){
      $("#tile3").addClass("display")
      $("#tile6").removeClass("display")
      $("#tile8").removeClass("display")
      $("#tile12").removeClass("display")
      $("#tile16").removeClass("display")
      $("#tile20").removeClass("display")
     });
     $("#btn6").click(function(){
      $("#tile3").removeClass("display")
      $("#tile6").addClass("display")
      $("#tile8").removeClass("display")
      $("#tile12").removeClass("display")
      $("#tile16").removeClass("display")
      $("#tile20").removeClass("display")
     });
     $("#btn8").click(function(){
      $("#tile3").removeClass("display")
      $("#tile6").removeClass("display")
      $("#tile8").addClass("display")
      $("#tile12").removeClass("display")
      $("#tile16").removeClass("display")
      $("#tile20").removeClass("display")
     });
     $("#btn12").click(function(){
      $("#tile3").removeClass("display")
      $("#tile6").removeClass("display")
      $("#tile8").removeClass("display")
      $("#tile12").addClass("display")
      $("#tile16").removeClass("display")
      $("#tile20").removeClass("display")
     });
     $("#btn16").click(function(){
      $("#tile3").removeClass("display")
      $("#tile6").removeClass("display")
      $("#tile8").removeClass("display")
      $("#tile12").removeClass("display")
      $("#tile16").addClass("display")
      $("#tile20").removeClass("display")
     });
     $("#btn20").click(function(){
      $("#tile3").removeClass("display")
      $("#tile6").removeClass("display")
      $("#tile8").removeClass("display")
      $("#tile12").removeClass("display")
      $("#tile16").removeClass("display")
      $("#tile20").addClass("display")
     });






   });
 </script>




</body>
</html>
