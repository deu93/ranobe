@extends('layouts.app')
@section('content')

    <div class="flex justify-center pt-5">
        <div class="w-6/12 bg-gray-300 p-6 rounded-lg">
            <form action="{{ route('editprofile') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only ">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ auth()->user()->name }}">

                    @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only ">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('username') border-red-500 @enderror" value="{{ auth()->user()->username }}">

                    @error('username')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only ">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ auth()->user()->email }}">

                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only ">Password</label>
                    <input type="password" name="password" id="password" placeholder="?????????????????????? ????????????" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" >

                    @error('password')
                    <div class="text-red-500 mt-2 text-sm">
                       {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">??????????????????</button>
                </div>
            </form>
        </div>
    </div>
@endsection
