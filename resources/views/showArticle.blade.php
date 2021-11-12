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
    </div>
</div>
@endsection