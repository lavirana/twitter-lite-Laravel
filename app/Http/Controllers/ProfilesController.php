<?php

namespace App\Http\Controllers;

use App\User;
use App\Tweet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;

class ProfilesController extends Controller
{
    public function show(User $user){
        return view('profilies.show',compact('user'));  
    }
    
    public function edit(User $user){
        
       // abort_if($user->isNot(current_user()),404);
        $this->authorize('edit',$user); 
        
        return view('profilies.edit',compact('user'));
    }
    
    
    public function update(User $user){
    
       $attributes = request()->validate([
            'username' => ['string','required','max:255',Rule::unique('users')->ignore($user),
                          ], 
            'name' => ['string','required','max:255'],
           'avatar' => ['file'],
           'cover_image' => ['file'],
            'bio' => ['string','required'],
            'email' => ['string','required','email','max:255',Rule::unique('users')->ignore($user)],
            'password' => ['string','required','min:8','max:255', 'confirmed']
        ]);
        
        
   
        if(request('avatar')){
       $attributes['avatar'] = request('avatar')->store('avatars');
        }
        
        if(request('cover_image')){
            $attributes['cover_image'] = request('cover_image')->store('covers');
        }
        $user->update($attributes);
        return redirect($user->path());
    }
}
