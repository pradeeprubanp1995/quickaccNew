@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 

<style type="text/css">
        section#why .row .col-lg-4 img {
    height: 200px;
    object-fit: contain;
}
section#why .row .col-lg-4 {    margin-bottom: 45px;
    font-size: 18px;
}
    .pricingdiv {width: 100% !important;}
.pricingdiv ul.theplan {width: 300px !important;padding-bottom: 15px;}
.services-box {
    /* background: transparent !important; */
    border-radius: 10px;
    padding-left: 3rem;
    padding-right: 3rem;
}
section#why .row .col-lg-4 img {
    height: 250px;
    object-fit: contain;
}
.row.import-sec{margin:0;}
@media only screen and (min-width: 320px) and (max-width: 767px){
.container {
    width: 100% !important;
}
.pricingdiv ul.theplan {
    width: 100% !important;border: 1px solid #ccc;
    border-radius: 15px !important;}
    .pricingdiv.row {
   margin: 0 15px;
}
    
    
}
</style>

<!-- main -->
<div id="home">
       

        <!-- second header -->
        <div class="main-top" >
            <div class="container" >
                <div class="header d-md-flex  py-3">
                    <!-- logo -->
                    <div id="logo">
                        <h4>
                            <a href="#">
                                <!-- <img src="{{asset('uploads/face1.jpg')}}" width="50px" height="40px" style="border-radius: 100px;" /> -->
                                <span class="logo-sp">Quick</span> Acc
                            </a>
                        </h4>
                    </div>
                    <!-- //logo -->
                    <!-- nav -->
                    <div class="nav_w3ls" style="padding-top:14px;">
                        <nav>
                            <label for="drop" class="toggle">Menu</label>
                            <input type="checkbox" id="drop" />
                            <ul class="menu">
                                <li><a href="#" class="active">Home</a></li>
                                <li class="mx-lg-4 mx-md-3 my-md-0 my-2"><a href="#about_pg">About Us</a></li>
                                <li><a href="#price_pg">Pricing</a></li>
                                
                                <li><a class="mx-lg-4 mx-md-3 my-md-0 my-2" href="#account_pg">Accounts</a></li>
                                <li><a href="{{ route('userlogin') }}">Generator</a></li>
                                <li> <a class=""></a></li>

                            
                            </ul>
                        </nav>
                    </div>

                         <div id="logo" style="padding-left: 40px;">
                        <h4>
                            <a href="{{ url('/register') }}"><p style="color: white;">Signup</p></a>
                            <a href="{{ url('/userlogin') }}"><p style="color: white;">&nbsp;|  Signin</p></a>
                        </h4>
                    </div>
                    <!-- //nav -->
                </div>
            </div>
        </div>
        <!-- //second header -->

       

        <!-- //second header -->

        <!-- banner -->
        <div class="banner_w3lspvt" >
            <div class="csslider infinity" id="slider1">
                <input type="radio" name="slides" checked="checked" id="slides_1" />
                <input type="radio" name="slides" id="slides_2" />
                <input type="radio" name="slides" id="slides_3" />
                <ul class="banner_slide_bg">
                    <li class="banner-top1">
                        <div class="container">
                            <div class="banner-info_agile_w3ls text-center mx-auto">
                                <h3 class="text-wh font-weight-bold">Quickacc</h3>
                                <h6 class="text-wh font-weight-light">Everything you need will be found here</h6>
                                <a href="#" class="btn button-w3ls mt-5">Read More</a>
                            </div>
                        </div>
                    </li>
                    <li class="banner-top2">
                        <div class="container">
                            <div class="banner-info_agile_w3ls text-center mx-auto">
                                <h3 class="text-wh font-weight-bold">Quickacc</h3>
                                <h6 class="text-wh font-weight-light">Everything you need will be found here</h6>
                                <a href="#" class="btn button-w3ls mt-5">Read More</a>
                            </div>
                        </div>
                    </li>
                    <li class="banner-top3">
                        <div class="container">
                            <div class="banner-info_agile_w3ls text-center mx-auto">
                                <h3 class="text-wh font-weight-bold">Quickacc</h3>
                                <h6 class="text-wh font-weight-light">Everything you need will be found here</h6>
                                <a href="#" class="btn button-w3ls mt-5">Read More</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="navigation">
                    <div>
                        <label for="slides_1"></label>
                        <label for="slides_2"></label>
                        <label for="slides_3"></label>
                    </div>
                </div>
            </div>
        </div>
        <!-- //banner -->
    </div>
