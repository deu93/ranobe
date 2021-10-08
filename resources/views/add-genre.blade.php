@extends('layouts.app')
@section('content')
    <div class="flex justify-center pt-5">
        <div class="w-6/12 bg-gray-300 p-6 rounded-lg">
            <form action="{{ route('add-genre') }}" method="post" enctype="multipart/form-data">
                @csrf
               
                <div class="mb-4">
                    <label for="name" class="sr-only ">Название жанра</label>
                    <input type="text" name="genres_name" id="genres_name" placeholder="Название жанра" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('genres_name') border-red-500 @enderror" value="{{ old('genres_name') }}">

                    @error('genres_name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
