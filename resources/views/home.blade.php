@extends('layouts.app')

@section('content')

<div class="lg:flex lg:justify-center">
    
    @if(auth()->check())
    <div class="lg:w-33">
    @include ('_sidebar-links')
    </div>
    @endif

    
    <div class="lg:flex-1 lg:mx-10 lg:mb-10" style="max-width: 700px">
    <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
            <form method="post" action="/tweets">
                @csrf
                <textarea name="body" id="" class="w-full" placeholder="what's up doc?" required></textarea>
                <hr class="my-4" required>
                <footer class="flex justify-between items-center">
                    <i style="color: #8ed0f9;" class="fa fa-picture-o" aria-hidden="true"></i>
                       <button type="submit"  class="hover:bg-blue-600 bg-blue-500 rounded-full shadow py-2 px-10 text-white text-sm h-10">Publish</button>
                </footer>
                </form>
        @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
        @enderror
        </div>
        
 @include('_timeline')
        
        
    </div>
     @if(auth()->check())
    <div class="lg:w-1/6">
    @include ('_friends-list')
    </div>
    @endif
</div>

@endsection
