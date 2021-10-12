@extends('layouts.app')
@section('content')
<div class="flex ml-5">
  <div class="w-8/12">
    @foreach ($books as $book)
    @if (in_array($book->id,$books_array))
    <div class="card pl-3 pr-2 m-2" style="width: 100%; height:550px;">
        <img style="width: 200px; height:300px;" class="mt-2" src="{{ asset('ranobe/public/img/' . $book->image) }}" class="card-img-top" alt="No image">
        <div class="card-body">
          
          <h5 class="card-title m-auto text-xl mb-1">{{ $book->title }}</h5>
          <p class="card-text m-auto">{{ $book->description }}</p>
          <a href="/book-show/{{ $book->slug}}" class="btn btn-primary  mt-8">Читать</a>
        </div>
      </div> 
    @endif
    
    @endforeach
  </div>
  
</div>


@endsection
