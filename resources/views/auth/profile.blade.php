@extends('layouts.app')
@section('content')
<div class="flex justify-center pt-5">
    <div class="w-6/12 bg-gray-300 p-6 rounded-lg">
        <div class="mb-4">
                <small class="text-lg pl-3 ">Имя пользователя</small>
                <div class="class=bg-gray-100 border-2 w-full p-4 rounded-lg">{{ $data[0]['name'] }}</div>
        </div>
        <div class="mb-4">
            <small class="text-lg pl-3 ">Никнейм</small>
            <div class="class=bg-gray-100 border-2 w-full p-4 rounded-lg">{{ $data[0]['username'] }}</div>
        </div>
        <div class="mb-4">
            <small class="text-lg pl-3 ">Email</small>
            <div class="class=bg-gray-100 border-2 w-full p-4 rounded-lg">{{ $data[0]['email'] }}</div>
        </div>
        <div class="mb-4">
            <small class="text-lg pl-3 ">Пароль</small>
            <div class="class=bg-gray-100 border-2 w-full p-4 rounded-lg">*********</div>
        </div>
        <div class="flex justify-center ">
            <div class="w-4/12 ">
                <a href="{{ route('editprofile') }}" class="bg-blue-500 text-white  rounded font-medium w-full px-2 py-3">Редактировать
                     профиль</a>
            </div>
        </div>
    </div>
</div>
@endsection
