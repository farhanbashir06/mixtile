<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.css" integrity="sha512-NCJ1O5tCMq4DK670CblvRiob3bb5PAxJ7MALAz2cV40T9RgNMrJSAwJKy0oz20Wu7TDn9Z2WnveirOeHmpaIlA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{asset('front/css/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
  <script src="https://kit.fontawesome.com/24f1b87198.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />

  <title>Saychizz</title>
</head>

<body>
  <div class="container-fluid">
    <!--header starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 ">
          <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid mycontainer">
              <div class="row">
                <div class="col-1">
                  <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                </div>
                <div class="col-10 text-center">
                  <a href="{{url('/')}}" class="logoh">
                    <h2>Saychizz</h2>
                  </a>
                </div>
                <div class="col-1">

                  <button class="btn navbar-toggler-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></button>

                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" data-bs-scroll="true" data-bs-backdrop="false" aria-labelledby="offcanvasRightLabel">
                    <div class="offcanvas-header">
                      <h5 id="offcanvasRightLabel" class="myheading">Saychizz</h5>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <ul>
                        <li class="mt-3"><a href="" class="newlink" data-bs-toggle="modal" data-bs-target="#exampleModa2"><span><i class="fa fa-question-circle-o" aria-hidden="true"></i></span>FAQs</a></li>
                        <li class="mt-3"><a href="" class="newlink" data-bs-toggle="modal" data-bs-target="#exampleModal"><span><i class="fas fa-vr-cardboard"></i></span>Add Promo Code</a></li>
                        <li class="mt-3"><a href="{{route('giftcard')}}" class="newlink"><span><i class="fas fa-gift"></i></span>Buy a Gift</a></li>
                        <li class="mt-3"><a href="{{('contact')}}" class="newlink"><span><i class="far fa-comment-dots"></i></span> Contact us</a></li>
                      </ul>
                    </div>
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
    <div class="container-fluid mt-5 pt-5">

      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 text-center animate__animated animate__backInRight">
          <h2 class="myheading">Pick some photos to get started</h2>
          <div class="row" id="upload-first">
            <div class="col-lg-1"></div>
            <div class="col-lg-4 text-center mt-2 mb-2 upload">
              <i class="fas fa-camera  myheading mt-4" style="font-size: 40px;"></i>

              <div class="custom-file mb-3">
                <input class="custom-file-input form-control upload-file" type="file" accept="image/jpeg, image/png">
                <label for="upload-file" class="custom-file-label">Choose Image</label>
              </div>

            </div>
            <div class="col-lg-4 mt-2 mb-2 upload">
              <div class="row text-center social">
                <i class="fab fa-facebook" style="font-size: 40px; color: rgb(17, 17, 109); "></i><span>Import from Facebook</span>

              </div>
              <div class="row text-center social mt-3 mb-2">
                <i class="fab fa-instagram" style="font-size: 40px; color:rgb(245 7 172); "></i><span>Import from Instagram</span>
              </div>
            </div>
            <div class="col-lg-3">

            </div>

          </div>
          <div class="row" id="div2">


            <div class="col-md-4 mt-2 mb-2">
              <div class="row text-center">
                <div class="col-md-12 social">
                  <div class="row">
                    <div class="col-md-4">
                      <i class="fas fa-camera  myheading " style="font-size: 20px;"></i>
                    </div>
                    <div class="custom-file col-md-8">
                      <input type="file" class="custom-file-input form-control upload-file">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 social">
                  <div class="row">
                    <div class="col-md-4">
                      <i class="fab fa-facebook" style="font-size: 25px; color: rgb(17, 17, 109); "></i>
                    </div>
                    <div class="col-md-8">
                      <span> Import from Facebook</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 social">
                  {{-- <i class="fab fa-instagram" style="font-size: 25px; "></i><span> Import from Instagram</span>--}}
                  <div class="row">
                    <div class="col-md-4">
                      <i class="fab fa-instagram" style="font-size: 25px; color: rgb(245 7 172); "></i>
                    </div>
                    <div class="col-md-8">
                      <span> Import from Instagram</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>

          <!--   <div class="col-lg-2">


                        <button class="mybtn2" id="crop">Crop</button>
                       <button class="mybtn2" id="deletebtn">Delete</button>
                     </div> -->


        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 animate__animated animate__backInLeft ">
          <div>

            <div class="row my-4 newclass" style="cursor:pointer;" id="calssic">
              <div class="col-md-3 col-md-3 col-sm-3">
                <img src="{{asset('front/images/classicIcon@2x.png')}}" class="img-fluid" max-width="100%" height="auto" alt="">

              </div>
              <div class="col-lg-9 col-md-9 col-sm-9 new3">
                <h4>classic</h4>

              </div>

            </div>
            <div class="row my-4 newclass" style="cursor:pointer;" id="bold">
              <div class="col-lg-3">
                <img src="{{asset('front/images/boldIcon@2x.png')}}" class="img-fluid" max-width="100%" height="auto" alt="">

              </div>
              <div class="col-lg-9 new3">
                <h4>Bold</h4>

              </div>

            </div>
            <div class="row my-4 newclass" style="cursor:pointer;" id="ever">
              <div class="col-lg-3">
                <img src="{{asset('front/images/everIcon@2x.png')}}" class="img-fluid" max-width="100%" height="auto" alt="">

              </div>
              <div class="col-lg-9 new3">
                <h4>Ever</h4>

              </div>

            </div>
            <div class="row my-4 newclass " style="cursor:pointer;" id="Clean">
              <div class="col-lg-3">
                <img src="{{asset('front/images/cleanIcon@2x.png')}}" class="img-fluid" max-width="100%" height="auto" alt="">

              </div>
              <div class="col-lg-9 new3">
                <h4>Clean</h4>

              </div>

            </div>
            <div class="row my-4 newclass" style="cursor:pointer;" id="Edge">
              <div class="col-lg-3">
                <img src="{{asset('front/images/edgeIcon@2x.png')}}" class="img-fluid" max-width="100%" height="auto" alt="">

              </div>
              <div class="col-lg-9 new3">
                <h4>Edge</h4>

              </div>
            </div>
            <!--  <div class="row my-4">
                         <div class="col-12">
                           <button class="mybtn2" id="revert-btn">Remove Changes</button>

                         </div>
                       </div> -->
            <div class="row my-4">
              <div class="col-12">
                <button class="mybtn" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Checkout</button>

              </div>
            </div>


          </div>
        </div>



        <input type="hidden" name="countt" id="countt" value="1">

      </div>



      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title myheading" id="offcanvasExampleLabel">Check Out</h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="row" data-bs-toggle="modal" data-bs-target="#exampleModa4" role="button">
            <div class="col-2">
              <i class="fas fa-home" style="font-size: 30px;"></i>
            </div>
            <div class="col-10">
              <h5 class="myheading">Add your address</h5>
            </div>
          </div>
          <div class="row mt-4" data-bs-toggle="modal" data-bs-target="#exampleModa3" role="button">
            <div class="col-2">
              <i class="fas fa-money-check-alt" style="font-size: 30px;"></i>

            </div>
            <div class="col-10">
              <h5 class="myheading">Add your Payment Method</h5>
            </div>
          </div>
          <div class="row mt-4">

            <div class="col-12">
              <p>Select atleast three tiles</p>

            </div>
          </div>
          <div class="row mt-4">

            <div class="col-12">
              <button class="mybtn">Place your order</button>

            </div>
          </div>

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
          <a href="{{route('impressum')}}">IMPRESSUM</a>
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
            <h5 class="modal-title" id="exampleModalLabel">Add Promo code</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Your Promo</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Add here">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Done</button>

          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModa2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title myheading" id="exampleModalLabel">FAQs</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h4 class="myheading">How much do Saychizz cost?</h4>
            <p>Each order starts with US$58 for the first 3 tiles,<br> then US$12 for each additional tile in that set.</p>
            <h4 class="myheading">How big are the tiles?</h4>
            <p>They’re about 20 by 20 cm and 2 cm thick (8 by 8 <br> inches and just under an inch thick).</p>
            <h4 class="myheading">Have you got any other sizes?</h4>
            <p>Not for now, but we'd love to. Hopefully soon!</p>


            <h4 class="myheading">How long does shipping take?</h4>
            <p> Usually about a week. In some countries it takes a <br>
              little longer, but the app will show you your expected <br>
              delivery date before you confirm your order.</p>


            <h4 class="myheading">How do Saychizz work?</h4>
            <p>There’s a sticky strip on the back of them. You peel <br>
              off the protective paper and stick them on the wall.
              Easy as pie! (We enjoy pie.)</p>
            <h4 class="myheading">Is it easy to move the tiles around?</h4>
            <p>Super easy - that's what Saychizzs are made for! Just <br>
              pop them off the wall and stick them in a different spot. <br>
              Knock yourself out, you can do this a few dozen times!</p>
            <h4 class="myheading">And they won't hurt my walls?</h4>
            <p>Nope, no damage.</p>
            <h4 class="myheading">Are there any kinds of walls Saychizz won't stick to?</h4>
            <p>They work great on the vast majority of walls. But if you have any trouble at all, <br>
              just let us know and we'll get you a refund.</p>
            <h4 class="myheading">Can I get my order rush shipped?</h4>
            <p> Not for now, sorry!</p>
            <h4 class="myheading"> Is there a minimum photo resolution I should use?</h4>
            <p>Your pics should be at least 499 x 499 pixels to make a clear print. The app will <br>
              warn you if your pics are smaller than that.</p>
            <h4 class="myheading">Can I use photos from my Facebook or Instagram?</h4>
            <p> Yup! Select "Choose from Online Services" when adding your photos.</p>
            <h4 class="myheading"> Do you ship internationally?</h4>
            <p>We ship to most countries around the world. </p>







          </div>
          <div class="modal-footer">
            <button type="button" class="btn mybtn2" data-bs-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModa3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title myheading" id="exampleModalLabel">Chose Your Payment Method</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row" data-bs-toggle="modal" data-bs-target="#exampleModa5" role="button">
              <div class="col-md-2">
                <i class="far fa-plus-square" style="font-size: 30px;"></i>
              </div>
              <div class="col-md-10">
                <h5 class="myheading">
                  Add your credit card
                </h5>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-md-2">
                <i class="fab fa-cc-paypal" style="font-size: 30px;"></i>
              </div>
              <div class="col-md-10" id="paypal-button-container">

              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
    <div class="modal fade" id="exampleModa4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title myheading" id="exampleModalLabel">Add Your personal Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3">
              <div class="col-md-6">
                <label for="firstname" class="form-label">Firts Name</label>
                <input type="text" class="form-control" id="firstname">
              </div>
              <div class="col-md-6">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname">
              </div>
              <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
              </div>
              <div class="col-12">
                <label for="inputAddress2" class="form-label">Address 2</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity">
              </div>
              <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <input type="text" class="form-control" id="inputState">
              </div>
              <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="number" class="form-control" id="inputZip">
              </div>
              <div class="col-md-6">
                <label for="inputCountry" class="form-label">Country</label>
                <input type="text" class="form-control" id="inputCountry">
              </div>
              <div class="col-md-6">
                <label for="inputno" class="form-label">Phone No</label>
                <input type="number" class="form-control" id="inputno">
              </div>
              <div class="col-md-2">
                <button type="submit" class=" mybtn" data-bs-dismiss="modal">Save</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModa5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title myheading" id="exampleModalLabel">Card Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="row g-3" accept-charset="UTF-8" action="{{url('/stripe')}}" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_test_51IMTL2E3aOKhVh4WtazJpG1Baaq1jpcdSzyelzI7HcV6gD3IljV42ABRhFDqXl6Y1D7u0aJjMuCsIlwW7bfjxG8E0068HLn8Gh" id="payment-form" method="post">
              @csrf
              <div class='form-row'>
                <div class='col-md-12 form-group required'>
                  <label class='control-label'>Name on Card</label> <input class='form-control' size='4' type='text'>
                </div>
              </div>
              <div class='form-row'>
                <div class='col-md-12 form-group card required'>
                  <label class='control-label'>Card Number</label> <input autocomplete='off' class='form-control card-number' type='text'>
                </div>
              </div>
              <div class='form-row'>
                <div class='col-md-4 form-group cvc required'>
                  <label class='control-label'>CVC</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                </div>
                <div class='col-md-4 form-group expiration required'>
                  <label class='control-label'>Expiration</label> <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                </div>
                <div class='col-md-4 form-group expiration required'>
                  <label class='control-label'> </label> <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                </div>
              </div>
              <div class="col-12">
                <label class="form-check-label" for="emailid">
                  Email
                </label>
                <input class="form-control" type="email" id="emailid">


              </div>
              <div class="col-3">
                <button type="submit" class="mybtn">Add Now</button>
              </div>
              <div class='form-row'>
                <div class='col-md-12 error form-group hide'>
                  <div class='alert-danger alert'></div>
                </div>
              </div>
            </form>

          </div>
          <div class="modal-footer">
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
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="cropingmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="cropingbody">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>







  <script src="{{asset('front/js/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src='https://raw.github.com/brandonaaron/jquery-mousewheel/master/jquery.mousewheel.js'></script>
  <script src="{{asset('front/js/node_modules/jquery/dist/bootstrap.bundle.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/camanjs/4.1.2/caman.full.min.js" integrity="sha512-JjFeUD2H//RHt+DjVf1BTuy1X5ZPtMl0svQ3RopX641DWoSilJ89LsFGq4Sw/6BSBfULqUW/CfnVopV5CfvRXA==" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js" integrity="sha512-FHa4dxvEkSR0LOFH/iFH0iSqlYHf/iTwLc5Ws/1Su1W90X0qnxFxciJimoue/zyOA/+Qz/XQmmKqjbubAAzpkA==" crossorigin="anonymous"></script>
  <script src="{{asset('front/js/app.js')}}"></script>
  <!-- Include the PayPal JavaScript SDK -->
  <script src="https://www.paypal.com/sdk/js?client-id=ATEjuGPpNNvNBomkRFmZSm2a2iYPPBTD95lBBC2SZCMfKBzi3YiEJN3XyncBboC--_KPgeJCxdmR1UlS&currency=USD"></script>

  <script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({

      // Set up the transaction
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '88.44'
            }
          }]
        });
      },

      // Finalize the transaction
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          // Show a success message to the buyer
          alert('Transaction completed by ' + details.payer.name.given_name + '!');
        });
      }


    }).render('#paypal-button-container');
  </script>
  <script>
    $(function() {
      $('form.require-validation').bind('submit', function(e) {
        var $form = $(e.target).closest('form'),
          inputSelector = ['input[type=email]', 'input[type=password]',
            'input[type=text]', 'input[type=file]',
            'textarea'
          ].join(', '),
          $inputs = $form.find('.required').find(inputSelector),
          $errorMessage = $form.find('div.error'),
          valid = true;

        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault(); // cancel on first error
          }
        });
      });
    });

    $(function() {
      var $form = $("#payment-form");

      $form.on('submit', function(e) {
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
      });

      function stripeResponseHandler(status, response) {
        if (response.error) {
          $('.error')
            .removeClass('hide')
            .find('.alert')
            .text(response.error.message);
        } else {
          // token contains id, last4, and card type
          var token = response['id'];
          // insert the token into the form so it gets submitted to the server
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
        }
      }
    });



    $('document').ready(function() {
      $('#calssic').click(function() {

        $('.canvas').addClass('canvas1');
        
        $('.canvas').removeClass('canvas2');
        $('.canvas').removeClass('canvas3');
        $('.canvas').removeClass('canvas4');
        $('.canvas').removeClass('canvas5');

      });
      $('#bold').click(function() {
        $('.canvas').addClass('canvas2');
        
        $('.canvas').removeClass('canvas1');
        $('.canvas').removeClass('canvas3');
        $('.canvas').removeClass('canvas4');
        $('.canvas').removeClass('canvas5');


      });
      $('#ever').click(function() {
        $('.canvas').addClass('canvas3');
        $('.canvas').removeClass('canvas1');
        $('.canvas').removeClass('canvas2');
        $('.canvas').removeClass('canvas4');
        $('.canvas').removeClass('canvas5');


      });
      $('#Clean').click(function() {
        $('.canvas').addClass('canvas4');
        $('.canvas').removeClass('canvas1');
        $('.canvas').removeClass('canvas2');
        $('.canvas').removeClass('canvas3');
        $('.canvas').removeClass('canvas5');


      });
      $('#Edge').click(function() {
        $('.canvas').addClass('canvas5');
        $('.canvas').removeClass('canvas1');
        $('.canvas').removeClass('canvas2');
        $('.canvas').removeClass('canvas3');
        $('.canvas').removeClass('canvas4');


      });
      $('#revert-btn').click(function() {
        $('.canvas').removeClass('canvas1');
        $('.canvas').removeClass('canvas2');
        $('.canvas').removeClass('canvas3');
        $('.canvas').removeClass('canvas4');
        $('.canvas').removeClass('canvas5');
      });



    });
  </script>

</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
@if(Session::has('errormsg'))
<script>
  toastr.error('', '{{Session::get('
    errormsg ')}}');
</script>
@endif
@if(Session::has('succesmsg'))
<script>
  toastr.success('', '{{Session::get('
    succesmsg ')}}');
</script>
@endif