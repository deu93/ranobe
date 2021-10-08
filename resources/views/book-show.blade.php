@extends('layouts.app')
@section('content')
<div class="w-8/12 justify-center">
        <div class="flex ml-5 mr-5">
            <div class="bg-white w-12/12 mb-4 pl-3 pr-2 m-2 ml-4 ">
               <h4 class=" justify-center mb-2 text-2xl pl-2">{{ $book->title }}</h4>
                <img class="mt-3 ml-3" src="{{ asset('ranobe/public/img/' . $book->image) }}" alt="">
                <p class="border-2">Жанры</p>
                <p class="text-lg mb-3 mt-3 ml-3 mr-3">{{ $book->description }}</p>
                <a type="submit" class="bg-blue-500 mt-5 text-white px-4 no-underline py-2 mb-3  rounded font-medium w-2/12">Читать с 1 главы</a>
            
            </div> 
        
        </div>
</div>






@endsection