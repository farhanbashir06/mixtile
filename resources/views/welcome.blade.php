@extends('layout.front')

@section('body')
    @php
     use App\Models\HomePage;
      use App\Models\Review;
        $reviews=Review::all();
        $data=HomePage::find(1);
        @endphp
    @php($section1=(!empty($data->section1)?json_decode($data->section1):null))
    @php($section2=(!empty($data->section2)?json_decode($data->section2):null))
    @php($section3=(!empty($data->section3)?json_decode($data->section3):null))
      <!--slider area starts-->
      <div class="container mt-5 pt-5">
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-12 animate__animated animate__backInLeft ">

                <h1 class="myheading animate__animated animate__backInLeft" >{!! ($section1!=null)?$section1->h:"" !!}</h1>
                <h3 class="mt-4">{!!($section1!=null)?$section1->d:"" !!}</h3>
                <br><br>
                <a href="{{route('start')}}" class="btn-lg btn-danger mt-5 mylink">Start Now</a>
                <p class="mt-4 myp"><i class="fas fa-shipping-fast"></i>Free shipping worldwide !</p>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 animate__animated animate__backInRight">
                <div class="row">
                  <div class="col-6">
                    <img src="{{asset('/')}}{{($section1!=null)?$section1->img1:''}}" class="img1" alt="" srcset="">
                  </div>
                  <div class="col-6">
                    <img src="{{asset('/')}}{{($section1!=null)?$section1->img2:''}}" class="img2" alt="" srcset="">
                    <img src="{{asset('/')}}{{($section1!=null)?$section1->img3:''}}" class="img3" alt="" srcset="">
                  </div>
                </div>


              </div>
          </div>
      </div>
       <!--slider area ends-->
       <!--feature are starts-->
       <div class="container mt-5 animate__animated animate__backInUp">
         <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-12 text-center pt-4">
             <figure>
               <img src="{{asset('/')}}{{($section2!=null)?$section2->img1:''}}" alt="" srcset="">
             </figure>
             <h5>{{($section2!=null)?$section2->h1:''}}</h5>
             <h6>{{($section2!=null)?$section2->d1:''}}</h6>

           </div>
           <div class="col-lg-4 col-md-4 col-sm-12 text-center pt-4">
            <figure>
              <img src="{{asset('/')}}{{($section2!=null)?$section2->img2:''}}" alt="" srcset="">
            </figure>
            <h5>{{($section2!=null)?$section2->h2:''}}</h5>
            <h6>{{($section2!=null)?$section2->d2:''}}</h6>
           </div>
           <div class="col-lg-4 col-md-4 col-sm-12 text-center pt-4">
            <figure>
              <img src="{{asset('/')}}{{($section2!=null)?$section2->img2:''}}" alt="" srcset="">
            </figure>
            <h5>{{($section2!=null)?$section2->h3:''}}</h5>
            <h6>{{($section2!=null)?$section2->d3:''}}</h6>
           </div>
         </div>

       </div>
       <!--feature are ends-->
       <!--frame area starts-->
       <div class="container mt-5 pt-5 pb-5 background">
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-12 animate__animated animate__backInLeft ">
            <video width="70%" class="mx-5 rounded" height="auto" autoplay  muted loop playsinline >
              <source src="{{asset('/')}}{{($section3!=null)?$section3->img1:''}}" type="video/mp4">
{{--              <source src="{{ asset('front/images/unbox_peel_stick_002.WebM')}}" type="video/WebM">--}}

            </video>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-12 pt-5 animate__animated animate__backInRight">
             <h2 class="mt-5">{!!($section3!=null)?$section3->h1:'' !!}</h2>
              <h6 class="mt-4">{!!($section3!=null)?$section3->d1:''!!}</h6>
           </div>
         </div>

       </div>
       <!--frame area ends-->
       <!--review area starts-->
       <div class="container mt-5 text-center myheading">
         <h2>Our customers reviews give us more confidence</h2>

        <ul class="portfolio-items">

           @foreach($reviews as $review)
        <li class="item">
          <figure>
            <div class="view">
              <img src="{{asset('/')}}{{$review->img}}" />
            </div>
            <figcaption>
              <p><span><a href="https://webdevtrick.com/flex-hover-slider/">{{$review->title}}</a></span></p>
              <p>{{$review->descr}}</p>
            </figcaption>
          </figure>
          <div class="date">{{$review->year}}</div>
        </li>

            @endforeach

      </ul>
      </div>
       <!--review area ends-->
       <!--video area starts-->
       <div class="container video-container">

         <div class="row">
           <div class="col-lg-12 p-5">
            <h1 class="my2ndh2">Millions of people in the
              <br> world chose us</h1>
              <button class="btn-lg">
                <a href="" class="btna">
                  <i class="far fa-play-circle"></i>
                  <br>Watch the video
                </a>
              </button>
           </div>
         </div>

       </div>
        <!--video area ends-->
        <!--rating area starts-->
        <div class="container mt-5 pt-5">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-1 rating">
              <span><i class="fas fa-star mystar "></i></span>
              <span><i class="fas fa-star mystar "></i></span>
              <span><i class="fas fa-star mystar "></i></span>
              <span><i class="fas fa-star mystar "></i></span>
              <span><i class="fas fa-star mystar "></i></span>
              <h5 class="mt-2">4.8 rating on appstore</h5>
              <h6>out of 10000 ratings</h6>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-1 rating">
              <img class="logos" src="{{ asset('front/images/-consumer-affairs-accredited-png-download.png')}}" alt="">
              <img class="logos" src="{{ asset('front/images/influenster.png')}}" alt="">
              <img class="logos" src="{{ asset('front/images/yelp.png')}}" alt="">
              <h5 class="mt-2">Exilent Ratings on all plateforms</h5>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-1 rating">
              <img class="trust" src="{{ asset('front/images/trustradius.png')}}" alt="" srcset="">
              <h5 class="newh5">Trust with Trustradius</h5>
            </div>
          </div>
        </div>
        <!--rating area ends-->

