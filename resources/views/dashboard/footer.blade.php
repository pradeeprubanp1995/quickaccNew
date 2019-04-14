</div>
                <!-- PAGE CONTENT WRAPPER -->                                
            </div>    
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->       
        
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

                           
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->

        <script type="text/javascript" src="{{asset('asset/admin/js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('asset/admin/js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('asset/admin/js/plugins/bootstrap/bootstrap.min.js')}}"></script>        
        <!-- END PLUGINS -->                

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{asset('asset/admin/js/settings.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('asset/admin/js/plugins.js')}}"></script>        
        <script type="text/javascript" src="{{asset('asset/admin/js/actions.js')}}"></script>        
        <!-- END TEMPLATE -->


        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src="{{asset('asset/admin/js/plugins/icheck/icheck.min.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('asset/admin/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>    
        <script type="text/javascript" src="{{asset('asset/admin/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>

        <!-- END PAGE PLUGINS -->

    <!-- END SCRIPTS --> 
        
    </body>
</html>









<!-- pradeep -->


<!-- for autocomplete -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/easy-autocomplete/1.3.5/jquery.easy-autocomplete.js"></script>


  
<script type="text/javascript">
$(document).ready(function() {
  $('button[name="remove_levels"]').on('click', function(e) 
  {

    var $form = $(this).closest('form');
    e.preventDefault();

    $('#deleteModal').one('click', '#delete', function(e) 
    {
      $form.trigger('submit');
    });
  });
});
</script>




<!-- edit title -->

<script type="text/javascript">
  

$(document).ready(function() {

  $('.amountdiv').hide();
  $('#amountdiv').empty();
  $('#subcategory').val("0");
  var cat= $('.category').val();

  var holdsubcat = $('#holdsubcat').val();
  src = "{{ route('admin.getsubcategory') }}";
      if(cat > 0)
      {
          $.ajax({
                     url: src,
                     dataType : 'json',
                     type : 'POST',
                     data : { category:cat},
                     
                     success: function(res) 
                     {
                      
                        if(res.length > 0)
                        {
                          $('#subcategory').empty();
                          $('.subcategorydiv').fadeIn(2000);
                          var id = JSON.stringify(res);
                        // console.log(id);
      
                        
                     
// console.log(holdsubcat);
                          $("#subcategory").get(0).options[$("#subcategory").get(0).options.length] = new Option("----    Select Subcategory    ----", "");
                            
                            $.each($.parseJSON(id), function(idx, obj) {
                              console.log(obj.id);
                                $("#subcategory").get(0).options[$("#subcategory").get(0).options.length] = new Option(obj.cat_name, obj.id);
                               
                               if( obj.id == holdsubcat )
                               {

                                   $("#subcategory option[value='" + obj.id + "']").attr("selected","selected");
                               }
                            });
                            

                           
                        }
                        else
                        {
                      
                          $('#subcategory').val("0");
                          
                          $('#subcategory').empty();
                          $('.subcategorydiv').hide();
                        }
                      }
                 });
        }
        else
        {
          $('#amount').empty();
          $('.amountdiv').hide();
        }
  

$(document).on( "change", ".premium", function() {
  

        var premium= $(this).val();

         src = "{{ route('getamount') }}";
         
         alert(premium);
          $.ajax({
                     url: src,
                     dataType : 'json',
                     type : 'POST',
                     data : { premium:premium},
                     
                     success: function(res) 
                     {
                      console.log(res);
                        if(res.length > 0)
                        {
                          $('#amount').empty();
                          $('.amountdiv').fadeIn(2000);
                          $('#amount').val(res.amount);
                        }
                        else
                        {
                          
                          
                          $('#amount').empty();
                          $('.amountdiv').hide();
                          
                        }
                      }
                 });

  });

});




// for auto complete


$(document).ready(function() {
  $('.titlediv').hide();

$(document).on( "change", ".dept", function() {
      
    src = "{{ route('admin.titleauto') }}";
    cat = $('#category').val();
    subcat = $('#subcategory').val();
    dept = $('#dept').val();
// alert(cat);
     

     $.ajax({
                     url: src,
                     dataType : 'json',
                     type : 'POST',
                     data : { cat:cat,subcat:subcat,dept:dept },
                     
                     success: function(res) 
                     {
                      console.log(res);
                        if(res.length > 0)
                        {
                          $('#titleauto').empty();
                          $('.titlediv').fadeIn(2000);
                          var id = JSON.stringify(res);
                        // console.log(id);
                     

                          $("#titleauto").get(0).options[$("#titleauto").get(0).options.length] = new Option("----    Select Title    ----", "");
                            
                            $.each($.parseJSON(id), function(idx, obj) {
                              // console.log(obj.cat_name);
                                $("#titleauto").get(0).options[$("#titleauto").get(0).options.length] = new Option(obj.title_name, obj.id);
                               
                            });
                        }
                        else
                        {
                          $('#titleauto').empty();
                          $('.titlediv').hide();
                        }
                      }
                 });
    });


});


</script>














<style type="text/css">
  .fornavigation {
      min-height: 750px !important;
    }
    </style>
</body>

</html>