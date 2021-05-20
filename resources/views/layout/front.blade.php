<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mixtile clone</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}">
    <link
        rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('front/css/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <script src="https://kit.fontawesome.com/24f1b87198.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('cs')
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
                                <a class="navbar-brand" href="#"><h4 class="myheading">Saychizz</h4></a>
                            </div>
                            <div class="col-4" >
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn" data-bs-toggle="modal" data-bs-target="#exampleModal"  href="#">FAQs</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('giftcard')}}">Gift Cards</a>
                                        </li>
                                        <li class="nav-item mx-3">
                                            <a class="nav-link btn-danger btn-lg mylink" href="{{route('start')}}">Start Now</a>
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
    @yield('body')
<!--footer starts-->
    <div class="container mt-5 pt-5 pb-3">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <ul>
                    <li><a href="#" class="menu">About us</a>

                    </li>
                    <li class="mt-2">
                        <a href="#" class="menu" data-bs-toggle="modal" data-bs-target="#exampleModal">Frequent Questions</a>
                    </li>
                    <li class="mt-2">
                        <a href="#" class="menu">Careers</a>
                    </li>
                    <li class="mt-2">
                        <a href="" class="menu">Accessbility Statement</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <ul>
                    <li><h6 class="menu">Follow us</h6>

                    </li>
                    <li class="mt-2">
                        <a href="#" class="menu">Facebook</a>
                    </li>
                    <li class="mt-2">
                        <a href="#" class="menu">Twiter</a>
                    </li>
                    <li class="mt-2">
                        <a href="" class="menu">Instagram</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="contact-us">
                    <i class="fas fa-sms chat"></i>
                    <h5 class="mx-5 menu">Need Some Help</h5>
                    <p  class="mx-5 menu">Our team is ready  to help you <br> text us now</p>
                    <button class="btn-lg btn-danger mx-5">
                        Chat with us
                    </button>


                </div>
            </div>
        </div>
        <div class="row"></div>

    </div>
    <!--footer endss-->
    <div class="modal " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">FAQs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    How much do Mixtiles cost?
                    Each order starts with US$58 for the first 3 tiles, then US$12 for each additional tile in that set.
                    How big are the tiles?
                    They’re about 20 by 20 cm and 2 cm thick (8 by 8 inches and just under an inch thick).
                    Have you got any other sizes?
                    Not for now, but we'd love to. Hopefully soon!
                    How long does shipping take?
                    Usually about a week. In some countries it takes a little longer, but the app will show you your expected delivery date before you confirm your order.
                    How do Mixtiles work?
                    There’s a sticky strip on the back of them. You peel off the protective paper and stick them on the wall. Easy as pie! (We enjoy pie.)
                    Is it easy to move the tiles around?
                    Super easy - that's what Mixtiles are made for! Just pop them off the wall and stick them in a different spot. Knock yourself out, you can do this a few dozen times!
                    And they won't hurt my walls?
                    Nope, no damage.
                    Are there any kinds of walls Mixtiles won't stick to?
                    They work great on the vast majority of walls. But if you have any trouble at all, just let us know and we'll get you a refund.
                    Can I get my order rush shipped?
                    Not for now, sorry!
                    Is there a minimum photo resolution I should use?
                    Your pics should be at least 499 x 499 pixels to make a clear print. The app will warn you if your pics are smaller than that.
                    Can I use photos from my Facebook or Instagram?
                    Yup! Select "Choose from Online Services" when adding your photos.
                    Do you ship internationally?
                    We ship to most countries around the world. You can choose your country from the drop-down menu when you enter your address!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>

<script src="{{asset('front/js/node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('front/js/node_modules/jquery/dist/bootstrap.bundle.min.js')}}"></script>
<script src='https://raw.github.com/brandonaaron/jquery-mousewheel/master/jquery.mousewheel.js'></script>

@yield('js')