<!-- //main -->



<!-- services -->
<section class="services" id="about_pg">
    <div class="container py-xl-5 ">
                <div class="title-section mb-md-5 mb-4">
            
            <h3 class="w3ls-title text-uppercase text-bl font-weight-bold">ABOUT OF SERVICE</h3>
            <h6 class="w3ls-title-sub">What do we got to offer?Everything!</h6>
        </div>
        <div class="row" style="padding-bottom: 20px;">

            <div class="col-lg-6" style="padding-bottom: 20px;">

                
                    <!-- <span class="fa fa-ambulance" aria-hidden="true"></span> -->
                    <!-- .Icon ends here -->
                    <div class="service-content  py-5 services-box">
                        <h3>ALL ACCOUNTS IN ONE PLACE</h3>
                        <p class="my-3">
                            30+ service box Netflix ,Spotify ,Uplay ,GOG ,NardVPN ,Minecraft.. ready for you to use.
                        </p>
                        <img src="{{asset('asset/user_dashboard/images/origin.png')}}" width="96px" style="overflow:hidden;height: 75px;" />
                        <img src="{{asset('asset/user_dashboard/images/spotify.png')}}" width="96px" style="overflow:hidden;height: 75px;" />
                        <img src="{{asset('asset/user_dashboard/images/uplay.png')}}" width="96px" style="overflow:hidden;height: 75px;" />
                        <img src="{{asset('asset/user_dashboard/images/netflix.png')}}" width="96px" style="overflow:hidden;height: 75px;" />
                    </div>

                    <!-- .Service-content ends here -->
                
            </div>
            <div class="col-lg-6" style="padding-bottom: 20px;background-image: url({{asset('asset/user_dashboard/images/recycle.png')}});    background-size: 211px 199px;background-position: right;background-repeat: no-repeat;">
                
                    <!-- <span class="fa fa-user-md" aria-hidden="true"></span> -->
                    <!-- .Icon ends here -->
                    <div class="service-content py-5 services-box" style="height: 250px !important;">
                        <h3>ACCOUNTS UPLAY DAILY</h3>
                        <p class="my-3">
                            Our Accounts database is ready to use. Freash account will be update everyday.
                        </p>

                    </div>
                    <!-- .Service-content ends here -->
                
            </div>
            <div class="row import-sec">
            <div class="col-lg-6 "  style="padding-bottom: 20px;background-image: url({{asset('asset/user_dashboard/images/chat.png')}});    background-size: 120px 120px;background-position: center;background-repeat: no-repeat;">
            
                    <!-- <span class="fa fa-hospital-o" aria-hidden="true"></span> -->
                    <!-- .Icon ends here -->
                    <div class="service-content py-5 services-box" style="height: 250px!important;">
                        <h3>24/7 SUPPORT</h3>
                        <p class="my-3">
                            Our Accounts database is ready to use. Freash account will be update everyday.
                        </p>
                    </div>
                    <!-- .Service-content ends here -->
                
            </div>
            <div class="col-lg-6">
               
                    <!-- <span class="fa fa-medkit" aria-hidden="true"></span> -->
                    <!-- .Icon ends here -->
                    <div class="service-content py-5 services-box" style="height: 250px!important;">
                        <h3>ON-THE-GO</h3>
                        <p class="my-3">
                            you can access our service any where via mobile phone.
                        </p>
                    </div>
                    <!-- .Service-content ends here -->
                
            </div>
        </div></div>
    </div>
</section>
<!-- //services -->

