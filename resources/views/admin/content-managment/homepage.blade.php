@extends('layout.admin')

@section('subheader')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Home Page</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

                <!--end::Actions-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->



                <!--end::Actions-->
                <!--begin::Dropdowns-->
                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                    <a href="#" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-success svg-icon-lg">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </a>
                    <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right py-3">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover py-5">
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-drop"></i>
                                    </span>
                                    <span class="navi-text">New Group</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-list-3"></i>
                                    </span>
                                    <span class="navi-text">Contacts</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-rocket-1"></i>
                                    </span>
                                    <span class="navi-text">Groups</span>
                                    <span class="navi-link-badge">
                                        <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                    </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-bell-2"></i>
                                    </span>
                                    <span class="navi-text">Calls</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-gear"></i>
                                    </span>
                                    <span class="navi-text">Settings</span>
                                </a>
                            </li>
                            <li class="navi-separator my-3"></li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-magnifier-tool"></i>
                                    </span>
                                    <span class="navi-text">Help</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                    <span class="navi-icon">
                                        <i class="flaticon2-bell-2"></i>
                                    </span>
                                    <span class="navi-text">Privacy</span>
                                    <span class="navi-link-badge">
                                        <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
                <!--end::Dropdowns-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
@endsection
@section('dashboard')
    <!--begine::Dashboard-->
    <div class="container-fluid">

        @php($section1=(!empty($data->section1)?json_decode($data->section1):null))
        @php($section2=(!empty($data->section2)?json_decode($data->section2):null))
        @php($section3=(!empty($data->section3)?json_decode($data->section3):null))

        <div class="card-body p-0">
            <form action="{{route('homepage.update',1)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h3>Section 1</h3>
                    <button type="submit" class="btn btn-info" style="float:right;">Update</button>

                </div>
                <div class="card-body row">

                    <div class="col-md-4">
                        <div class="col-md-12">
                            <div class="form-group">


                                <label>Heading</label>
                                <input type="text" name="heading" value="{{($section1!=null)?$section1->h:""}}" class="form-control" placeholder="" >
                            </div>
                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-12">
                            <div class="form-group">
                                <label >Description</label>

                                <textarea  class="form-control"  name="descr" >{{($section1!=null)?$section1->d:""}}</textarea>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-8">
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form">
                                <div class="row">

                                    <img style="width: 100px;" src="{{asset('/')}}{{($section1!=null)?$section1->img1:''}}" alt="">

                                    <input type="hidden" name="pr_img1" value="{{($section1!=null)?$section1->img1:''}}">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="field" align="left">
                                    <h3>Select image</h3>
                                    <input type="file"  name="img1"  />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form">
                                <div class="row">

                                    <img style="width: 100px;" src="{{asset('/')}}{{($section1!=null)?$section1->img2:''}}" alt="">

                                    <input type="hidden" name="pr_img2" value="{{($section1!=null)?$section1->img2:''}}">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="field" align="left">
                                    <h3>Select image</h3>
                                    <input type="file" name="img2"   />
                                </div>
                            </div>
                        </div>
                            <div class="col-md-4">
                            <div class="form">
                                <div class="row img-pre-sajjad">

                                    <img style="width: 100px;" src="{{asset('/')}}{{($section1!=null)?$section1->img3:''}}" alt="">

                                    <input type="hidden" name="pr_img3" value="{{($section1!=null)?$section1->img3:''}}">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="field" align="left">
                                    <h3>Select image</h3>
                                    <input type="file"  name="img3"   />
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>
                    <hr>

                </div>

            </div>
            </form>

        </div>

        <div class="card-body p-0">


            <form action="{{route('homepage.update',2)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card m-1">
                    <div class="card-header">
                        <h3>Section 2</h3>
                        <button type="submit" class="btn btn-info" style="float:right;">Update</button>

                    </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form">

                                <img style="width: 100px;" src="{{asset('/')}}{{($section2!=null)?$section2->img1:''}}" alt="">

                                <input type="hidden" name="pr_img1" value="{{($section2!=null)?$section2->img1:""}}">

                            </div>

                            <div class="form-group">
                                <div class="field" align="left">
                                    <h3>Select image 1</h3>
                                    <input type="file" name="img1"   />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">


                                <label for="first">Heading 1</label>
                                <textarea  class="form-control" name="h1">{{($section2!=null)?$section2->h1:''}}</textarea>

                            </div>
                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Description 1</label>

                                <textarea  class="form-control" name="d1">{{($section2!=null)?$section2->d1:''}}</textarea>
                            </div>
                        </div>


                </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form">

                                <img style="width: 100px;" src="{{asset('/')}}{{($section2!=null)?$section2->img2:''}}" alt="">

                                <input type="hidden" value="{{($section2!=null)?$section2->img2:''}}" name="pr_img2">

                            </div>

                            <div class="form-group">
                                <div class="field" align="left">
                                    <h3>Select image 2</h3>
                                    <input type="file" name="img2"  />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">


                                <label for="first">Heading 2</label>
                                <textarea  class="form-control"  name="h2">{{($section2!=null)?$section2->h2:''}}</textarea>

                            </div>
                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Description 2</label>

                                <textarea  class="form-control"  name="d2">{{($section2!=null)?$section2->d2:''}}</textarea>
                            </div>
                        </div>


                </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form">

                                <img style="width: 100px;" src="{{asset('/')}}{{($section2!=null)?$section2->img3:''}}" alt="">

                                <input type="hidden" name="pr_img3" value="{{($section2!=null)?$section2->img3:''}}">

                            </div>

                            <div class="form-group">
                                <div class="field" align="left">
                                    <h3>Select image 3</h3>
                                    <input type="file"  name="img3"  />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">


                                <label for="first">Heading 3</label>
                                <textarea  class="form-control" name="h3">{{($section2!=null)?$section2->h3:''}}</textarea>

                            </div>
                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Description 3</label>

                                <textarea  class="form-control"  name="d3">{{($section2!=null)?$section2->d3:''}}</textarea>
                            </div>
                        </div>


                </div>



                </div>

             </div>
            </form>

        </div>

        <div class="card-body p-0">


            <form action="{{route('homepage.update',3)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card m-1">
                    <div class="card-header">
                        <h3>Section 3</h3>
                        <button type="submit" class="btn btn-info" style="float:right;">Update</button>

                    </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form">

