@extends('layouts.app')
@section('content')
<div class="w-full">
        <div class="flex ml-5">
            <div class="bg-white w-12/12 mb-4 pl-3 pr-2 m-2 ml-4">
           
                <h4 class=" justify-center mb-2 text-2xl pl-2">{{ $book->title }}</h4>
                <img src="{{ asset('ranobe/public/img/' . $book->image) }}" alt="">
                <p class="text-lg">{{ $book->description }}</p>
                <a type="submit" class="bg-blue-500 m-auto text-white px-4 no-underline py-2 mb-3  rounded font-medium w-2/12">Читать с 1 главы</a>
            
            </div> 
        
        </div>
</div>






@endsection