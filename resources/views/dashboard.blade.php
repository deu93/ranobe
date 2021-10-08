@extends('layouts.app')
@section('content')
    <div class="w-8/12 px-4">
        <h2>Мои ранобэ</h2>
        <div class="flex">
            @if (!$books->isEmpty())
            @foreach ($books as $book )
            <div class="bg-white w-3/12 mb-4 pl-3 pr-2 m-2">
                <h4>{{ $book->title }}</h4>
                <img src="{{ asset('ranobe/public/img/' . $book->image) }}" alt="">
                <p>{{ $book->description }}</p>
                <a type="submit" class="bg-blue-500 m-auto text-white px-4 no-underline py-2 mb-3  rounded font-medium w-9/12">Редактировать</a>
                
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