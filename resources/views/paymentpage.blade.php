@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 

<?php //session_start(); $holduserid = $_SESSION['userid']; ?>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #fff;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}


</style>
<div id="home">
        <!-- top header -->
        
        <!-- //top header -->

  <!-- second header -->
        <div class="main-top">
            <div class="container" >
                <div class="header d-md-flex  py-3">
                    <!-- logo -->
                    <div id="logo">
                        <h4>
                            <a href="{{ route('userprofile') }}">
                                <!-- <img src="{{asset('uploads/face1.jpg')}}" width="50px" height="40px" style="border-radius: 100px;" /> -->
                                <span class="logo-sp">Quick</span> Acc
                            </a>
                        </h4>
                    </div>
                    <!-- //logo -->
                    <!-- nav -->
                    <div class="nav_w3ls" style="padding-top:8px;">
                      
                        <nav>
                            <label for="drop" class="toggle">Menu</label>
                            <input type="checkbox" id="drop" />
                            <ul class="menu">
                                <li><a href="#" class="active">Home</a></li>
                                <li class="mx-lg-4 mx-md-3 my-md-0 my-2"><a href="#">About Us</a></li>
                                <li><a href="#">Pricing</a></li>
                                
                                <li><a class="mx-lg-4 mx-md-3 my-md-0 my-2" href="#">Accounts</a></li>
                                <li><a href="#">Generator</a></li>
                                <li> <a class=""></a></li>

                             
                            </ul>
                        </nav>
                    </div>
                    <!-- //nav -->
                </div>
            </div>
        </div>
        <!-- //second header -->

       
    </div>

<?php 

        $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
        $paypalID = 'siva-f@gmail.com'; //Business Email
        

        ?>


<!-- for accounts -->
<section class="blog_w3ls py-xl-5" id="why" >
    <div class="container py-xl-5 py-3 ">
        <div class="title-section mb-md-5 mb-4" style="padding-top: 40px;">
            
            <h3 class="w3ls-title text-uppercase text-bl font-weight-bold">Premium</h3>
            
        </div>
 
        <div class="row">
             <div class="container">
                <span style="font-weight: 4px;font-size: 20px"> Dear <b style="color:blue"> {{ $user['uname'] }} </b>, Please Confirm your Premium. <br/></span>



                        <label for="Premium">Premium</label>
                        <input type="text" name="premiumname" value="{{ $premium->primeum }}" readonly />
    
   <!--  <select id="premium" name="premium" class="premium" required>
        <option value="0" >--- Select Premium ---</option>
        @foreach($premium as $data)

        <option value="{{$data['id']}}" >{{$data['primeum']}}</option>
        @endforeach 
    </select> -->
    
    

        
            <label for="Premium">Amount</label>
             <form action="<?php echo $paypalURL; ?>" method="post">

                <?php echo csrf_field(); ?>
                    <!-- Identify your business so that you can collect the payments. -->
                    <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
                    
                    <!-- Specify a Buy Now button. -->
                    <input type="hidden" name="cmd" value="_xclick">
                    
                    
                    <!-- Specify details about the item that buyers will purchase. -->


                    <input type="text" name="amount" id="amount"  value="<?php echo $premium->amt; ?>" readonly />
                    <input type="hidden" id="item_name" name="item_name" value="<?php echo $user['id']; ?>" >
                    <input type="hidden"  id="item_number" name="item_number"  value="<?php echo $premium->id; ?>" >
                    
                    
                    <input type="hidden" name="currency_code" id="currency_code" value="USD">
                    
                    
                    <!-- Specify URLs -->
                    <input type='hidden' name='cancel_return' value="{{ route('paypalerror') }}" />
                    <input type='hidden' name='return' value="{{ url('/paypalsuccess') }}" />
                    <input type="hidden" name="rm" value="2" /> 



                    <!-- Display the payment button. -->
                    <input type="image" name="submit" border="0" id="paysubmit" name="payment" 
                    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
                    <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                </form>
    </div>  

 
</div>


            </div>
        </div>
    </section>
                    
@include('dashboard.userfooter')
@endsection
 