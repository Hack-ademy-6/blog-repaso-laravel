@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <h1>Mi Super Blog de Tecnologia</h1>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @forelse ($articles as $article)
            <div class="card mb-3">
                <img src="https://picsum.photos/600/100?a={{$loop->iteration}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$article->title}}</h5>
                  <p class="card-text">{{$article->body}}</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  <a href="" class="btn btn-primary">Leer Mas</a>
                </div>
              </div>
        @empty
            <h2>No hay ningun articulo</h2>
            <a href="{{route('articles.create')}}" class="btn btn-info">Crear articulo</a>
        @endforelse
    </div>
</div>
    
@endsection