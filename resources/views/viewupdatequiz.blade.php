@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 







        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0" >
                    <div class="col-sm-8 headingdiv" >
                        <div class=" float-center">
                            <div class="page-title"  >
                                <h1>{{ $result['title_name']}}</h1>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="content"> 
                            
                      <!-- echo "<pre>"; print_r(json_decode($post_data->options, true)); exit(); -->
                      <div class="form-group">
                     1. <label>{{$post_data->question}}</label>
                      <br/><br/>
                      @php
                       
                       $q = 1; $no = ['a)','b)','c)','d)','e)','f)'];

                      $array = $post_data['options'];
                      $options = json_decode($array, true);
                      $count = count($options);

                      @endphp
                      <div class="row col-sm-12">
                      @for ($i=0;$i<$count;$i++)
                      <br />
                      <div class="col-sm-3"> {{$no[$i]}}   {{$options[$i]['options']}} </div>
                      @endfor
                     </div>

                     
                     <div class="row col-sm-12"> <label><br/> Answer :  </label> <label style="color: blue;"> <br/>&nbsp;&nbsp;{{ $options[ $post_data->answer]['options'] }}</label> </div>


                     </div>
      </div>
                
<style type="text/css">
  .headingdiv
  {
    align-content: center;
    text-align: center;
    background-color: #007bff;
    color: white;
  }
</style>
@include('dashboard.userfooter')
@endsection
