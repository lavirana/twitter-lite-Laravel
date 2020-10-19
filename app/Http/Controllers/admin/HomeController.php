<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Tweet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class HomeController extends Controller
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
return view('admin/index');
    }
    
    
    public function happening(){
        $happenings = DB::table('happenings')->paginate(10);
        return view('/admin/happening',['happening'=> $happenings]);
    }
    
    public function getusers(){
        $users = DB::table('users')->where('status', '=', '1')
            ->paginate(10);
        return view('/admin/users',['users'=> $users]);
    }
    
    
    public function getsearch(Request $request){
        $input = $request->all();
        $keyword = $input['searchk'];
        $happRES = DB::table('happenings')->where('title', 'LIKE', '%'.$keyword.'%')->get();
        $decodedRS = json_decode($happRES, true);
        $count = 1;
    foreach($decodedRS as $happres){
        
        $ddd[] = '<tr><td>'.$count.'</td><td>'.$happres['title'].'</td><td>'.$happres['description'].'</td><td><span class="tag tag-success">1970-01-01</span></td></tr>';
   $count++; }
    return $ddd;
    }
    
    
    public function getSearchusers(Request $request){
        $input = $request->all();
        $keyword = $input['table_search'];
        $searchRS = DB::table('users')->where('name','like','%'.$keyword.'%')->paginate(10);
        return view('/admin/users',['users'=>$searchRS]);
    }
    
        public function deleteuser(Request $request){
            $values = $request->all();
            $udd = $values['userd'];
            $affected = DB::table('users')->where('id', "$udd")->update(['status' => '0']);
             if($affected){
                 return 'User Status has been successfully updated';
             }else{
                 return 'Something went wrong';
             }
        }
    
    
  
}
