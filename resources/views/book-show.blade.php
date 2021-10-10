@extends('layouts.app')
@section('content')
<div class="w-full flex justify-center">
    @if(isset($book))
        <div class="w-8/12  ml-5 mr-5">
            
            <div class="bg-white w-12/12 mb-4 pl-3 pr-2 m-2 ml-4 ">
                <h4 class=" justify-center mb-2 text-2xl pl-2">{{ $book->title }}</h4>
                <div class="w-full flex justify-center">
                    <img class="mt-3 ml-3" src="{{ asset('ranobe/public/img/' . $book->image) }}" alt="">
                 </div>
                 <div class="flex border-4 p-2 m-2">
                    <ul class="flex w-full">
                        @foreach ($genres_menu as $genres_item )
                        <li class="border-2 m-2 p-1">
                            <a class="no-underline " href="{{ url('books-genre/' . $genres_item->id) }}">{{ $genres_item->genres_name }}</a>
                        </li>
                  @endforeach
                   
                    </ul>
                    
                 </div>
                 
                 <p class="text-lg mb-3 mt-2 mt-3 ml-3 mr-3">{{ $book->description }}</p>
                 <a type="submit" class="bg-blue-500 mt-5 ml-3 text-white px-4 no-underline py-3 mb-3  rounded font-medium w-3/12 ">Читать с 1 главы</a>
                 @auth()
                     @if (auth()->user()->role > 0 && auth()->user()->id == $book->user_id )
                        <form action="{{ url('delete-book/' . $book->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 mt-2 text-white px-4 no-underline py-3 mb-3  rounded font-medium w-3/12 ">Удалить</button>
                        </form>
                     @endif
                 @endauth
             </div>
        </div>
    @else
             <h2 class="text-2xl ml-8 mt-5 mb-8">Нет такой страницы</h2>
    @endif
            
            
            
        
        
</div>






@endsection