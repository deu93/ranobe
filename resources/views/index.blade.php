@extends('layouts.app')
@section('content')

<div class="flex ml-5">
  @foreach ($ranobes as $ranobe)
  <div class="card pl-3 pr-2 m-2" style="width: 300px; height:650px;">
      <img src="{{ asset('ranobe/public/img/' . $ranobe->image) }}" class="card-img-top" alt="No image">
      <div class="card-body">
        @php
          $shortDescription = Str::limit($ranobe->description, 40, '...')
        @endphp
        <h5 class="card-title m-auto text-xl mb-1">{{ $ranobe->title }}</h5>
        <p class="card-text m-auto">{{ $shortDescription }}</p>
        <a href="/book-show/{{ $ranobe->slug}}" class="btn btn-primary ml-7 mt-2">Читать</a>
      </div>
    </div>
  @endforeach
</div>


@endsection