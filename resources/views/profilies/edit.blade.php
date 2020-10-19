

@extends('layouts.app')

@section('content')

<div class="lg:flex lg:justify-center">
    <div class="lg:w-33">
    @include ('_sidebar-links')
    </div>
    
    <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
 
    <?php // dd($user) ?>
<form method="POST" action="{{ $user->path() }}" enctype="multipart/form-data">
      @csrf
    @method('PATCH')
    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
        Name
        </label>
        <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="" value="{{$user->name}}" required>
        @error('name')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
         </div>
        
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
        UserName
        </label>
        <input class="border border-gray-400 p-2 w-full" type="text" name="username" value="{{$user->username}}" id="" required>
        @error('username')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
        </div>
    
         <div class="mb-6">
                     <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avator">
        Avator
        </label>
    <div class="flex">
        <input class="border border-gray-400 p-2 w-full" type="file" name="avatar" value="" id="">
        <img src="{{$user->avatar}}" width=40px>
    </div>
             
             @error('avatar')
             <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
             @enderror
             
             
             
        </div>
    
    
      <div class="mb-6">
                     <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="cover">
        Cover Image
        </label>
    <div class="flex">
        <input class="border border-gray-400 p-2 w-full" type="file" name="cover_image" value="" id="">
        <img src="http://127.0.0.1:8000/storage/{{$user->cover_image}}" width=40px>
    </div>
             
             @error('cover')
             <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
             @enderror
             
             
             
        </div>
    
    
    
    
    
    
             <div class="mb-6">
                     <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="avator">
        Bio
        </label>
    <div class="flex">
        <textarea class="border border-gray-400 p-2 w-full" name="bio" id="">{{$user->bio}}
       </textarea>
    </div>
             
             @error('bio')
             <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
             @enderror
             
             
             
        </div>
        
        <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
        Email
        </label>
        <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="" value="{{$user->email}}" required>
        @error('email')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
            </div>
        
        
        <div class="mb-6">
           <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
        Password
        </label>
        <input class="border border-gray-400 p-2 w-full" type="password" name="password" value="" id="" required>
        @error('password')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
            </div>
        
        
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password_confirmation">
        Password Confirmation
        </label>
        <input class="border border-gray-400 p-2 w-full" type="password" name="password_confirmation" id="" required>
        @error('password_confirmation')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
            </div>

       
    
            
        <div class="mb-6">
        
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Submit
            </button>
        </div>
    
        </form>
        
    </div>
    
    <div class="lg:w-1/6 ">
    @include ('_friends-list')
    </div>
</div>

@endsection
