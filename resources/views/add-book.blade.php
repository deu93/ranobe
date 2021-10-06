@extends('layouts.app')
@section('content')
    <div class="flex justify-center pt-5">
        <div class="w-6/12 bg-gray-300 p-6 rounded-lg">
            <form action="{{ route('add-book') }}" method="post" enctype="multipart/form-data">
                @csrf
               
                <div class="mb-4">
                    <label for="name" class="sr-only ">Название</label>
                    <input type="text" name="title" id="title" placeholder="Название" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}">

                    @error('title')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="mb-4">
                    <label for="description" class="sr-only ">Описание</label>
                    <textarea name="description" id="description" cols="30" placeholder="Описание" class="bg-gray-100 border-2 w-full px-2 py-12 rounded-lg @error('description') border-red-500 @enderror" value="{{ old('description') }}"></textarea>

                    @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4 w-6/12">
                    <p class="text-lg">Выберите изображение для книги</p>
                    <input type="file" name="image" id="image"  >

                    

                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