@endsection
@section('js')
      <script>
          // Code By Webdevtrick ( https://webdevtrick.com )
          (function($) {
              var $window = $(window);

              $.fn.isVisible = function(){
                  var $this = $(this),
                      Left = $this.offset().left,
                      visibleWidth = $window .width();

                  return Left < visibleWidth;
              }
          })(jQuery);

          (function($){
              var list = $('.portfolio-items'),
                  showVisibleItems = function(){
                      list.children('.item:not(.falldown)').each(function(el, i){
                          var $this = $(this);
                          if($this.isVisible()){
                              $this.addClass('falldown');
                          }
                      });
                  };

              //initially show all visible items before any scroll starts
              showVisibleItems();

              //then on scroll check for visible items and show them
              list.scroll(function(){
                  showVisibleItems();
              });

              //image hover pan effect
              list.on('mousemove','img', function(ev){
                  var $this = $(this),
                      posX = ev.pageX,
                      posY = ev.pageY,
                      data = $this.data('cache');
                  //cache necessary variables
                  if(!data){
                      data = {};
                      data.marginTop = - parseInt($this.css('top')),
                          data.marginLeft = - parseInt($this.css('left')),
                          data.parent = $this.parent('.view'),
                          $this.data('cache', data);
                  }

                  var originX = data.parent.offset().left,
                      originY =  data.parent.offset().top;

                  //move image
                  $this.css({
                      'left': -( posX - originX ) / data.marginLeft,
                      'top' : -( posY - originY ) / data.marginTop
                  });
              });


              list.on('mouseleave','.item', function(e){
                  $(this).find('img').css({
                      'left': '0',
                      'top' : '0'
                  });
              });

              list.mousewheel(function(event, delta) {

                  this.scrollLeft -= (delta * 60);

                  event.preventDefault();

              });
          })(jQuery);
      </script>
@endsection


