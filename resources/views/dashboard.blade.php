@extends('layouts.app')
@section('content')
    <div class="px-4">
        <h2 class="text-lg color-white flex justify-center my-3">Мои ранобэ</h2>
        <div class="flex ml-5">
            @if (!$books->isEmpty())
            @foreach ($books as $book )
            <div class="bg-white w-4/12  pl-3 pr-2 m-2 height:550px;">
                @php
                    $shortDescription = Str::limit($book->description, 40, '...')
                @endphp
                <h4 class="mb-2 text-lg pl-2">{{ $book->title }}</h4>
               <div class="flex justify-center my-2">
                <img src="{{ asset('ranobe/public/img/' . $book->image) }}" alt="">
               </div>
                <p>{{ $shortDescription }}</p>
                <div class="flex inline">
                    <div class="w-full flex justify-center">
                        <a href="{{ url('edit-book/' . $book->slug) }}" class="bg-blue-500  mt-4 text-white px-4 no-underline py-3 mb-3  rounded font-medium w-full">Редактировать</a>
                        
                    </div>
                    <div class="w-full flex justify-center">
                        @auth()
                         @if (auth()->user()->role > 0 && auth()->user()->id == $book->user_id )
                            <form action="{{ url('delete-book/' . $book->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 mt-4 text-white px-4 no-underline py-3 mb-3  rounded font-medium w-full ">Удалить</button>
                            </form>
                         @endif
                     @endauth
                </div>
                    
                </div>
                
            </div> 
            @endforeach 
        @else
            <h3>У вас пока нет добавленных ранобэ</h3>
        @endif
        </div>

    </div>
    <div class="flex justify-center  mt-5 mb-5">
        <a href="{{ route('add-book') }}" class="bg-blue-500 m-auto text-white px-5 no-underline  py-3 rounded font-medium w-2/12">Добавить ранобэ</a>
    </div>
@endsection