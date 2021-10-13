@extends('layouts.app')
@section('content')
    @if(!empty($chapters))
    <div class="flex justify-center">
        <div class=" mt-5 ml-4 bg-white w-9/12  ">
            <div class="flex w-full mt-4 ml-4  mb-8">
                @foreach ($chapters as $chapter)
                <a href="{{ url('read-chapter/' . $chapter->id) }}">{{ $chapter->chapter_name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    @else
    <div class="flex justify-center">
        <div class="w-9/12 mt-5 ml-4 mb-8">
            <h2 class="text-3xl ">Пока нет глав</h2>
        </div>
    </div>
        
    @endif
@endsection