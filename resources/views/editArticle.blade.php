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
@push('scripts')
<script src="https://cdn.tiny.cloud/1/dsuwf3r1b146psvr73xvrh3duc8aloa3dpabqpfmbi3h36vu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  
tinymce.init({
selector: 'textarea',
height: 500,
plugins: 'visualblocks',
style_formats: [
{ title: 'Headers', items: [
  { title: 'h1', block: 'h1' },
  { title: 'h2', block: 'h2' },
  { title: 'h3', block: 'h3' },
  { title: 'h4', block: 'h4' },
  { title: 'h5', block: 'h5' },
  { title: 'h6', block: 'h6' }
] },

{ title: 'Blocks', items: [
  { title: 'p', block: 'p' },
  { title: 'div', block: 'div' },
  { title: 'pre', block: 'pre' }
] },

{ title: 'Containers', items: [
  { title: 'section', block: 'section', wrapper: true, merge_siblings: false },
  { title: 'article', block: 'article', wrapper: true, merge_siblings: false },
  { title: 'blockquote', block: 'blockquote', wrapper: true },
  { title: 'hgroup', block: 'hgroup', wrapper: true },
  { title: 'aside', block: 'aside', wrapper: true },
  { title: 'figure', block: 'figure', wrapper: true }
] }
],
visualblocks_default_state: true,
end_container_on_empty_block: true,
content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});


</script>
@endpush