@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12 text-center">
        <h1>Iniciar sesión</h1>
    </div>
    <div class="col-12 col-md-6 offset-md-3">
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirma Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation">
              </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
          </form>
    </div>
</div>
@endsection