{{--                                <img style="width: 100px;" src="{{asset('/')}}{{($section3!=null)?$section3->img1:''}}" alt="">--}}

                                <input type="hidden" name="pr_img1" value="{{($section3!=null)?$section3->img1:''}}">
                                <video width="70%" class="mx-5 rounded" height="auto" autoplay  muted loop playsinline >
                                    <source src="{{asset('/')}}{{($section3!=null)?$section3->img1:''}}" type="video/mp4">

                                </video>
                            </div>

                            <div class="form-group">
                                <div class="field" align="left">
                                    <h3>Change Video</h3>
                                    <input type="file"  name="img1" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">


                                <label for="first">Heading</label>
                                <textarea  class="form-control"  name="h1" >{{($section3!=null)?$section3->h1:''}}</textarea>

                            </div>
                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Description</label>

                                <textarea  class="form-control"  name="d1" >{{($section3!=null)?$section3->d1:''}}</textarea>
                            </div>
                        </div>


                </div>


                </div>

             </div>
            </form>

        </div>

        <div class="card-body p-0">


            <form action="{{route('homepage.update',4)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card m-1">
                    <div class="card-header">
                        <h3>Customer Reviews</h3>
                        <button type="submit" class="btn btn-info" style="float:right;">Update</button>

                    </div>
                <div class="card-body tothis">
                    @foreach($reviews as $review)
                    <div class="row">
                        <div class="col-md-3">
                                <div class="field">
                                    <center>
                                    <img src="{{asset('/'.$review->img)}}" height="80"  width="80" alt="not"/>
                                    </center>
                                </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Name</label>
                                <input  class="form-control" value="{{$review->title}}" readonly />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Year</label>
                                <input  class="form-control" value="{{$review->year}}" readonly />
                            </div>
                        </div>
                        <!--  col-md-6   -->

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Customer Words</label>

                                <textarea  class="form-control" readonly>{{$review->descr}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <a href="{{url('homepage/review/'.$review->id)}}">
                            <i class="fa fa-trash"></i>
                              </a>
                            </div>
                        </div>

                    </div>
                        @endforeach

                    <input type="hidden" id="apend_c" value="1"  />


                </div>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2" style="float:right;">

                        <i class="fa fa-plus addrow"></i>

                    </div>
                </div>

             </div>
            </form>

        </div>




    </div>
    <!--end::Dashboard-->
@endsection
@section('js')

    <script>

        $('.addrow').click(function (e) {
            e.preventDefault();
            var i= parseInt($('#apend_c').val());


            var body ='<div class="row" id="remove_row_'+i+'">'
                +'<div class="col-md-3">'
                +'<div class="field" align="left">'
                +'<label>Image</label>'
                +'<input type="file" name="n_r_img[]" required/>'
                +'</div>'
                +'</div>'
                +'<div class="col-md-2">'
                +'<div class="form-group">'
                +'<label >Name</label>'
                +'<input  class="form-control" name="n_r_name[]" required />'
                +'</div>'
                +'</div>'
                +'<div class="col-md-2">'
                +'<div class="form-group">'
                +'<label >year</label>'
                +'<input  class="form-control" name="n_r_year[]" required />'
                +'</div>'
                +'</div>'
                +'<div class="col-md-2">'
                +'<div class="form-group">'
                +'<label>Customer Words</label>'
                +'<textarea  class="form-control"  name="n_r_words[]" required></textarea>'
                +'</div>'
                +'</div>'
                +'<div class="col-md-2">'
                +'<button onclick="remove_r('+i+')" >x</button>'
                +'</div>'
                +'</div>';

            $(".tothis").append(body);
            $('#apend_c').val(i+1);
        });
        function  remove_r(i) {
            var thes = "#remove_row_"+i+"";
            $(thes).remove();
        }

    </script>


    @endsection
