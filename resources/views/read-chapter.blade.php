@extends('layouts.app')
@section('content')
<div class="flex w-full justify-center ">
    <div class="w-10/12 bg-white mt-3 justify-center">
        <div class="flex  justify-center">
            <h3 class="text-2xl mb-3 mt-3">
                {{ $chapter->chapter_name }}
            </h3>
        </div>
        <div class=" flex justify-center">
           <div class="w-10/12 " style="white-space: pre-wrap">
                @php
                    echo $chapter->chapter_text;
                @endphp
                    
            </div> 
            
            
        </div>
        <div class="ml-10 mb-3 flex justify-center">
            <a class="text-3xl border-2 p-1 border-gray-600" href="{{ url('book-show/'. $book->slug) }}">Оглавление</a>
            <a class="text-3xl border-2 p-1 border-gray-600" href="{{ url('next-chapter/'. $chapter->id) }}">Следующая глава</a>
        </div>
    </div>
</div>
    
@endsection