<!-- why -->
<section class="blog_w3ls py-5" id="why">
    <div class="container py-xl-5 ">
        <div class="title-section mb-md-5 mb-4" id="price_pg">
            
            <h3 class="w3ls-title text-uppercase text-bl font-weight-bold">PRICING</h3>
            <h6 class="w3ls-title-sub">Cheap and affortable for all user</h6>
        </div>
        <div class="row">
            <!-- blog grid -->
     <div class="pricingdiv row" >
        <ul class="theplan">
            <li class="title"><b>$10</b><br />One month </li>
            <li class="head" style="background-color: #dc3a3a;">VIP</li>
            <li > <b>15 Daily Accounts</b> </li>
            <li > <b> Daily Updates</b> </li>
            <li > <b> 24*7 Support</b> </li>
            <li > <b> No private generator:access</b> </li>
            <li > <b> No daily private accounts</b> </li>
            <li><a class="pricebutton" href="{{ url('/register/4') }}"  rel="nofollow"><span class="icon-tag"></span> Check Out</a></li>
        </ul>
    <ul class="theplan">
            <li class="title"><b>$15</b><br />One Year </li>
            <li class="head" style="background-color: #1f76d4;">PREMIUM</li>
            <li > <b>60 Daily Accounts</b> </li>
            <li > <b> Daily Updates</b> </li>
            <li > <b> 24*7 Support</b> </li>
            <li > <b> No private generator:access</b> </li>
            <li > <b> 1 daily private accounts</b> </li>
            
            <li><a class="pricebutton2" href="{{ url('/register/3') }}" rel="nofollow"><span class="icon-tag"></span> Check Out</a></li>
        </ul>
     <ul class="theplan">
            <li class="title"><b>$30</b><br />One month </li>
            <li class="head" style="background-color: #841d9a;">LEGENDRY</li>
            <li > <b>70 Daily Accounts</b> </li>
            <li > <b> Daily Updates</b> </li>
            <li > <b> 24*7 Support</b> </li>
            <li > <b>  private generator:access</b> </li>
            <li > <b> 4 daily private accounts</b> </li>
            <li><a class="pricebutton3" href="{{ url('/register/5') }}" rel="nofollow"><span class="icon-tag"></span> Check Out</a></li>
        </ul>
</div>


            <!-- //blog grid -->
        </div>
    </div>
</section>
<!-- //why -->

<!-- for accounts -->
<section class="blog_w3ls " id="why">
    <div class="container py-xl-5 ">
        <div class="title-section mb-md-5 mb-4" id="account_pg">
            
            <h3 class="w3ls-title text-uppercase text-bl font-weight-bold">ACCOUNTS</h3>
            <h6 class="w3ls-title-sub">We offer accounts in many different categories</h6>
        </div>
        <div class="row" align="center">
            
                <div class="col-lg-4" align="center">
                    <img src="{{asset('asset/user_dashboard/images/netflix.png')}}" alt="logo" width="50%"  />
                    <br/><b>Netflix</b>
                </div>
                <div class="col-lg-4">
                    <img src="{{asset('asset/user_dashboard/images/spotify.png')}}" alt="logo" width="50%"  />
                    <br/><b>Spotify</b>
                </div>
                <div class="col-lg-4">
                    <img src="{{asset('asset/user_dashboard/images/minecraft.jpg')}}" alt="logo" width="50%"  />
                    <br/><b>Minecraft</b>
                </div>
            </div>
            <div class="row" align="center">
                <div class="col-lg-4" align="center">
                    <img src="{{asset('asset/user_dashboard/images/nordvpn-logo.png')}}" alt="logo" width="50%"  />
                    <br/><b>NardVPN</b>
                </div>
                <div class="col-lg-4">
                    <img src="{{asset('asset/user_dashboard/images/uplay.png')}}" alt="logo" width="50%"  />
                    <br/><b>Uplay</b>
                </div>
                <div class="col-lg-4">
                    <img src="{{asset('asset/user_dashboard/images/origin.png')}}" alt="logo" width="50%"  />
                    <br/><b>Origin</b>
                </div>
            </div>


            </div>
        </div>
    </section>

                    
@include('dashboard.userfooter')
@endsection
            

            
        