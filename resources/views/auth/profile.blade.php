@extends('layouts.app')
@section('content')
<div class="flex justify-center pt-5">
    <div class="w-6/12 bg-gray-300 p-6 rounded-lg">
        <div class="mb-4">
                <small class="text-lg pl-3 ">Имя пользователя</small>
                <div class="class=bg-gray-100 border-2 w-full p-4 rounded-lg">{{ auth()->user()->name }}</div>
        </div>
        <div class="mb-4">
            <small class="text-lg pl-3 ">Никнейм</small>
            <div class="class=bg-gray-100 border-2 w-full p-4 rounded-lg">{{ auth()->user()->username }}</div>
        </div>
        <div class="mb-4">
            <small class="text-lg pl-3 ">Email</small>
            <div class="class=bg-gray-100 border-2 w-full p-4 rounded-lg">{{ auth()->user()->email }}</div>
        </div>
        <div class="mb-4">
            <small class="text-lg pl-3 ">Пароль</small>
            <div class="class=bg-gray-100 border-2 w-full p-4 rounded-lg">*********</div>
        </div>
        <div class="mb-4">
            <small class="text-lg pl-3 ">Роль</small>
            <div class="class=bg-gray-100 border-2 w-full p-4 rounded-lg">
                @if ( auth()->user()->role  == 0)
                    Пользователь

                @elseif ( auth()->user()->role  == 1)
                    Модератор

                @elseif ( auth()->user()->role  == 2)
                    Администратор
                @endif
            </div>
        </div>
        <div class="flex justify-center ">
            <div class="w-4/12 ">
                <a href="{{ route('editprofile') }}" class="bg-blue-500 text-white  rounded font-medium w-full px-2 py-3  no-underline">Редактировать
                     профиль</a>
            </div>
        </div>
    </div>
</div>
@endsection
