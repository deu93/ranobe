@extends('layouts.app')
@section('content')
@foreach ($ranobes as $ranobe)
<div class="card pl-3 pr-2" style="width: 150px;">
    <img src="{{ asset('img/' . $ranobe->ranobe_image) }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $ranobe->title }}</h5>
      <p class="card-text">{{ $ranobe->description }}</p>
      <a href="" class="btn btn-primary">Читать</a>
    </div>
  </div>
@endforeach

@endsection