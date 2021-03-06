@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <h1>Mi Super Blog de Tecnologia</h1>
    </div>
</div>
<div class="row">
    <div class="col-12 text-center">
      <div class="py-2">
        @foreach ($tags as $tag)
        <a href="{{route('articles.byTag',$tag->id)}}" style="text-decoration:none;margin:1em;border-left:solid 2px blue;padding-left:.2em;">#{{$tag->name}}</a>
        @endforeach
      </div>
    </div>
  </div>
<div class="row">
    <div class="col-12">
        @forelse ($articles as $article)
            <div class="card mb-3">
                <img src="https://picsum.photos/600/100?a={{$loop->iteration}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$article->title}}</h5>
                  @foreach ($article->tags as $tag)
                    <a href="{{route('articles.byTag',$tag->id)}}">#{{$tag->name}}</a>
                  @endforeach
                  <div>Creado el: {{$article->created_at}}</div>
                  <div>Autor: <a href="{{route('articles.byUser',$article->user->id)}}">{{$article->user->name}}</a></div>
                  <p class="card-text">{!!$article->body!!} <a href="{{route('articles.show',$article->id)}}" style="text-decoration: none; color:inherit">...</a></p>
                  <a href="{{route('articles.show',$article->id)}}" class="btn btn-primary">Leer Mas</a>
                </div>
              </div>
        @empty
            <h2>No hay ningun articulo</h2>
            <a href="{{route('articles.create')}}" class="btn btn-info">Crear articulo</a>
        @endforelse
        {{ $articles->links() }}
    </div>
</div>
    
@endsection