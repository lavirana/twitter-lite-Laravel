<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\admin\HomeController;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }
    public function index(){
//return view('admin/login');
    }
    
    public function login(Request $request){
        echo'<pre>';
        echo $request;
    $user =  DB::table('users')->where("email",$request->input('email'))->get();
        $inptPass = $request->input('password');
        $userPass = $user[0]->password;
      if(Hash::check($inptPass, $userPass)){
         $request->session()->put('users',$user[0]->id);
          return redirect('admin/home');
      }
    }
    
    
    
  
}
