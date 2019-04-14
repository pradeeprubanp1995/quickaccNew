<div class="sidenav">
  <br/><br/>
  
  @if(Auth::user()->images == '') <i class="fa fa-user" style="font-size: 20px;"></i>@else
      <img src="{{asset('uploads/'.Auth::user()->images)}}" width="150px" height="140px" style="border-radius: 100px;" />
   @endif

  <a href="#" style="font-size: 20px;"><?php echo Auth::user()->name ?></a>
  <a href="{{ route('userprofile')}}" class="btn btn-primary" style="width: 158px;height :40px;color:white;font-size: 20px;">Edit Profile</a>
  <a href="#" style="font-weight: 80px;color:#f4bd75;padding-left: 30px;font-size: 35px; "><?php echo $pre['primeum']; ?></a>

<br/>
</div>