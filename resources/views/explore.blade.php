

@extends('layouts.app')

@section('content')

<div class="lg:flex lg:justify-center">
    <div class="lg:w-32">
    @include ('_sidebar-links')
    </div>
    
    <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
        <div>
  @foreach($users as $user)
        <a href="{{ $user->path() }}" class="flex items-center mb-5">
      
            <img src="{{$user->avatar}}" width="60" class="mr-4 rounded">
            
       
        <div>
        <h4 class="font-bold">{{ '@'. $user->username }}</h4>
            </div>
             </a>
        @endforeach
                {{ $users->links() }}
    </div>
    </div>
    
    <div class="lg:w-1/6 ">
    @include ('_friends-list')
    </div>
</div>

@endsection
