       

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; 2018 Ela Admin
            </div>
            <div class="col-sm-6 text-right">
                Designed by <a href="https://colorlib.com">Colorlib</a>
            </div>
        </div>
    </div>
</footer>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('asset/user/original/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('asset/user/original/assets/js/popper.min.js')}}"></script>
<script src="{{asset('asset/user/original/assets/js/plugins.js')}}"></script>
<script src="{{asset('asset/user/original/assets/js/main.js')}}"></script>


<script type="text/javascript">


var ques_arr = [];
var answer_arr=[];
var answer_keys=[];


    
$(document).ready(function(){

    var cancel = $('#src_cancel').val();
    var submit_url = $('#submit_url').val();
    // alert(submit_url);
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

                 var src = "{{ route('updatequestion') }}";
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
