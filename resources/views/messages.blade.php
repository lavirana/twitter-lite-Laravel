
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href=  
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
    
    .darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
    </style>
@extends('layouts.app')
@section('content')
<div class="lg:flex lg:justify-center">
    <div class="lg:w-35" style="padding: 0px 13px 0px 10px;">
    @include ('_sidebar-links')
    </div>
    <div class="lg:mb-10" style="max-width: 700px; border-left: 1px solid gray;
  height: 500px;" >
        
        <h3 class="font-bold text-xl mb-4" style="font-weight: 800;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Messages</h3>
        
        <ul class="list" style="padding: 0px 0px;
    width: 371px;
    overflow: auto;
    height: 330px;">
            
            @foreach($users as $user)
           <a href="javascript:void(0);"  data_id="{{$user->id}}" class="get_id"> <li style="margin-bottom: 17px;
    border-bottom: 1px solid rgb(0, 0, 0);
    padding: 12px 9px 16px 8px;">
                            
   @if($user->avatar == "http://127.0.0.1:8000/storage" || empty($user->avatar))
    
    <img style="    width: 31px;
    float: right;" src=http://127.0.0.1:8000/images/twitter.png class="rounded-full mr-2">
     @else
               <img style="width: 31px;
    float: right;" src="http://127.0.0.1:8000/storage/{{ $user->avatar }}">
             
    @endif  
               {{ $user->username }}</li> </a>
             @endforeach
            </ul>
        </div>
    <div  style="border-left: 1px solid gray; border-right: 1px solid gray;
  height: 500px;padding: 11px;width: 50%;">
        <span class="status">
        <div style="overflow: scroll; height: 400px">
             <span id="spanid" class="spand" style="color:red;display: none"></span>
            <input type="hidden" value="<?php echo $sessionID ?>" name="userSessionID" id="usersessionID">
    <!--  <h3 class="font-bold text-xl mb-4" style="font-weight: 800;">Rana</h3>-->
<span class="messages"></span>

 </div>
          <form method="post" action="/tweets">
              <input type="hidden" name="_token" value="9PiOr64J41zVaPgauxZE4V8inetA9nVZKQKcOIOv">
              
              <textarea name="body" id="msage" placeholder="what's up doc?" required="required" class="w-full"></textarea> 
              <hr required="required" class="my-4">
              <footer class="flex justify-between items-center"><i aria-hidden="true" class="fa fa-picture-o" style="color: rgb(142, 208, 249);"></i>
                
              <a href="javascript:void(0)" id="submitMSG" class="hover:bg-blue-600 bg-blue-500 rounded-full shadow py-2 px-10 text-white text-sm h-10">Submit</a>
              </footer>
        </form>
       </span>
        
        
        <span class="status2">
            <div class="startmsg" style="    text-align: center;
    margin-top: 29%;">
            <strong>You don’t have a message selected</strong>   
<h4>Choose one from your existing messages, or start a new one.</h4>
            </div>
            </span>
        </div>
    
    
</div>
@endsection



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>
$(document).ready(function(){ 
          var msg = $("#msage").val(); 
       var fromID = $("#usersessionID").val();
           var toID = $(".spand").text();
           var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     $.ajax( {
                    url: 'get_message/'+toID+'/'+fromID,
                    type: "GET",
                    success: function ( data ) {   
                    $('.messages').prependTo(data);
               }
            });
});
</script>


<script>
    $(document).ready(function(){
       $("#submitMSG").click(function(){ 
       var msg = $("#msage").val(); 
       var fromID = $("#usersessionID").val();
           var toID = $(".spand").text();
           var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
         //  alert(fromID);
$.ajax({
   url: "/save_message",
    type: 'POST',
    data: { message: msg, fromID: fromID, toID: toID,_token: CSRF_TOKEN },    
    success:function(response){

        $('.messages').html(response);

           }
});

       }); 
    });
</script>
<script>
    $(document).ready(function(){
        $(".status").hide();
        $(".status2").show();
        $(".get_id").click(function(){
      var id = $(this).attr('data_id');
          
      $("#spanid").html(id);
            
       var fromd = $("#usersessionID").val();
              $(".status").show();
             $(".status2").hide();
               $.ajax( {
                    url: 'read_message/'+id+'/'+fromd,
                    type: "GET",
                    success: function ( data ) {
                    //    $.each(data,function(key,value){   
$('.messages').html(data);
                        //    });
               }
            });

        })
    })
    
    </script>