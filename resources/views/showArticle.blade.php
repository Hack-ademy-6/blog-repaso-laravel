@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <img src="https://picsum.photos/2000/400" alt="" class="img-fluid">
    </div>
    <div class="col-12">
        <h1>{{$article->title}}</h1>
        <div>Creado el: {{$article->created_at}}</div>
        <div>Autor: {{$article->user->name}}</div>
        <p>{{$article->body}}</p>
        @auth
            @if(auth()->id() == $article->user_id)
                <a href="{{route('articles.edit',$article->id)}}" class="btn btn-warning">Editar</a>
                <form action="{{route('articles.destroy',$article->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        @endauth
    </div>
</div>
@endsection