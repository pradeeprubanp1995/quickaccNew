@include('dashboard.userheader')
@extends('dashboard.userleftpanel')
@section('content') 
<style type="text/css">
        .button {
    display: block;
    width: 115px;
    height: 25px;
    background: #113355;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    text-decoration: none;
}
.sty
{
    background-color: #223344;
    color: white;
}
.err
{
    color: red;
    
}
table
{
    align-content: center;
    text-align: center;
}
.tableBodyScroll tbody {
  display: block;
  max-height: 300px;
  overflow-y: scroll;
}

.tableBodyScroll thead,
tbody tr {
  display: table;
  width: 100%;
  table-layout: fixed;
}


.forstyle tbody tr:nth-child(odd) {
    background-color: #998877;
     color: white;
      height: 40px; 
}

.forstyle tbody tr:nth-child(even) {
    background-color: white;
    height: 40px; 
}
table tr th
{
    background-color: #113355;
    color: white;
}
textarea
{
    min-height: 100px;
}
img
{
    width: 30px;

}
.display_questions
{

    width: 60%;
    align-content: center;
    text-align: left;
}
</style>






        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Update Question</h1>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="content">
@if (\Session::has('success'))
<div class="alert alert-success">
<p>{{ \Session::get('success') }}</p>
</div><br />
@endif

@if (\Session::has('danger'))
<div class="alert alert-danger">
<p>{{ \Session::get('danger') }}</p>
</div><br />
@endif


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 
        <!-- <?php //echo "<pre>"; print_r($post_data['title_name']); exit; ?> -->
        <div align="center" style="color:red;" id="queserror"></div>
        <div align="center" style="color:red;" id="optnerror"></div>
        <div align="center" style="color:red;" id="anserror"></div> <br/>
        
        <form action="{{ route('updatequestion') }}" method="post" id="updatequestionform">
            <table  align="center" width="80%" border="0" >
                <tr class="sty">
                        <th colspan="2" height="50px" style="text-align: center;"> <h1> {{ $post_data['title_name'] }}</h1> </th> 
                </tr>  

                <tr> <td> &nbsp;</td> </tr>
                <tr>    
                        <td width="90%"> 
                        <textarea name="ques" class="form-control" id="ques" placeholder="QUESTION" required/></textarea> 
                        <input type="hidden" name="src_cancel" id="src_cancel" value="{{asset('asset/images/cancel.png')}}" />
                       <!--  <input type="hidden" name="submit_url" id="submit_url" value="{{ route('updatequestion') }}" /> -->
                        <input type="hidden" name="title_name" id="title_name" value="{{ $post_data['title_name'] }}" />
                        <input type="hidden" name="upcomingid" id="upcomingid" value="{{ $post_data['id'] }}" /> 
                        </td>

                        <td width="10%"> <img src="{{asset('asset/images/plus.png')}}" id="add"  name="add"  /></td>                    
                </tr>
                <tr> <td> &nbsp; <br/> 
                           <div id="add_input">
                               
                               <div class=" add_div_0"> <div class="col-xs-2"> <input type="radio"  name="keys_radio" value="0" /> </div> <div class="col-xs-8">  <input type="text" class="form-control" name="keys[]" placeholder="Option" required /> </div> <div class="col-xs-2">  &nbsp; &nbsp; &nbsp; &nbsp;<!-- <img src="{{asset('asset/images/cancel.png')}}" class="cancel_div" /> --> </div> <div> &nbsp; </div> </div>

                           </div>   

                </td> </tr>


                <tr align="right">  <td> 
                <input type="submit" class="btn btn-success btn-block " name="submit" id="submit" value="Submit"  /> 

                 <!-- <button type="button" class="btn btn-success btn-block" name="insert-data" id="insert" onclick="return val();" >Insert Data</button> -->
                </td></tr>

                <tr> <td> &nbsp;</td> </tr>

                <tr class="sty">  
                        <th colspan="2" height="50px" style="text-align: center;"> <h1></h1> </th> 
                </tr>
            </table>
            </form>
@include('dashboard.userfooter')
@endsection
            

            
        