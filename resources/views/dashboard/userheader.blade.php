<!DOCTYPE html>
<html lang="zxx">

<head>
  <title>Quickacc</title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8" />
   <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <!--// Meta tag Keywords -->
  
  <!-- Custom-Files -->
  <link rel="stylesheet" href="{{asset('asset/user_dashboard/css/bootstrap.css') }}">
  <!-- Bootstrap-Core-CSS -->
  <link href="{{asset('asset/user_dashboard/css/css_slider.css') }}" type="text/css" rel="stylesheet" media="all">
  <!-- banner slider -->
  <link rel="stylesheet" href="{{ asset('asset/user_dashboard/css/style.css') }}" type="text/css" media="all" />
  <!-- Style-CSS -->
  <link href="{{asset('asset/user_dashboard/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- Font-Awesome-Icons-CSS -->
  <!-- //Custom-Files -->

  <!-- Web-Fonts -->
  <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800&amp;subset=devanagari,latin-ext" rel="stylesheet">
  <!-- //Web-Fonts -->

   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  
   <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }

    
        // Fixed scroll 
    
    
$(window).scroll(function(){
    if ($(window).scrollTop() >= 300) {
        $('.main-top').addClass('fixed-header');
        $
    }
    else {
        $('.main-top').removeClass('fixed-header');
      
    }
});
$(document).ready(function(){
  $("#menu-bar").click(function(){
    $('.main-wrapper').toggleClass('myactive');
  });
});


</script>
   <style type="text/css">
    .container
    {
      width: 65% !important;
    }
    <!--Custom -->
.main-top.fixed-header {
    position: fixed;
    top: 0;
}
.main-top {
    position: absolute;
    z-index: 999;
    width: 100%;
    background: rgba(0, 0, 0, 0.80);
    height: 60px;
}
.main-top.fixed-header {
    position: fixed;
    top: 0;
}
div#logo {
    display: none;
}
.main-wrapper.myactive .left-menu {
    left: -100% !important;
    transition: all 0.2s;
}

.main-wrapper.myactive section#why {
    margin-left: 0;
    transition: all 0.2s;
}
.left-menu
    width: 250px;
    background: #000000ba;
    height: 100vh;
    z-index: 999999;
    position: fixed;
    left: 0;
    transition: all 0.2s;
    left: 0;
}

.main-wr
    margin-left: 250px;
    transition: all 0.2s;
.main-wr
    margin-left: 250px;
    transition: all 0.2;
.main-wr
    margin-left: 250px;
    transition: all 0.;
.main-wr
    margin-left: 250px;
    transition: all 0;
.main-wr
    margin-left: 250px;
    transition: all;
.main-wr
    margin-left: 250px;
    transition: initial;
.main-wr
    margin-left: 250px;
    transition: auto;
.main-wr
    margin-left: 250px;
    transition:;

.main-wrapper {
    width: 100%;
    float: left;
    position: relative;
}

.main-wrapper section#why {
    margin-left: 250px;
}

.leftmenu-profile {
    width: 100%;
    float: left;
    text-align: center;
    padding-top: 120px;
}

.leftmenu-profile img {
    width: 150px;
    display: inline-block;
    border-radius: 100%;
    object-fit: cover;
}

.leftmenu-profile span {
    width: 100%;
    float: left;
    color: #fff;
    font-size: 30px;
    padding: 10px 0;
}

.left-menu ul li {
    width: 100%;
    float: left;
}
.left-menu {
    width: 250px;
    background: #000000ba;
    height: 100vh;
    z-index: 999999;
    position: fixed;
    left: 0;
    transition: all 0.2s;
    top: 59px;
}
.left-menu ul li a {
    color: #fff;
    font-size: 18px;
    text-align: left;
    width: 100%;
    float: left;
    padding: 10px 20px;
    cursor: pointer;
}
div#menu-bar {
    display: inline-block;
    color: #fff;
    padding-right: 20px;
}

.nav_w3ls {
    display: flex;
}

div#menu-bar i {
    font-size: 25px;
    cursor: pointer;
}
.left-menu ul li a:hover {
    background: #ccc;
}
@media only screen and (min-width: 768px) and (max-width: 991px){
.container {
    width: 94% !important;
}
}
@media only screen and (min-width: 768px) and (max-width: 1000px){

.title-section.mb-md-5.mb-4 {
    margin-top: 80px;
}

}

@media only screen and (min-width: 320px) and (max-width: 767px){
.left-menu {
    left: -100%;
}
.main-wrapper section#why {
    margin-left: 0 !important;
}
.main-wrapper.myactive .left-menu {
    left: 0% !important;
    transition: all 0.2s;
}
.main-wrapper.myactive section#why {
    margin-left: 250px !important; 
}
.container {
    width: 90% !important;
}
.title-section.mb-md-5.mb-4 {
    margin-top: 75px;
}
}
    
  </style>
</head>

<body>
    @yield('content')