@extends('layouts.app')
@section('content')
    <div class="flex justify-center pt-5">
        <div class="w-6/12 bg-gray-300 p-6 rounded-lg">
            <form action="{{ route('add-chapter', $book->id) }}" method="POST">
                @csrf
                <h2 class="text-2xl mb-3 mt-3 ">{{ $book->title }}</h2>
                <div class="mb-4">
                    <label for="name" class="sr-only ">Название</label>
                    <input type="text" name="chapter_name" id="chapter_name" placeholder="Название" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('chapter_name') border-red-500 @enderror" value="{{ old('chapter_name') }}">

                    @error('chapter_name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="mb-4">
                    <label for="description" class="sr-only ">Описание</label>
                    <textarea style="width: full; height:600px" name="chapter_text" id="chapter_text" cols="30" placeholder="Описание" class="bg-gray-100 border-2 w-full px-2 py-12 rounded-lg @error('chapter_text') border-red-500 @enderror" value="{{ old('chapter_text') }}"></textarea>

                    @error('chapter_text')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                    {{-- <script>
                        tinymce.init({
                          selector: 'textarea',
                          plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                          toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
                          toolbar_mode: 'floating',
                          tinycomments_mode: 'embedded',
                          tinycomments_author: 'Author name',
                       });
                      </script> --}}
                </div>
                

                

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Добавить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
