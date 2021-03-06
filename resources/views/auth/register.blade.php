@extends('layouts.app')
@section('content')

    <div class="flex justify-center pt-5">
        <div class="w-6/12 bg-gray-300 p-6 rounded-lg">
            @if(session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                {{session('status')}}
                </div>
            @endif
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only ">Name</label>
                    <input type="text" name="name" id="name" placeholder="Введите имя" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">

                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only ">Username</label>
                    <input type="text" name="username" id="username" placeholder="Выберите никнейм" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">

                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only ">Email</label>
                    <input type="email" name="email" id="email" placeholder="Введите имейл" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">

                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only ">Password</label>
                    <input type="password" name="password" id="password" placeholder="Выберите пароль" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" >

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                       {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only ">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Повторите пароль" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                    <div class="text-red-500 mt-2 text-sm">
                        
                    </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
@endsection