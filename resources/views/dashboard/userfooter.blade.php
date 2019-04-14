       
       
   

<!-- footer bottom -->
    <!-- copyright -->
    <!-- <div class="copy-w3pvt">
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-7 w3ls_footer_grid1_left text-lg-left text-center">
                    <p>&copy; 2019 Be Clinic. All rights reserved | Design by
                        <a href="http://w3layouts.com/">W3layouts</a>
                    </p>
                </div>
                <div class="col-lg-5 w3ls_footer_grid_left1_pos text-lg-right text-center mt-lg-0 mt-2">
                    <ul>
                        <li>
                            <a href="#" class="facebook">
                                <span class="fa fa-facebook-f mr-2"></span>Facebook</a>
                        </li>
                        <li class="mx-3">
                            <a href="#" class="twitter">
                                <span class="fa fa-twitter mr-2"></span>Twitter</a>
                        </li>
                        <li>
                            <a href="#" class="google">
                                <span class="fa fa-google-plus mr-2"></span>Google Plus</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->
    <!-- //copyright -->
    <!-- //footer bottom -->
    <!-- move top icon -->
    <a href="#home" class="move-top text-center"></a>
    <!-- //move top icon -->


<!-- Right Panel -->


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- for disqus -->
<script id="dsq-count-scr" src="//test-uojahljosi.disqus.com/count.js" async></script>
<!-- disqus -->
<script type="text/javascript">


var ques_arr = [];
var answer_arr=[];
var answer_keys=[];


    
$(document).ready(function(){

    $('.amountdiv').hide();
  $('#amountdiv').empty();



$(document).on( "change", ".premium", function() {
  

        var premium= $(this).val();

         src = "{{ route('getamount') }}";
         
         // alert(premium);
          $.ajax({
                     url: src,
                     dataType : 'json',
                     type : 'POST',
                     data : { premium:premium},
                     
                     success: function(res) 
                     {

                                            
                        if(res)
                        {
                          $('#amount').empty();
                          $('.amountdiv').fadeIn(2000);
                          $('#amount').val(res.amt);
                          $('#amt').val(res.amt);
                          // $('#item_name').val(res.primeum);
                          $('#item_number').val(res.id);
                        }
                        else
                        {
                          
                          
                          $('#amount').empty();
                          $('.amountdiv').hide();
                          
                        }
                      }
                 });

  });



    $(document).on('click', '#add', function(){ 

        // $('#myModal').modal('show');
        // var abc = ['A','B','C','D','E'];
        var labCnt = $('.add_div').length+1;
        // alert(labCnt);
        // <div class="col-xs-2"><b>'+abc[labCnt]+'</b></div><div class="col-xs-6"></div>
        if(labCnt < 4 )
        {
        $("#add_input").append(' <div class="add_div add_div_'+labCnt+'"> <div class="col-xs-2"> <input type="radio"  name="keys_radio" value="'+labCnt+'" /> </div> <div class="col-xs-8">  <input type="text" class="form-control" name="keys[]" placeholder="Option" required /> </div> <div class="col-xs-2"> <img src="'+cancel+'" class="cancel_div" /> </div> <div> &nbsp; </div> </div>'); 
        }
    });
    


    $(document).on('click', '#save', function(){ 

        $('.viewquestion').html('');
        var arr1 = [];
        var arr2 = [];
        

        var ques = $('#ques').val();
        var keys = $("input[name='keys[]']")
              .map(function(){return $(this).val();}).get();
        var answer = $('input[name=keys_radio]:checked').val(); 


             if(ques == '' )
            {
                // alert("Please Enter All Values");
                 document.getElementById('queserror').innerHTML="* Please Enter Question *";
                 document.getElementById('anserror').innerHTML="";
                 document.getElementById('optnerror').innerHTML="";
            }
            else if( $('input[name=keys_radio]:checked').length <= 0 )
            {
                document.getElementById('anserror').innerHTML="* Please Choose correct Answer *";
                 document.getElementById('queserror').innerHTML="";
                 document.getElementById('optnerror').innerHTML="";
            }
            else if(answer =='')
            {
                
                // document.getElementById('optnerror').innerHTML="* Please Enter All Options or Remove it please *";
                document.getElementById('anserror').innerHTML="* Please Choose correct Answer *";
                 document.getElementById('queserror').innerHTML="";
                 document.getElementById('optnerror').innerHTML="";
            }
            else
            {
                var data=[];
                // arr.length = 0; 
                arr1.push(ques);arr2.push(keys);
                
                answer_arr.push(answer);
                // $.each( arr, function( key_arr, arr_val ) {

                    data.push(arr1);
                    data.push(arr2);
                    // data.push(arr3);
                // });

                
                ques_arr.push(data); 
                
                $.each( ques_arr, function( key, ques_val ) {
                        var save_key = key;
                        key=key+1;
                        
                        $(".viewquestion").append('<font size="+2"  class="ans_radio" style="color:tomato;">'+ key+'.'+ques_val[0]+'  <br/>    </font>');   
                        $.each( ques_val[1], function( key_data, value ) {
                            $.each(value ,function(key_last,val_option){
                            // key_data=key_data+1;
                                $(".viewquestion").append(' <input type="radio" class="mark" name="opt_radio_'+save_key+'" value="'+key_last+'"><font size="+2">'+val_option+'  <br/>    </font>'); 
                            });
                        });
                });
                
                $(this).closest('form').find("input[type=text], textarea").val("");
                $('input[name="keys_radio"]').prop('checked', false);
                $("#add_input").html('');

                 
                 var success = "{{ route('userprofileview') }}";
                 var upcomingid = $('#upcomingid').val();
                $.ajax({
                            url:src,
                            method:'POST',
                            data:{
                                ques:ques,
                                keys:keys,
                                answer:answer,
                                upcomingid:upcomingid
                                
                            },
                           success:function(data){

                               // alert(data);
                               if(data == 1 )
                               {
                                    window.location.href = success;
                               }
                           }
                        });
                    
                }
                
                    

            }); 

            

            $(document).on('click', '.cancel_div', function(){ 
                
                    
                $(this).closest('.add_div').remove();
                    
            });

            

});

</script>


</body>

</html>