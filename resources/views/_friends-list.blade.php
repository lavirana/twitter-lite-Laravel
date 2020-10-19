 

<link rel="stylesheet" href=  
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<form action="javascript:void(0);" id="contactform" method="post">
<div class="input-wrapper">
<input type="text" name="search" class="bg-gray-200 border border-gray-300 py-5 px-2 rounded-lg" style="height: 13px;
    margin-bottom: 19px;
    margin-left: 1px; border; width: 130%;" placeholder="Search Twitter" id="searchText"> 
    <span class="texts"></span>
        </div>
</form>

<div class="bg-gray-200 rounded-lg border border-gray-300 py-3 px-2" style="width: 130%;margin-top: 13px;"> 
<h3 class="font-bold text-xl mb-4" style="font-weight: 800;">Following</h3>
      <hr>
    <br>
<ul>
    
    @forelse(auth()->user()->follows as $user)
<li class="{{ $loop->last ? '': 'mb-4' }}">
    <div>
       <a href="{{ route('profile', $user) }}" class="flex item-center text-sm"> <img src="{{$user->avatar}}" width="40" class="rounded-full mr-2">
    {{$user->name}}
           </a>
        </div>
    </li>
    @empty
    
    <li>No Friends yet!</li>
    @endforelse
</ul>
    </div>


<div class="bg-gray-200 rounded-lg border border-gray-300 py-3 px-2" style="width: 130%;margin-top: 13px;"> 
<h3 class="font-bold text-xl mb-4" style="font-weight: 800;">What’s happening</h3>
    <hr>

    
    <div class="">
<span class="flex justify-between items-center" style="padding-top: 12px;margin-bootom:5px"><strong>SunRisers Hyderabad beat Chennai Super Kings by 7 runs</strong> <img style="width:50px;" src="https://pbs.twimg.com/semantic_core_img/1310500592469516288/AmHzEYWl?format=jpg&name=240x240" class="rounded-full"></span>
    </div>
    <hr>
       <div class="">
<span class="flex justify-between items-center" style="padding-top: 12px;"><strong>SunRisers Hyderabad beat Chennai Super Kings by 7 runs</strong> <img style="width:50px;" src="https://pbs.twimg.com/semantic_core_img/1310500592469516288/AmHzEYWl?format=jpg&name=240x240" class="rounded-full"></span>
    </div>
    <hr>
    
    </div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){ 
       
 $("#contactform").on('keyup',function(){
//$("#contactform").on('change',function(){
      $(".texts").val("");
    event.preventDefault();
     var query = $("#searchText").val();
     
     $.ajax({
            url: "search",
            type:"GET",
            //data: query,
         data:{'name':query},
            success:function (data) {
                if(data){
                  $('.texts').html(data);
                }
                        }
     });
 });
        });
</script>







