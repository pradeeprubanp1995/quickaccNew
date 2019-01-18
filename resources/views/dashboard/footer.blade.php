</div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('asset/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('asset/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('asset/js/off-canvas.js')}}"></script>
  <script src="{{asset('asset/js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('asset/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->


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

  $('.subcategorydiv').hide();
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
          $('#subcategory').empty();
          $('.subcategorydiv').hide();
        }
  

$(document).on( "change", ".category", function() {
  

        var cat= $(this).val();

         src = "{{ route('admin.getsubcategory') }}";
         
         // alert(cat);
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
                     

                          $("#subcategory").get(0).options[$("#subcategory").get(0).options.length] = new Option("----    Select Subcategory    ----", "");
                            
                            $.each($.parseJSON(id), function(idx, obj) {
                              // console.log(obj.cat_name);
                                $("#subcategory").get(0).options[$("#subcategory").get(0).options.length] = new Option(obj.cat_name, obj.id);
                               
                            });
                        }
                        else
                        {
                          
                          
                          $('#subcategory').empty();
                          $('.subcategorydiv').hide();
                          
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















</body>

</html>