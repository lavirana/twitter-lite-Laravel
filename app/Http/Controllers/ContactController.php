<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\User;
class ContactController extends Controller
{
    public function search(Request $request){
if($request->ajax()) {
        if($request->name){
            $data = User::where('username', 'LIKE' ,$request->name.'%')->get();
         $output = '';
            if (count($data)>0) {
                $output = '<ul class="list rounded-lg" style="    background-color: #6ab6ee17;
    border: 1px solid #edf2f7;
    padding: 3px 7px;width:130%">';
              
                foreach ($data as $row){
                    
                    if($row->avatar !== "http://127.0.0.1:8000/storage"){
                             $output .= '<a href='.$row->path().'><li style=" width: 100%; border-bottom: 1px dotted #CCC; margin-bottom: 10px; padding-bottom: 10px;">'.$row->name.'
                    
                    <img style="    width: 31px;
    float: right;" src='.$row->avatar.'></li></a>';
                    }else{
                          $output .= '<a href=""><li style=" width: 100%; border-bottom: 1px dotted #CCC; margin-bottom: 10px; padding-bottom: 10px;">'.$row->name.'
                    
                    <img style="    width: 31px;
    float: right;" src=http://127.0.0.1:8000/images/twitter.png></li></a>';   
                    }
               
                }
                $output .= '</ul>';
            }
            else {
                $output .= '<ul class="list-group" style="display: block; position: relative; z-index: 1"><li class="list-group-item">'.'No results'.'</li></ul>';
            }
           
            return $output;
    }else{
            return  '<ul class="list-group" style="display: block; position: relative; z-index: 1"><li class="list-group-item"></li></ul>';
        }
}
    
}
}