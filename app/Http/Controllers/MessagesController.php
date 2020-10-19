<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Auth;
class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(){
        $allusers = DB::table('users')->get();
            $sessionREC = Auth::user();
            $sessionUSER = json_decode($sessionREC);
            $sessionUSERID = $sessionUSER->id;
       return view('messages',['users'=>$allusers,'sessionID'=>$sessionUSERID]);
        
    }
    

    
    public function fetchMessage(Request $request){
       $user_id =  $request->user_id;
     $from_id =  $request->from_id;
    // $all_msg = DB::table('message')->where('to_id',$user_id)->get();

       $usermsg = DB::table('message')
            ->join('users','users.id','=','message.to_id')
            ->select('users.id as userid', 'users.username', 'users.avatar','message.*')
            ->where('message.to_id',$user_id)
            ->Where('message.from_id',$from_id)
            ->orwhere('message.to_id',$from_id)
            ->Where('message.from_id',$user_id)
            ->get();
        //  echo $usermsg;
$sessionREC = Auth::user();
    $sessionUSER = json_decode($sessionREC);
        $sessionUSERID = $sessionUSER->id;
        
     $ans =  json_decode($usermsg,true);
        if(!empty($ans)){
    foreach($ans as $res){
        if($sessionUSERID == $res['userid']){
            $idVAR = '<input type="hidden" class="sessionID" value="'.$res['userid'].'">';
        }else{
            $idVAR = '<input type="hidden" class="simpleID" value="'.$res['userid'].'">';
        }
     $res  =  ''.$idVAR.'<h3 class="font-bold text-xl mb-4" style="font-weight: 800;">'.$res['username'].'</h3><div class="container" style="padding: 3px;"><img src="http://127.0.0.1:8000/storage/'.$res['avatar'].'" style="width: 10%;"> <p>'.$res['message'].'</p> <span class="time-right">'.date("h:i",strtotime($res['created'])).'</span></div>';  

        $result[] = $res;   
        
    }
    return $result;
        }
    }
    
    
    public function saveMessage(Request $request){
       $input = $request->all();
       $message = $input['message'];
        $fromD = $input['fromID'];
        $toID = $input['toID'];
       $insert = db::table('message')->insert([
        ['message'=>$message,'from_id'=>$fromD,'to_id'=>$toID],
        ]);
        if($insert){
            
          $usermsg = DB::table('message')
            ->join('users','users.id','=','message.to_id')
            ->select('users.id as userid', 'users.username', 'users.avatar','message.*')
            ->where('message.to_id',$toID)
            ->Where('message.from_id',$fromD)
            ->orwhere('message.to_id',$fromD)
            ->Where('message.from_id',$toID)
            ->get();
        //  echo $usermsg;
$sessionREC = Auth::user();
    $sessionUSER = json_decode($sessionREC);
        $sessionUSERID = $sessionUSER->id;
        
     $ans =  json_decode($usermsg,true);
        if(!empty($ans)){
    foreach($ans as $res){
        if($sessionUSERID == $res['userid']){
            $idVAR = '<input type="hidden" class="sessionID" value="'.$res['userid'].'">';
        }else{
            $idVAR = '<input type="hidden" class="simpleID" value="'.$res['userid'].'">';
        }
     $res  =  ''.$idVAR.'<h3 class="font-bold text-xl mb-4" style="font-weight: 800;">'.$res['username'].'</h3><div class="container" style="padding: 3px;"><img src="http://127.0.0.1:8000/storage/'.$res['avatar'].'" style="width: 10%;"> <p>'.$res['message'].'</p> <span class="time-right">'.date("h:i",strtotime($res['created'])).'</span></div>';  

        $result[] = $res;   
        
    }
        }
    return $result;  
            
            
        }
        
        
       // return 'data saved successfully';
    }
    
    public function getMessage(Request $request){
        
     $allusers = DB::table('users')->get();
     $user_id =  $request->user_id;
     $from_id =  $request->from_id;
    // $all_msg = DB::table('message')->where('to_id',$user_id)->get();

       $usermsg = DB::table('message')
            ->join('users','users.id','=','message.to_id')
            ->select('users.id as userid', 'users.username', 'users.avatar','message.*')
            ->where('message.to_id',$user_id)
            ->Where('message.from_id',$from_id)
            ->orwhere('message.to_id',$from_id)
            ->Where('message.from_id',$user_id)
            ->get();
        //  echo $usermsg;
$sessionREC = Auth::user();
    $sessionUSER = json_decode($sessionREC);
        $sessionUSERID = $sessionUSER->id;
        
     $ans =  json_decode($usermsg,true);
        if(!empty($ans)){
    foreach($ans as $res){
        if($sessionUSERID == $res['userid']){
            $idVAR = '<input type="hidden" class="sessionID" value="'.$res['userid'].'">';
        }else{
            $idVAR = '<input type="hidden" class="simpleID" value="'.$res['userid'].'">';
        }
     $res  =  ''.$idVAR.'<h3 class="font-bold text-xl mb-4" style="font-weight: 800;">'.$res['username'].'</h3><div class="container" style="padding: 3px;"><img src="http://127.0.0.1:8000/storage/'.$res['avatar'].'" style="width: 10%;"> <p>'.$res['message'].'</p> <span class="time-right">'.date("h:i",strtotime($res['created'])).'</span></div>';  

        $result[] = $res;   
        
    }
    return $result;
       // return view('messages',['allmessages'=>$all_msg]);
    }
    }

    public function allPARCT(){
        $USERS = DB::table('users')->get();
        //single row//
        $users = DB::table('users')->where('name','ashish')->first();
        $users = DB::table('users')->find(3);
        
                 DB::table('users')->orderBy('id')->chunk(100,function($users){
                    foreach($users as $user){ 
                     
                    }
                 });
        
        
    }
    
    
    
}
