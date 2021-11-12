@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 text-center">
        <h1>Editar articulo</h1>
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6 offset-md-3">
        <form action="{{route('articles.update',$article->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Titulo</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" value="{{old('title') ?? $article->title}}">
              @error('title')
              <div id="emailHelp" class="form-text" style="color: red">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Texto</label>
              <textarea name="body" id="" cols="30" rows="10" class="form-control">{{old('body') ?? $article->body}}</textarea>
              @error('body')
              <div id="emailHelp" class="form-text" style="color: red">{{$message}}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Tags</label>
              <select class="form-select" multiple aria-label="multiple select example" name="tags[]">
                @foreach ($tags as $tag)
                <option value="{{$tag->id}}" 
                  @if(old('tags'))
                    @if(in_array($tag->id,old('tags')))
                    selected
                    @endif
                  @elseif($article->tags->contains($tag))
                  selected
                  @endif
                  >{{$tag->name}}</option>
                @endforeach
              </select>
            </div>
            <a href="{{route('articles.show',$article->id)}}" class="btn btn-primary">Volver al articulo</a>
            <button type="submit" class="btn btn-warning">Editar</button>
          </form>
    </div>
</div>
@endsection